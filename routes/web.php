<?php

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
    Route::get('/add', [NewsController::class, 'renderAddForm']);
    Route::get('/{categoryId}', [NewsController::class, 'showNewsOnCategory']);
    Route::get('/{categoryId}/{newsId}', [NewsController::class, 'showOneNews']);
});

Route::get('/login', [UserController::class, 'index']);
