<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function timkiem(){
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $category = Category::orderBy('position','ASC')->where('status', 1)->get();
            $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
            $phimhot_trailer = Movie::where('resolution',5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
            $genre = Genre::orderBy('id','DESC')->get();
            $country = Country::orderBy('id','DESC')->get();
            
            $movie = Movie::where('title', 'LIKE', '%'.$search.'%')->orderBy('ngaycapnhat', 'DESC')->paginate(40); 
            return view('FrontEnd.pages.timkiem',compact('category', 'genre', 'country', 'search', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
        }else{
            return redirect()->to('/');
        }
        
    }

    public function home(){
        $phimhot = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $category = Category::orderBy('position','ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $Category_home = Category::with('movie')->orderBy('id','DESC')->where('status', 1)->get();
        return view('FrontEnd.pages.home',compact('category', 'genre', 'country', 'Category_home', 'phimhot', 'phimhot_sidebar', 'phimhot_trailer'));
    }

    public function category($slug){
        $category = Category::orderBy('position','ASC')->where('status', 1)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('ngaycapnhat', 'DESC')->paginate(40); 
        return view('FrontEnd.pages.category',compact('category', 'genre', 'country', 'cate_slug', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }

    public function tag($tag){    
        $category = Category::orderBy('position','ASC')->where('status', 1)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $tag = $tag;
        $movie = Movie::where('tags','LIKE','%'.$tag.'%')->orderBy('ngaycapnhat', 'DESC')->paginate(40); 
        return view('FrontEnd.pages.tag',compact('category', 'genre', 'country', 'tag', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }

    public function year($year){    
        $category = Category::orderBy('position','ASC')->where('status', 1)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $year = $year;
        $movie = Movie::where('year', $year)->orderBy('ngaycapnhat', 'DESC')->paginate(40); 
        return view('FrontEnd.pages.year',compact('category', 'genre', 'country', 'year', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }

    public function country($slug){
        $category = Category::orderBy('position','ASC')->where('status', 1)->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $count_slug = Country::where('slug', $slug)->first();
        $movie = Movie::where('country_id', $count_slug->id)->orderBy('ngaycapnhat', 'DESC')->paginate(40); 
        return view('FrontEnd.pages.country',compact('category', 'genre', 'country', 'count_slug', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }

    public function genre($slug){
        $category = Category::orderBy('position','ASC')->where('status', 1)->get();                                                 
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $genre_slug = Genre::where('slug', $slug)->first();
       
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach($movie_genre as $key => $movi){
            $many_genre[] = $movi->movie_id;
        }
        // return response()->json($many_genre);
        $movie = Movie::whereIn('id', $many_genre)->orderBy('ngaycapnhat', 'DESC')->paginate(40);
        return view('FrontEnd.pages.genre',compact('category', 'genre', 'country', 'genre_slug', 'movie', 'phimhot_sidebar', 'phimhot_trailer'));
    }

    public function movie($slug){
        $category = Category::orderBy('position','ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();

        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $movie = Movie::with('category','genre','country', 'movie_genre')->where('slug', $slug)->where('status', 1)->first();
        //lay tap 1
        $episode_tapdau = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode', 'ASC')->take(1)->first();

        $related = Movie::with('category','genre','country')->where('category_id',$movie->category->id)
            ->orderBy(DB::raw('RAND()'))
            ->whereNotIn('slug',[$slug])->get();
        
        //lay 3 tap gan nhat
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'DESC')->take(3)->get();

        //lau tong tap phim da them
        $episode_current_list = Episode::with('movie')->where('movie_id', $movie->id)->get();
        $episode_current_list_count = $episode_current_list->count();

        return view('FrontEnd.pages.movie',compact('category', 'genre', 'country', 'movie', 'related', 'phimhot_sidebar', 'phimhot_trailer','episode', 'episode_tapdau', 'episode_current_list_count'));
    }

    public function watch($slug,$tap){
        
        $category = Category::orderBy('position','ASC')->where('status', 1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $phimhot_sidebar = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('30')->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status', 1)->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        
        $movie = Movie::with('category','genre','country', 'movie_genre','episode')->where('slug', $slug)->where('status', 1)->first(); 
        
        $related = Movie::with('category','genre','country')->where('category_id',$movie->category->id)
            ->orderBy(DB::raw('RAND()'))
            ->whereNotIn('slug',[$slug])->get();

        //lay tap 1 tap-FullHD
        if(isset($tap)){
            $tapphim = $tap;
            $tapphim = substr($tap, 4,20);
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }else{
            $tapphim = 1;
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }
        
        // return response()->json($movie);
        return view('FrontEnd.pages.watch' ,compact('category', 'genre', 'country', 'movie', 'phimhot_sidebar', 'phimhot_trailer', 'episode', 'tapphim', 'related'));
    }
    
    public function episode(){
        return view('FrontEnd.pages.episode');
    }

}
