<?php

use CodeIgniter\CLI\CLI;

// Pengaturan warna pesan
$errorColor = 'red';
$messageColor = 'white';

// Data untuk pesan error dan pesan biasa
$code = 'ERROR_CODE';
$message = 'Ini adalah pesan kesalahan.';

// Menampilkan pesan error
CLI::error('ERROR: ' . CLI::color($code, $errorColor));
CLI::write(CLI::color($message, $messageColor));
CLI::newLine();