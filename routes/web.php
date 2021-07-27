<?php

use App\Http\Controllers\UserControllers\HomeController;
use App\Http\Controllers\UserControllers\CategoryController;
use App\Http\Controllers\UserControllers\AboutController;
use App\Http\Controllers\UserControllers\ContactController;

use App\Http\Controllers\AdminControllers\AdminController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\SiteInformationController;
use App\Http\Controllers\AdminControllers\AdminCategoryController;
use App\Http\Controllers\AdminControllers\ArticleController;
use App\Http\Controllers\AdminControllers\AdminAboutController;
use App\Http\Controllers\AdminControllers\MessageController;
use App\Http\Controllers\AdminControllers\ManageController;


use App\Http\Controllers\Auth\LoginController;

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
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
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
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/site-information', [SiteInformationController::class, 'index'])->name('admin.site_information');
    Route::get('/admin-category', [AdminCategoryController::class, 'index'])->name('admin.category');
    Route::get('/article', [ArticleController::class, 'index'])->name('admin.article');
    Route::get('/admin-about', [AdminAboutController::class, 'index'])->name('admin.about');
    Route::get('/messages', [MessageController::class, 'index'])->name('admin.messages');
    Route::get('/manage', [ManageController::class, 'index'])->name('admin.manage');
});

Route::get('/admin', function () {
    return redirect(app()->getLocale() . '/admin');
});