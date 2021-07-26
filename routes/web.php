<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\AdminController;
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
/**
 * ------------------------- User Side ------------------------- *
 */
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/about', [InfoController::class, 'about'])->name('about');
    Route::get('/contact', [InfoController::class, 'contact'])->name('contact');
});

Route::get('/', function () {
    return redirect(app()->getLocale());
});

/**
 * ------------------------- Admin Side ------------------------- *
 */
Route::group([
    'prefix' => '{locale}/admin',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'
], function () {
    Route::get('/', [AdminController::class, 'admin'])->name('admin');
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::get('/admin', function () {
    return redirect(app()->getLocale() . '/admin');
});