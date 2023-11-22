<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('movies', MovieController::class);
    Route::resource('user', UserController::class);
    Route::get('/search/movies', [SearchController::class, 'index'])->name('search.index_movie');
    Route::get('/search/user', [SearchUserController::class, 'index'])->name('search.index_user');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/contacts/create',[ContactController::class, 'create'])->name('contacts.create');
// Route::post('/contacts/store',[ContactController::class, 'store'])->name('contacts.store');

// Auth::routes();

// Route::group(['middleware' => ['auth']], function() {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     Route::get('/contacts/index', [ContactController::class, 'index'])->name('contacts.index');
//     Route::get('/contacts/{id}/edit',[ContactController::class, 'edit'])->name('contacts.edit');
//     Route::post('/contacts/{id}/update',[ContactController::class, 'update'])->name('contacts.update');
//     Route::get('/contacts/{id}/destroy',[ContactController::class, 'destroy'])->name('contacts.destroy');
// });
