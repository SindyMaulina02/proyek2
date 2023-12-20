<?php

namespace App\Controllers;

use App\Models\BookModel;

class Home extends BaseController
{
    // Model untuk data buku
    protected BookModel $bookModel;

    public function __construct()
    {
        // Inisialisasi model buku
        $this->bookModel = new BookModel;
    }

    /**
     * Menampilkan halaman utama.
     *
     * @return string
     */
    public function index(): string
    {
        return view('home/home');
    }

    /**
     * Menampilkan daftar buku dengan fungsi paginasi dan pencarian.
     *
     * @return string
     */
    public function book(): string
    {
        $itemPerPage = 20;

        if ($this->request->getGet('search')) {
            // Jika terdapat parameter 'search', lakukan pencarian
            $keyword = $this->request->getGet('search');
            $books = $this->bookModel
                ->select('books.*, book_stock.quantity, categories.name as category, racks.name as rack, racks.floor')
                ->join('book_stock', 'books.id = book_stock.book_id', 'LEFT')
                ->join('categories', 'books.category_id = categories.id', 'LEFT')
                ->join('racks', 'books.rack_id = racks.id', 'LEFT')
                ->like('title', $keyword, insensitiveSearch: true)
                ->orLike('slug', $keyword, insensitiveSearch: true)
                ->orLike('author', $keyword, insensitiveSearch: true)
                ->orLike('publisher', $keyword, insensitiveSearch: true)
                ->paginate($itemPerPage, 'books');

            // Filter buku yang telah dihapus
            $books = array_filter($books, function ($book) {
                return $book['deleted_at'] == null;
            });
        } else {
            // Jika tidak ada parameter 'search', tampilkan semua buku dengan paginasi
            $books = $this->bookModel
                ->select('books.*, book_stock.quantity, categories.name as category, racks.name as rack, racks.floor')
                ->join('book_stock', 'books.id = book_stock.book_id', 'LEFT')
                ->join('categories', 'books.category_id = categories.id', 'LEFT')
                ->join('racks', 'books.rack_id = racks.id', 'LEFT')
                ->paginate($itemPerPage, 'books');
        }

        // Data untuk dikirim ke view
        $data = [
            'books'         => $books,
            'pager'         => $this->bookModel->pager,
            'currentPage'   => $this->request->getVar('page_books') ?? 1,
            'itemPerPage'   => $itemPerPage,
            'search'        => $this->request->getGet('search')
        ];

        // Tampilkan view 'home/book'
        return view('home/book', $data);
    }
}