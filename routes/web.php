<?php

use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\LikePostController;
use App\Http\Controllers\PostController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


//rather than writing routes for all function,use resource route

//applies middleware except create index and show function

Route::resource('posts', PostController::class)->except(['create', 'index', 'show'])->middleware('auth');

Route::resource('posts', PostController::class)->only('show');

Route::resource('posts.comment', CommentController::class)->only('store');


Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/profiles/{id}/edit', [UserController::class, 'edit'])->middleware(['auth'])->name('profiles.edit');
Route::resource('/profiles', UserController::class)->only('show', 'update')->middleware('auth');

Route::post('/users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('user.follow');
Route::post('/users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('user.unfollow');

Route::post('/post/{post}/like', [LikePostController::class, 'like'])->middleware('auth')->name('post.like');
Route::post('/post/{post}/unlike', [LikePostController::class, 'unlike'])->middleware('auth')->name('post.unlike');

Route::get('/feed', [FeedController::class, '__invoke'])->name('feed')->middleware(['auth']);

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

//middleware admin is created
// Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth','admin']);

//using gates
// Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth','can:admin']);

Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminUserController::class, 'index'])->name('users');
    Route::get('/posts', [AdminPostController::class, 'index'])->name('posts');
    Route::get('/comments', [AdminCommentController::class, 'index'])->name('comments');
    Route::delete('/comments/{id}/delete', [AdminCommentController::class, 'destroy'])->name('comments.destroy');
});
