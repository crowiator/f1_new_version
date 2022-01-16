<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\EventController;

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
//posts, vytvori vsetky routes
Route::resource('posts', \App\Http\Controllers\PostController::class);

//comments
Route::resource('comments', \App\Http\Controllers\CommentController::class);
Route::delete('/comments/{id}', [\App\Http\Controllers\CommentController::class,'destroy'])->name('comment.destroy');
Route::get('/', function () {
    return view('welcome');
});
Route::resource('races',RaceController::class);
Route::resource('events', EventController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
