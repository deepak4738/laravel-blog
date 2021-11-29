<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontendController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('post-details/{id}', [FrontendController::class, 'view'])->name('postDetails');
Route::post('post/comments/{id}', [FrontendController::class, 'Addcomment'])->name('addComment');


Route::get('user/register', [UserController::class, 'index'])->name('register');
Route::post('user/register/create', [UserController::class, 'register'])->name('registerPost');
Route::get('user/login', [UserController::class, 'login'])->name('login');
Route::post('user/login', [UserController::class, 'loginUser'])->name('loginUser');
Route::get('forgot/password', [UserController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('forgot/password', [UserController::class, 'resetLink'])->name('resetLink');
Route::get('reset-password/{token}', [UserController::class, 'resetPassword'])->name('resetPassword');
Route::post('reset-password', [UserController::class, 'resetPasswordToken'])->name('resetPasswordToken');


Route::group(['middleware' => 'auth'], function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('edit/profile', [UserController::class, 'editProfile'])->name('editProfile');
        Route::post('update/profile', [UserController::class, 'updatePeofile'])->name('updatePeofile');
        Route::get('change/password', [UserController::class, 'changePassword'])->name('changePassword');
        Route::post('update/password', [UserController::class, 'updatePassword'])->name('updatePassword');
        Route::get('logout', [UserController::class, 'logout'])->name('logout');

        Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('post', [PostController::class, 'post'])->name('post');
        Route::post('post/create', [PostController::class, 'storePost'])->name('storePost');
        Route::get('post/list', [PostController::class, 'postList'])->name('postList');
        Route::get('post/edit/{id}', [PostController::class, 'postEdit'])->name('postEdit');
        Route::post('post/update', [PostController::class, 'updatePost'])->name('updatePost');
        Route::get('post/delete/{id}', [PostController::class, 'deletePost'])->name('deletePost');
    });

});


  