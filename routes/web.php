<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\AppIdeias\PodcastLibraryController;
use App\Http\Controllers\Frontend\AppIdeias\RepositoryController;
use App\Http\Controllers\Frontend\AppIdeias\UrlShortenerController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
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


Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/auth/github/callback', [AuthController::class, 'gitHubCallback'])->name('auth.github.callback');

Route::get('/redirect/{shortUrl}', [UrlShortenerController::class, 'redirect'])->name('url-shortener.redirect');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::group(['prefix' => '/app-ideas'], function () {
        Route::get('/repository', [RepositoryController::class, 'index'])->name('repository.index');
        Route::post('/repository', [RepositoryController::class, 'index'])->name('repository.search');
        Route::get('/url-shortener', [UrlShortenerController::class, 'index'])->name('url-shortener.index');
        Route::post('/url-shortener', [UrlShortenerController::class, 'store'])->name('url-shortener.store');
        Route::delete('/url-shortener', [UrlShortenerController::class, 'destroy'])->name('url-shortener.destroy');
        Route::get('/podcast-library', [PodcastLibraryController::class, 'index'])->name('podcast-library.index');
    });
});



Route::fallback(function () {
    return response()->view('pages.404-page', [], 404);
})->name('404-page');
