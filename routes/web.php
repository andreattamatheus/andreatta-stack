<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\GitHubController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\AppIdeias\PodcastLibraryController;
use App\Http\Controllers\Frontend\AppIdeias\UrlShortenerController;
use App\Http\Controllers\Frontend\AppIdeias\RepositoryController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfileController;
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
    Route::post('/url-shortener', [UrlShortenerController::class, 'store'])->name('url-shortener.store');
    Route::delete('/url-shortener', [UrlShortenerController::class, 'destroy'])->name('url-shortener.destroy');
    Route::get('/podcast-library', [PodcastLibraryController::class, 'index'])->name('podcast-library.index');
});
Route::get('/redirect/{shortUrl}', [UrlShortenerController::class, 'redirect'])->name('url-shortener.redirect');


Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('auth/github', [GitHubController::class, 'gitRedirect'])->name('github.login');
Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);



Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => '/admin'], function () {
        Route::get('', [AdminController::class, 'index'])->name('admin.index');
    });

    Route::group(['prefix' => '/users'], function () {
        Route::get('', [UserController::class, 'index'])->name('user.index');
        Route::put('', [UserController::class, 'update'])->name('user.update');
    });
});


Route::fallback(function () {
    return response()->view('pages.404-page', [], 404);
})->name('404-page');
