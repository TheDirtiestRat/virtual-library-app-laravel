<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('home');
});

// when ever the user is not login they will be redirected in here. in the login Route
Route::get('/login', function () {
    return view('authentication.login');
})->name('login');

Route::post('/loginuser', [LoginController::class, 'authenticate']);
Route::post('/logoutuser', [LoginController::class, 'logout']);

// only login user can access
// Route::middleware(['auth'])->group(function () {
//     Route::get('/success_login', function () {
//         return view('authentication.success');
//     });
// });

// only login user can access
Route::middleware(['auth'])->group(function () {
    Route::get('/success_login', function () {
        return view('authentication.success');
    });

    // Route::get('/books/manage', function () {
    //     dd("manage is open");
    // });
    Route::get('/books/manage', [BookController::class, 'manage']);

    Route::get('/books/manage/addBook', [BookController::class, 'create']);
    Route::get('/books/manage/editBookInfo/{book_id}', [BookController::class, 'edit']);

    Route::post('/books/manage/storeBook', [BookController::class, 'store']);
    Route::post('/books/manage/updateBook', [BookController::class, 'update']);
    Route::delete('/books/manage/delete/{book_id}', [BookController::class, 'delete']);

    Route::get('/books/api/{isbn}', [BookController::class, 'getBookAPI']);
    Route::post('/import-book-csv', [BookController::class, 'import'])->name('import-book.csv');
});

Route::get('/books', [BookController::class, 'show']);
Route::get('/books_search', [BookController::class, 'searchBook']);
Route::get('/books/{id}', [BookController::class, 'details']);
Route::get('/books/category/{category}/{is_manage}', [BookController::class, 'getBookByCategory']);

// Route::get('/', function () {
//     return view('welcome');
// });