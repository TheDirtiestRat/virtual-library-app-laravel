<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/success_login', function () {
        return view('authentication.success');
    });

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

// Student Routes
Route::get('/students', [StudentController::class, 'list'])->name("students.list");

Route::get('/students/add', [StudentController::class, 'create'])->name("students.create");
Route::post('/students/store', [StudentController::class, 'store'])->name("students.store");

Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name("students.edit");
Route::put('/students/{id}/update', [StudentController::class, 'update'])->name("students.update");

Route::delete('/students/{id}/delete', [StudentController::class, 'delete'])->name("students.delete");

Route::get('/students/search', [StudentController::class, 'search'])->name("students.search");

Route::get('/students/filter/{course}', [StudentController::class, 'filterStudentsByCourse'])->name('students.filter');

