<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfilesController;
use App\Mail\NewUserWelcomeMail;

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


Auth::routes();

Route::get('/email', function () {
    return new NewUserWelcomeMail();
});

Route::post('follow/{user}', [FollowsController::class,'store']);

Route::get('/', 'App\Http\Controllers\PostsController@index');
Route::post('/p','App\Http\Controllers\PostsController@store');
Route::get('/p/create','App\Http\Controllers\PostsController@create');
Route::get('/p/{post}','App\Http\Controllers\PostsController@show');

Route::get('/profile/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfilesController::class, 'update'])->name('profile.update');

