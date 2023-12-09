<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsAdminController;

//каталог
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

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


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

Route::post('/change-city', function (Request $request) {
    $city = $request->input('city');
    $phones = [
        'Москва' => '495 123 45 67',
        'Екатеринбург' => '343 987 65 43',
        'Санкт-Петербург' => '812 313 34 4',
        // Добавьте другие города и телефоны здесь
    ];

    $phone = $phones[$city] ?? '';

    // Установка значения cookie
    Cookie::queue('city', $city, 60 * 24 * 30); // Сохраняется на 30 дней
    Cookie::queue('phone', $phone, 60 * 24 * 30); // Сохраняется на 30 дней

    return back();
});

//каталог
Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);

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

    // Маршруты для категорий
    Route::get('/admin/categories', [CategoryAdminController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [CategoryAdminController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [CategoryAdminController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}', [CategoryAdminController::class, 'show'])->name('admin.categories.show');
    Route::get('/admin/categories/{category}/edit', [CategoryAdminController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category}', [CategoryAdminController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [CategoryAdminController::class, 'destroy'])->name('admin.categories.destroy');

});
