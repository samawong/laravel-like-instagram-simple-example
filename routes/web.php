<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowsController;

use App\Models\Post;
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

Route::get('/', [PostController::class,'index'])->name('dashboard');
Route::get('/user/{userid}/post',[PostController::class,'create'])->name('post.create');
Route::post('/user/{userid}/post',[PostController::class,'store'])->name('post.store');
Route::get('/post/{post}',[PostController::class,'show'])->name('post.show');

Route::get('/user/{user}', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/user/profile/{user}/edit',[ProfileController::class,'edit'])->name('profile.edit');
Route::patch('/user/profile/{user}',[ProfileController::class,'update'])->name('profile.update');


Route::post('/follow/{user}',[FollowsController::class,'store'])->name('follow.store');


require __DIR__.'/auth.php';
