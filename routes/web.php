<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'viewDashboard'])->name('admin.dashboard');

    // user modules
    Route::get('/view-users', [UserController::class, 'viewUsers'])->name('admin.viewUsers');
    Route::post('/add-new-user', [UserController::class, 'addUser'])->name('admin.addUser');
    Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('admin.editUser');
    Route::post('/update-user-info', [UserController::class, 'updateUser'])->name('admin.updateUser');
    Route::post('/update-user-role', [UserController::class, 'updateRole'])->name('admin.updateUserRole');
    Route::get('/view-deleted-user', [UserController::class, 'viewDeletedUsers'])->name('admin.viewDeletedUsers');
    Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::get('/restore-user/{id}', [UserController::class, 'restoreUser'])->name('admin.restoreUser');

    //library modules
    Route::get('/view-all-libraries', [LibraryController::class, 'viewAllLibraries'])->name('admin.viewAllLibraries');

    // user modules
    Route::get('/view-users', [UserController::class, 'viewUsers'])->name('admin.viewUsers');
    Route::post('/add-new-user', [UserController::class, 'addUser'])->name('admin.addUser');
    Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('admin.editUser');
    Route::post('/update-user-info', [UserController::class, 'updateUser'])->name('admin.updateUser');
    Route::post('/update-user-role', [UserController::class, 'updateRole'])->name('admin.updateUserRole');
    Route::get('/view-deleted-user', [UserController::class, 'viewDeletedUsers'])->name('admin.viewDeletedUsers');
    Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::get('/restore-user/{id}', [UserController::class, 'restoreUser'])->name('admin.restoreUser');

    //library modules
    Route::get('/view-all-libraries', [LibraryController::class, 'viewAllLibraries'])->name('admin.viewAllLibraries');
    Route::get('/view-single-library-books/{id}', [LibraryController::class, 'viewSingleLibraryBooks'])->name('admin.viewSingleLibraryBooks');

    //book modules
    Route::get('/view-all-libraries', [BookController::class, 'viewAllBooks'])->name('admin.viewAllLibraries');
    Route::post('/create-book', [BookController::class, 'createBook'])->name('admin.createBook');
    Route::get('/edit-book/{id}', [BookController::class, 'editBook'])->name('admin.editBook');
    Route::get('/delete-book/{id}', [BookController::class, 'deleteBook'])->name('admin.deleteBook');
    Route::get('/toggle-book/{id}', [BookController::class, 'toggleBook'])->name('admin.toggleBook');

    //genre modules


});


require __DIR__ . '/auth.php';
