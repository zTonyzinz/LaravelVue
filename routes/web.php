<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class, 'index'])->name('index');

Auth::routes();

//
// Gets
//

Route::get('/home', [PostsController::class, 'index'])->name('home');
Route::get('/createPost', [PostsController::class, 'create']);
Route::get('/managePost/{id}', [PostsController::class, 'edit']);


//
// Posts
//
Route::post('/createPost', [PostsController::class, 'store']);
Route::patch('/managePost/{id}', [PostsController::class, 'update'])->name("post.update");
Route::delete('/managePost/{id}', [PostsController::class, 'destroy'])->name("post.destroy");

