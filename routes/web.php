<?php

use Illuminate\Support\Facades\Artisan;
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

Route::get('lang/{locale}',function($locale){
    if(! in_array($locale, ['vn', 'kh', 'en', 'cn'])){
        abort(404);
    }
    session()->put('locale', $locale);
    return redirect()->back();
});



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
Route::get('/locphim', [App\Http\Controllers\IndexController::class, 'locphim'])->name('locphim');
Route::post('/add-rating', [App\Http\Controllers\IndexController::class, 'add_rating'])->name('add-rating');
Route::get('/thongtinCustomer', [App\Http\Controllers\IndexController::class, 'thongtinCustomer'])->name('thongtin_Cus');
Route::get('/lienhetoi', [App\Http\Controllers\IndexController::class, 'lienhe'])->name('lienhe_toi');


//login and register customer
Route::get('/register/customer', [App\Http\Controllers\customerController::class, 'register'])->name('sign_up');
Route::post('/check/customer/register', [App\Http\Controllers\customerController::class, 'store_register'])->name('store_customer_register');
Route::get('/login/customer', [App\Http\Controllers\customerController::class, 'login'])->name('sign_in');
Route::post('/check/customer/login', [App\Http\Controllers\customerController::class, 'store_login'])->name('store_customer_login');
Route::post('/logout/customer', [App\Http\Controllers\customerController::class, 'logout'])->name('sign_out');


// comment 
Route::get('/comment', [App\Http\Controllers\IndexController::class, 'list_comment'])->name('list_comment');
Route::post('/load-comment', [App\Http\Controllers\IndexController::class, 'load_comment'])->name('load_comment');
Route::post('/send-comment', [App\Http\Controllers\IndexController::class, 'send_comment'])->name('send_comment');
Route::post('/allow-comment', [App\Http\Controllers\IndexController::class, 'allow_comment'])->name('allow_comment');
Route::post('/reply-comment', [App\Http\Controllers\IndexController::class, 'reply_comment'])->name('reply_comment');

//doi mat kau
Route::get('/send-mail', [App\Http\Controllers\IndexController::class, 'send_mail']);
Route::get('/quen-mat-khau', [App\Http\Controllers\IndexController::class, 'quen_mat_khau']);
Route::get('/update-new-pass', [App\Http\Controllers\IndexController::class, 'update_new_pass']);
Route::post('/recover-pass', [App\Http\Controllers\IndexController::class, 'recover_pass']);
Route::post('/reset-new-pass', [App\Http\Controllers\IndexController::class, 'reset_new_pass']);

Route::post('comments', [App\Http\Controllers\IndexController::class, 'store_comments']);



Auth::routes();

//BackEnd
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/rating', [App\Http\Controllers\MovieController::class, 'danh_gia'])->name('danh_gia');
// Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');

/////
Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::post('resorting',[App\Http\Controllers\CategoryController::class, 'resorting_category'])->name('resorting_category');

Route::resource('genre', App\Http\Controllers\GenreController::class);
Route::resource('country', App\Http\Controllers\CountryController::class);
Route::resource('episode', App\Http\Controllers\EpisodeController::class);
Route::resource('movie', App\Http\Controllers\MovieController::class);
Route::resource('info', App\Http\Controllers\InfoController::class);
Route::resource('user', App\Http\Controllers\UserController::class);
Route::resource('customer', App\Http\Controllers\CustomerController::class);

// update ajax
Route::get('fetch-countries', [App\Http\Controllers\CountryController::class, 'fetchcountry']);
Route::get('edit-country/{id}', [App\Http\Controllers\CountryController::class, 'edit_country'])->name('edit-country');;
Route::put('update-country/{id}', [App\Http\Controllers\CountryController::class, 'update_country']);
// Route::delete('delete-country/{id}', [StudentController::class, 'destroy']);
// Route::post('/getCountryDetails',[App\Http\Controllers\CountryController::class, 'getCountryDetails'])->name('get.country.details');
// Route::post('/updateCountryDetails',[App\Http\Controllers\CountryController::class, 'updateCountryDetails'])->name('update.country.details');
// Route::get('/countries', [App\Http\Controllers\CountryController::class, 'delete'])->name('delete_country');



//delete ajax
Route::get('/delete_country/{id}', [App\Http\Controllers\CountryController::class, 'delete'])->name('delete_country');
Route::get('/delete_genre/{id}', [App\Http\Controllers\GenreController::class, 'delete'])->name('delete_genre');
Route::get('/delete_category/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete_category');
Route::get('/delete_episode/{id}', [App\Http\Controllers\EpisodeController::class, 'delete'])->name('delete_episode');
Route::get('/delete_movie/{id}', [App\Http\Controllers\MovieController::class, 'delete'])->name('delete_movie');
Route::get('/delete_user/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('delete_user');
Route::get('/delete_customer/{id}', [App\Http\Controllers\CustomerController::class, 'delete'])->name('delete_customer');
Route::get('/delete_rating/{id}', [App\Http\Controllers\MovieController::class, 'delete_rating'])->name('delete_rating');
Route::get('/delete_comment/{id}', [App\Http\Controllers\IndexController::class, 'delete_comment'])->name('delete_comment');


Route::post('/update-year-phim', [App\Http\Controllers\MovieController::class, 'update_year']);
Route::get('/update-topview-phim', [App\Http\Controllers\MovieController::class, 'update_topview']);
Route::get('/filter-topview-phim', [App\Http\Controllers\MovieController::class, 'filter_topview']);
Route::get('/filter-topview-default', [App\Http\Controllers\MovieController::class, 'filter_topview_default']);
Route::post('/update-season-phim', [App\Http\Controllers\MovieController::class, 'update_season_phim']);

Route::get('select-movie', [App\Http\Controllers\EpisodeController::class, 'select_movie'])->name('select-movie');
Route::get('add-episode/{id}', [App\Http\Controllers\EpisodeController::class, 'add_episode'])->name('add-episode');

//thay doi du lieu movie bang ajax
Route::get('/category-choose', [App\Http\Controllers\MovieController::class, 'category_choose'])->name('category-choose');
Route::get('/country-choose', [App\Http\Controllers\MovieController::class, 'country_choose'])->name('country-choose');
Route::get('/phude-choose', [App\Http\Controllers\MovieController::class, 'phude_choose'])->name('phude-choose');
Route::get('/trangthai-choose', [App\Http\Controllers\MovieController::class, 'trangthai_choose'])->name('trangthai-choose');
Route::get('/phimhot-choose', [App\Http\Controllers\MovieController::class, 'phimhot_choose'])->name('phimhot-choose');
Route::get('/thuocphim-choose', [App\Http\Controllers\MovieController::class, 'thuocphim_choose'])->name('thuocphim-choose');
Route::get('/resolution-choose', [App\Http\Controllers\MovieController::class, 'resolution_choose'])->name('resolution-choose');
Route::post('/update-image-movie-ajax', [App\Http\Controllers\MovieController::class, 'update_image_movie_ajax'])->name('update-image-movie-ajax');
// Route::get('edit-movie/{id}', [App\Http\Controllers\MovieController::class, 'edit_modal_movie'])->name('edit-movie');


Route::get('/create_sitemap', function(){
    return Artisan::call('sitemap:create');
});




