<?php

use App\Http\Controllers\AddItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListCategoryController;
use App\Http\Controllers\ListItemController;
use App\Http\Controllers\SiteProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserListController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user/add', [UserController::class, 'index'])->name('User');

Route::get('/user/list', [UserListController::class, 'index'])->name('UserList');

Route::get('/item/add', [AddItemController::class, 'index'])->name('Item');

Route::get('/item/list', [ListItemController::class, 'index'])->name('ItemList');




Route::get('/category/list', [ListCategoryController::class, 'index'])->name('CategoryList');

Route::get('/category/add', [CategoryController::class, 'index'])->name('Category');

Route::get('/siteprofile', [SiteProfileController::class, 'index'])->name('SiteProfile');
