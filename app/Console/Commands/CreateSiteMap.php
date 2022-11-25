<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use PHPUnit\Framework\Constraint\Count;

class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = App::make('sitemap');
        $sitemap->add(route('homepage'), Carbon::now('Asia/Ho_Chi_Minh'), '1.0', 'daily');

        $genre = Genre::orderBy('id','DESC')->get();

        //get all genre from db
        foreach ($genre as $gen)
        {
            $sitemap->add(env('APP_URL') . "/the-loai/{$gen->slug}", Carbon::now('Asia/Ho_Chi_Minh'), '0.7', 'daily');
        }

        $category = Country::orderBy('id','DESC')->get();

        //get all catrgory from db
        foreach ($category as $cate)
        {
            $sitemap->add(env('APP_URL') . "/danh-muc/{$cate->slug}", Carbon::now('Asia/Ho_Chi_Minh'), '0.7', 'daily');
        }

        $country = Country::orderBy('id','DESC')->get();

        //get all country from db
        foreach ($country as $coun)
        {
            $sitemap->add(env('APP_URL') . "/quoc-gia/{$coun->slug}", Carbon::now('Asia/Ho_Chi_Minh'), '0.7', 'daily');
        }

        $movie = Movie::orderBy('id','DESC')->get();

        //get all movie from db
        foreach ($movie as $mov)
        {
            $sitemap->add(env('APP_URL') . "/phim/{$mov->slug}", Carbon::now('Asia/Ho_Chi_Minh'), '0.7', 'daily');
        }

        $movie_ep = Movie::orderBy('id','DESC')->get();
        $episode = Episode::all();

        //get all episode from db
        foreach ($movie_ep as $mov_ep){
            foreach ($episode as $ep)
            {
                if($mov_ep->id==$ep->movie_id){
                    $sitemap->add(env('APP_URL') . "/xem-phim/{$mov_ep->slug}/tap-{$ep->episode}", Carbon::now('Asia/Ho_Chi_Minh'), '0.7', 'daily');
                }
            }
        }

        $years = range(Carbon::now('Asia/Ho_Chi_Minh')->year, 2000);
        //add every post to the sitemap
        foreach($years as $year)
        {
            $sitemap->add(env('APP_URL') . "/nam/{$year}", Carbon::now('Asia/Ho_Chi_Minh'), '0.7', 'daily');
        }
        
        //generate your sitemap (format, filename)
        $sitemap->store('xml','sitemap');
        if (File::exists(public_path() . '/sitemap.xml')) {
            File::copy(public_path('sitemap.xml'),base_path('sitemap.xml'));
        }

        // $sitemap->store('xml', 'sitemap');
    }
}
