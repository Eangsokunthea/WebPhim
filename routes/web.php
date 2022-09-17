<?php

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

//FrontEnd
Route::get('/', [App\Http\Controllers\IndexController::class, 'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [App\Http\Controllers\IndexController::class, 'category'])->name('category');
Route::get('/quoc-gia/{slug}', [App\Http\Controllers\IndexController::class, 'country'])->name('country');
Route::get('/so-tap', [App\Http\Controllers\IndexController::class, 'episode'])->name('so-tap');
Route::get('/the-loai/{slug}', [App\Http\Controllers\IndexController::class, 'genre'])->name('genre');
Route::get('/phim/{slug}', [App\Http\Controllers\IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}', [App\Http\Controllers\IndexController::class, 'watch'])->name('watch');
Route::get('/nam/{year}', [App\Http\Controllers\IndexController::class, 'year']);
Route::get('/tag/{tag}', [App\Http\Controllers\IndexController::class, 'tag']);
Route::get('/tim-kiem', [App\Http\Controllers\IndexController::class, 'timkiem'])->name('tim-kiem');

Auth::routes();

//BackEnd
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/////
Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::post('resorting',[App\Http\Controllers\CategoryController::class, 'resorting_category'])->name('resorting_category');

Route::resource('genre', App\Http\Controllers\GenreController::class);
Route::resource('country', App\Http\Controllers\CountryController::class);
Route::resource('episode', App\Http\Controllers\EpisodeController::class);
Route::resource('movie', App\Http\Controllers\MovieController::class);

Route::post('/update-year-phim', [App\Http\Controllers\MovieController::class, 'update_year']);
Route::get('/update-topview-phim', [App\Http\Controllers\MovieController::class, 'update_topview']);
Route::get('/filter-topview-phim', [App\Http\Controllers\MovieController::class, 'filter_topview']);
Route::get('/filter-topview-default', [App\Http\Controllers\MovieController::class, 'filter_topview_default']);
Route::post('/update-season-phim', [App\Http\Controllers\MovieController::class, 'update_season_phim']);

Route::get('select-movie', [App\Http\Controllers\EpisodeController::class, 'select_movie'])->name('select-movie');
