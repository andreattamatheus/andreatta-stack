<?php

use App\Http\Controllers\Auth\GitHubController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\AppIdeasCollectionController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\indexController;
use App\Http\Controllers\Frontend\portfolioController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Models\User;
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

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::get('/portfolio', [portfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{id}', [portfolioController::class, 'show'])->name('portfolio.show');

Route::get('/app-ideas-collection', [AppIdeasCollectionController::class, 'index'])->name('app.ideas.index');

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
