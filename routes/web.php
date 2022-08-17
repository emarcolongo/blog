<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\PostController;

/* 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 */
/* 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 */

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

Route::get('/hello-world',[HelloWorldController::class,'index']);

//Route::resource('/users',UserController::class);

Route::prefix('admin')->group(function() {
    Route::resource('posts',PostController::class);
});