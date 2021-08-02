<?php

use App\Http\Controllers\UserControllers\UserHomeController;
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
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/', [UserHomeController::class, 'index'])->name('articles');
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store']);
    Route::get('/article/{id}', [UserHomeController::class, 'show'])->name('article.show');
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
    Auth::routes([
        'register' => false
    ]);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [HomeController::class, 'index'])->name('home');
    Route::get('/site-information', [SiteInformationController::class, 'index'])->name('admin.site_information')->middleware('role');
    Route::get('/admin-category', [AdminCategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin-category/create', [AdminCategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::get('/articles', [ArticleController::class, 'index'])->name('admin.article');
    Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/admin-about', [AdminAboutController::class, 'index'])->name('admin.about');
    Route::get('/messages', [MessageController::class, 'index'])->name('admin.messages');
    Route::get('/manage', [ManageController::class, 'index'])->name('admin.manage')->middleware('role');
    Route::get('/manage/edit/{id}', [ManageController::class, 'edit'])->name('manage.edit');
    Route::get('/manage/create', [ManageController::class, 'create'])->name('manage.create');
    Route::post('/manage', [ManageController::class, 'store'])->name('manage.store');
});

Route::get('/{manage}', function () {
    return redirect(app()->getLocale() . '/admin');
});

Route::group([
    'prefix' => '/admin'
], function () {
    Route::delete('/article/destroy/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
    Route::put('/article/edit/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::put('/admin-about/{id}', [AdminAboutController::class, 'update'])->name('about.update');
    Route::put('/site-information/{id}', [SiteInformationController::class, 'update'])->name('siteInfo.update')->middleware('role');
    Route::put('/manage/edit/{id}', [ManageController::class, 'update'])->name('manage.update')->middleware('role');
    Route::put('/article/edit/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/manage/destroy/{id}', [ManageController::class, 'destroy'])->name('manage.destroy')->middleware('role');
    Route::delete('/category/{id}', [AdminCategoryController::class, 'destroy'])->name('category.destroy');
    Route::put('/category/{id}', [AdminCategoryController::class, 'update'])->name('category.update');
});