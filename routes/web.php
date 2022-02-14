<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/login/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/login/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = User::where('github_id', $githubUser->id)->first();

    if ($user) {
        $user->update([
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    }

    Auth::login($user);

    return redirect('/admin');
});

Route::get('/', 'indexController@index')->name('index');

Route::get('/blog', 'blogController@index')->name('blog.index');
Route::get('/blog/post/{id}', 'blogController@showPost')->whereNumber('id')->name('blog.post.show');

// Route::get('/teste', 'LoginController@index');
Route::get('/login', 'Auth\LoginController@index');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');



Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => '/admin'], function () {
        Route::get('', 'Admin\adminController@index')->name('admin.index');
    });

    Route::group(['prefix' => '/users'], function () {
        Route::get('', 'Admin\userController@index')->name('user.index');
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
