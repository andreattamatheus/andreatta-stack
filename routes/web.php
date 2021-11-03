<?php

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

Route::get('/', 'indexController@index');

Route::get('/blog', 'blogController')->name('blog.index');

// Route::get('/teste', 'LoginController@index');
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login')->name('login');

Route::group(['middleware' => 'auth','prefix' => '/admin/posts'], function () {
    Route::get('/', 'postController@index')->name('posts.index');
    Route::get('/create', 'postController@create')->name('post.create');
    Route::get('/{id}', 'postController@show')->name('post.show');
    Route::get('/{id}/edit', 'postController@edit')->name('post.edit');
    Route::post('/create', 'postController@store')->name('post.store');
    Route::put('/{id}', 'postController@update');
    Route::delete('/{id}', 'postController@destroy');
});
