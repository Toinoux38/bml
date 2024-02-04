<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\AuthorController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/add-book', 'BookController@create');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');
    Route::get('/action', [BookController::class, 'actionmenu'])->name('action');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book', [BookController::class, 'store'])->name('book.store');
    Route::delete('/delete/{id}', [BookController::class, 'destroy'])->name('books.delete');

    Route::get('/members', [MemberController::class, 'index'])->name('members');
    Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
    Route::post('/members', [MemberController::class, 'store'])->name('member.store');
    Route::delete('/delete/{id}', [MemberController::class, 'destroy'])->name('member.delete');



});

require __DIR__.'/auth.php';

