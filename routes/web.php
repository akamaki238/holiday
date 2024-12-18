<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/posts', [PostController::class, 'index'])->name('index');
    Route::get('/posts/search', [PostController::class, 'search'])->name('search');
    Route::get('/posts/mypage', [PostController::class, 'mypage'])->name('mypage');
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    Route::get('/posts/following', [PostController::class, 'followingPosts'])->name('posts.following');
    Route::get('/posts/{post}', [PostController::class ,'show'])->name('show');
    Route::post('/posts', [PostController::class, 'store'])->name('store');
    Route::post('/posts/{post}/comments', [PostController::class, 'storeComment'])->name('comments.store');
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('post.like');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
