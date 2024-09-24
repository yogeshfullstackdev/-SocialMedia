<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\UserController;
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

// Public Home Page - Accessible without authentication
Route::get('/', [PostController::class, 'index'])->name('home');

// Authentication routes provided by Breeze
require __DIR__.'/auth.php';

// Protected Routes - Only for authenticated users
Route::middleware(['auth'])->group(function () {
    // Dashboard - Redirected after login
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Create Post
    Route::get('/create-post', [PostController::class, 'create'])->name('create-post');
    Route::post('/create-post', [PostController::class, 'store'])->name('store-post');

    // Like Post
    Route::post('/posts/{post}/like', [LikeController::class, 'likePost'])->name('like-post');

    // Follow User
    Route::post('/users/{user}/follow', [FollowerController::class, 'followUser'])->name('follow-user');
    Route::post('/users/{user}/unfollow', [FollowerController::class, 'unfollowUser'])->name('unfollow-user');

    // Profile
    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');

    // Author
    Route::get('/author/{id}', [UserController::class, 'author'])->name('author');
});

