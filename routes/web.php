<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsAdminController;

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [NewsController::class, 'index']);

//новости
Route::get('/news', [NewsController::class, 'newsp'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/about', [PagesController::class, 'about']);
Route::get('/contacts', [PagesController::class, 'contacts']);

//авторизация
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout'); // Измененный

//админка
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/news', [NewsAdminController::class, 'index'])->name('news.index');
    Route::get('/admin/news/create', [NewsAdminController::class, 'create'])->name('news.create');
    Route::post('/admin/news', [NewsAdminController::class, 'store'])->name('news.store');
    Route::get('/admin/news/{news}/edit', [NewsAdminController::class, 'edit'])->name('news.edit');
    Route::put('/admin/news/{news}', [NewsAdminController::class, 'update'])->name('news.update');
    //здесь все что в админке
});
