<?php

use App\Http\Controllers\Auth\GitHubController;
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

Route::get('/home', 'Frontend\indexController@index')->name('index');

Route::get('/portfolio', 'Frontend\portfolioController@index')->name('portfolio.index');
Route::get('/portfolio/{id}', 'Frontend\portfolioController@show')->name('portfolio.show');

Route::get('/login', 'Auth\LoginController@index');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('auth/github', 'Auth\GitHubController@gitRedirect')->name('github.login');
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
