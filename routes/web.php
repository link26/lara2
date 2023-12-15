<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;


Route::get('/', [NewsController::class, 'index']);

//новости
use App\Http\Controllers\NewsController;
Route::get('/news', [NewsController::class, 'newsp'])->name('news.index');//все новости
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');//ссылка на кокретную новость

Route::get('/about', [PagesController::class, 'about']);
Route::get('/contacts', [PagesController::class, 'contacts']);
Route::get('/gorod', [PagesController::class, 'gorod']);

//определение города
use App\Http\Controllers\GeoLocationController;
Route::get('gorod', [GeoLocationController::class, 'index']);


//страницы
use App\Http\Controllers\PageController;
Route::get('/page/{slug}', [PageController::class, 'show']);

//смена города и куки
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


//форма обратной связи
use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact', [ContactController::class, 'sendEmail']);


//каталог
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);

//авторизация
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout'); // Измененный

//поиск
use App\Http\Controllers\SearchController;
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/brands/{id}', [BrandController::class, 'show'])->name('brands.show');

//админка
use App\Http\Controllers\PageAdminController;
use App\Http\Controllers\NewsAdminController;


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

    // Маршруты для управления брендами
    Route::get('/admin/brands', [BrandCategoryAdminController::class, 'index'])->name('admin.brands.index');
    Route::get('/admin/brands/create', [BrandCategoryAdminController::class, 'create'])->name('admin.brands.create');
    Route::post('/admin/brands', [BrandCategoryAdminController::class, 'store'])->name('admin.brands.store');
    Route::get('/admin/brands/{brand}/edit', [BrandCategoryAdminController::class, 'edit'])->name('admin.brands.edit');
    Route::put('/admin/brands/{brand}', [BrandCategoryAdminController::class, 'update'])->name('admin.brands.update');
    Route::delete('/admin/brands/{brand}', [BrandCategoryAdminController::class, 'destroy'])->name('admin.brands.destroy');

    // Маршруты для администрирования страниц
    Route::get('/admin/pages', [PageAdminController::class, 'index'])->name('pages.index');
    Route::get('/admin/pages/create', [PageAdminController::class, 'create'])->name('pages.create');
    Route::post('/admin/pages', [PageAdminController::class, 'store'])->name('pages.store');
    Route::get('/admin/pages/{page}/edit', [PageAdminController::class, 'edit'])->name('pages.edit');
    Route::put('/admin/pages/{page}', [PageAdminController::class, 'update'])->name('pages.update');
    Route::delete('/admin/pages/{page}', [PageAdminController::class, 'destroy'])->name('pages.destroy');


});
