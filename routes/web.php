<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authors;
use App\Http\Controllers\Books;

Route::get('/', function () {
    return view('welcome');
});
Route::get('authors/list', [Authors::class, 'index'])->name('authorslist');

Route::get('books/list', [Books::class, 'index'])->name('bookslist');