<?php

use App\Http\Controllers\Auth\GitHubController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\AppIdeasCollectionController;
use App\Http\Controllers\Frontend\AppIdeias\UrlShortenerController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\RepositoryController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::get('/repository', [RepositoryController::class, 'index'])->name('repository.index');
Route::post('/repository', [RepositoryController::class, 'index'])->name('repository.search');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::group(['prefix' => '/app-ideas'], function () {
    Route::get('/url-shortener', [UrlShortenerController::class, 'index'])->name('url-shortener.index');
});


Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('auth/github', [GitHubController::class, 'gitRedirect'])->name('github.login');
Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);


Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => '/admin'], function () {
        Route::get('', 'Admin\adminController@index')->name('admin.index');
    });

    Route::group(['prefix' => '/users'], function () {
        Route::get('', 'Admin\userController@index')->name('user.index');
        Route::put('', 'Admin\userController@update')->name('user.update');
    });

    Route::group(['prefix' => '/posts'], function () {
        Route::get('/', 'Admin\postController@index')->name('admin.posts.index');
        Route::get('/create', 'Admin\postController@create')->name('post.create');
        Route::get('/{id}/edit', 'Admin\postController@edit')->whereNumber('id')->name('post.edit');
        Route::post('/create', 'Admin\postController@store')->name('post.store');
        Route::put('/{id}', 'Admin\postController@update')->whereNumber('id')->name('post.update');
        Route::delete('/{id}', 'Admin\postController@destroy')->whereNumber('id')->name('post.destroy');
    });
});


Route::fallback( function(){
    return view('pages.404-page');
});
