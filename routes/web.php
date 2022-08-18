<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfileController;

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

Route::get('/', function () { return view('welcome'); });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/hello-world',[HelloWorldController::class,'index']);

Route::group(['middleware'=>['auth']], function() {
    Route::prefix('admin')->group(function() {
        Route::resource('posts',PostController::class);
        Route::resource('categories',CategoryController::class);
        
        Route::prefix('profile')->name('profile.')->group(function() {
            Route::get('/',[ProfileController::class,'index'])->name('index');
            Route::post('/',[ProfileController::class,'update'])->name('update');
        });
    });
});
