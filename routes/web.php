<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| now create something great
*/

Route::get('/',[\App\Http\Controllers\HomeController::class, 'index'])->name('index');

//[Admin Route]

Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('login');
Route::post('/admin/postLogin', [\App\Http\Controllers\AdminController::class, 'postLogin'])->name('admin.postLogin'); // đối với thêm sửa xoá chúng ta thường sử dụng phương thức post cho nó bảo mật
Route::get('/admin/logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')->name('admin.')->group(function (){

    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');

    Route::resource('/article',\App\Http\Controllers\ArticleController::class);
    Route::post('article/restore/{article}', [\App\Http\Controllers\ArticleController::class, 'restore'])->name('article.restore');

    Route::resource('/product', \App\Http\Controllers\ProductController::class);
    Route::post('product/restore/{product}', [\App\Http\Controllers\ProductController::class, 'restore'])->name('product.restore');

    Route::resource('/vendor', \App\Http\Controllers\VendorController::class);
    Route::post('vendor/restore/{vendor}', [\App\Http\Controllers\VendorController::class, 'restore'])->name('vendor.restore');

    Route::resource('/brand', \App\Http\Controllers\BrandController::class);
    Route::post('brand/restore/{brand}', [\App\Http\Controllers\BrandController::class, 'restore'])->name('brand.restore');

    Route::resource('/category',\App\Http\Controllers\CategoryController::class);
    Route::post('category/restore/{category}', [\App\Http\Controllers\CategoryController::class, 'restore'])->name('category.restore');

    Route::resource('banner', \App\Http\Controllers\BannerController::class);
    Route::post('banner/restore/{banner}', [\App\Http\Controllers\BannerController::class, 'restore'])->name('banner.restore');

    Route::resource('/user', \App\Http\Controllers\UserController::class);
    Route::post('user/restore/{user}', [\App\Http\Controllers\UserController::class, 'restore'])->name('user.restore');

    Route::resource('/role', \App\Http\Controllers\RoleController::class);
    Route::post('role/restore/{role}', [\App\Http\Controllers\RoleController::class, 'restore'])->name('role.restore');

    Route::resource('/user', \App\Http\Controllers\UserController::class);
    Route::post('user/restore/{user}', [\App\Http\Controllers\UserController::class, 'restore'])->name('user.restore');

    Route::resource('/position', \App\Http\Controllers\PositionController::class);
    Route::post('position/restore/{position}', [\App\Http\Controllers\PositionController::class, 'restore'])->name('position.restore');

    Route::resource('/setting', \App\Http\Controllers\SettingController::class);
    Route::resource('/contract', \App\Http\Controllers\ContactController::class);
});
