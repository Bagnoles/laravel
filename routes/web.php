<?php


use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
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

Route::group([
    'prefix' => '/news',
    'middleware' => ['auth', 'is_admin']
], function () {
    Route::match(['get', 'post'],'/add', [AdminNewsController::class, 'renderAddForm']);
    Route::match(['get', 'post'],'/download', [AdminNewsController::class, 'downloadNews']);
    Route::match(['get', 'post'],'/addCategory', [AdminCategoryController::class, 'addCategory']);
    Route::match(['get', 'post'],'/editCategory/{categoryId}', [AdminCategoryController::class, 'editCategory']);
    Route::match(['get', 'post'],'/editNews/{newsId}', [AdminNewsController::class, 'editNews']);
    Route::get('/deleteCategory/{categoryId}', [AdminCategoryController::class, 'deleteCategory']);
    Route::get('/deleteNews/{newsId}', [AdminNewsController::class, 'deleteNews']);
    Route::get('/list', [AdminNewsController::class, 'showNewsList']);
    Route::get('/categories', [AdminCategoryController::class, 'showCategoriesList']);
});

Route::group([
    'prefix' => '/admin',
    'middleware' => ['auth', 'is_admin']
], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/users', [UsersController::class, 'showUsers']);
    Route::get('/parser', [ParserController::class, 'index']);
    Route::get('/users/addAdmin/{id}', [UsersController::class, 'userToAdmin']);
    Route::get('/users/delAdmin/{id}', [UsersController::class, 'userDelFromAdmin']);
});

Route::prefix('/news')->group(function () {
    Route::get('/', [NewsController::class, 'showCategories']);
    Route::get('/{category}', [NewsController::class, 'showNewsOnCategory']);
    Route::get('/{category}/{newsId}', [NewsController::class, 'showOneNews']);
});

Auth::routes();

Route::get('/home', [IndexController::class, 'main'])->name('home');

Route::group([
    'middleware' => 'guest'
], function () {
    Route::get('/auth/redirect/{network}', [SocialController::class, 'redirect'])->name('social.auth.redirect');
    Route::get('/auth/callback/{network}', [SocialController::class, 'callback']);
});


