<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Info;
use App\Models\Movie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $category = Category::orderBy('position','ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $phimhot = Movie::withCount('episode')->where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->get();


        $info = Info::find(1);
        
        View::share([
            'info' => $info,
            'phimhot' => $phimhot,
            'phimhot_sidebar' => $phimhot_sidebar,
            'phimhot_trailer' => $phimhot_trailer,
            'category_home' => $category,
            'genre_home' => $genre,
            'country_home' => $country,
        ]);      
    }
}
