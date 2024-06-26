<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Authors as AuthorsApi;
use App\Http\Controllers\Api\Books as BooksApi;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/authors', [AuthorsApi::class, 'index'])->name('authors');
Route::get('/authors/{id}', [AuthorsApi::class, 'show'])->name('authorsshowid');
Route::put('/authors/{id}', [AuthorsApi::class, 'update'])->name('authorsupdate');
Route::delete('/authors/{id}', [AuthorsApi::class, 'destroy'])->name('authorsdelete');

Route::post('/authors', [AuthorsApi::class, 'store'])->name('authorspost');

Route::get('/books', [BooksApi::class, 'index'])->name('books');
