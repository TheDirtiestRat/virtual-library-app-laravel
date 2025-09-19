<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;



Route::get('/', function () {
    return view('home');
});

Route::get('/books', [BookController::class, 'show']);
Route::get('/books/manage', [BookController::class, 'manage']);
Route::get('/books/{id}', [BookController::class, 'details']);
Route::get('/books/category/{category}/{is_manage}', [BookController::class, 'getBookByCategory']);
Route::get('/books/manage/addBook', [BookController::class, 'create']);
Route::get('/books/manage/editBookInfo/{book_id}', [BookController::class, 'edit']);

Route::post('/books/manage/storeBook', [BookController::class, 'store']);
Route::post('/books/manage/updateBook', [BookController::class, 'update']);
Route::delete('/books/manage/delete/{book_id}', [BookController::class, 'delete']);

Route::get('/books_search', [BookController::class, 'searchBook']);
Route::get('/books/api/{isbn}', [BookController::class, 'getBookAPI']);
Route::post('/import-book-csv', [BookController::class, 'import'])->name('import-book.csv');

// Route::get('/', function () {
//     return view('welcome');
// });