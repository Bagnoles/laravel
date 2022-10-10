<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
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

Route::get('/', [IndexController::class, 'main']);

Route::get('/info', [IndexController::class, 'showInfo']);

Route::prefix('/news')->group(function () {
    Route::get('/', [NewsController::class, 'showCategories']);
    Route::match(['get', 'post'],'/add', [AdminController::class, 'renderAddForm']);
    Route::match(['get', 'post'],'/download', [AdminController::class, 'downloadNews']);
    Route::get('/{category}', [NewsController::class, 'showNewsOnCategory']);
    Route::get('/{category}/{newsId}', [NewsController::class, 'showOneNews']);
});

Route::get('/login', [UserController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);

/*
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
