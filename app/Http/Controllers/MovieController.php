<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Movie::with('category', 'country', 'movie_genre', 'genre')->orderBy('id', 'DESC')->get();
        $destinationPath = public_path()."/json_file/";
        if(!is_dir($destinationPath)){
            mkdir($destinationPath,0777, true);
        }
        File::put($destinationPath.'movies.json',json_encode($list));
        return view('BackEnd.movie.index',compact('list'));
    }

    public function update_year(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];
        $movie->save();
    }

    public function update_topview(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->topview = $data['topview'];
        $movie->save();
    }

    public function update_season_phim(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->season = $data['season'];
        $movie->save();
    }

    public function filter_topview(Request $request){
        $data = $request->all();
        $movie = Movie::where('topview',$data['value'])->orderBy('ngaycapnhat','DESC')->take(20)->get();
        $output = '';
        foreach($movie as $key => $mov){
            if($mov->resolution==0){
                $text = 'HD';
            }else if($mov->resolution==1){
                $text = 'SD';
            }else if($mov->resolution==2){
                $text = 'HDCam';
            }else if($mov->resolution==3){
                $text = 'Cam';
            }else if($mov->resolution==4){
                $text = 'FullHD';
            }else{
                $text = 'Trailer';
            }  

            $output.='
                <div class="item">
                    <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                        <div class="item-link">
                            <img src="'.url('uploads/movie/'.$mov->image).'" class="lazy post-thumb" alt="'.$mov->title.'" title="'.$mov->title.'" />
                            <span class="is_trailer">'.$text.'</span>
                        </div>
                        <p class="title">"'.$mov->title.'"</p>
                    </a>
                    <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                    <div style="float: left;">
                        <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                        <span style="width: 0%"></span>
                        </span>
                    </div>
                </div>';
        }
        echo $output;
    }
    
    public function filter_topview_default(Request $request){
        $data = $request->all();
        $movie = Movie::where('topview', 0)->orderBy('ngaycapnhat','DESC')->take(20)->get();
        $output = '';
        foreach($movie as $key => $mov){
            if($mov->resolution==0){
                $text = 'HD';
            }else if($mov->resolution==1){
                $text = 'SD';
            }else if($mov->resolution==2){
                $text = 'HDCam';
            }else if($mov->resolution==3){
                $text = 'Cam';
            }else if($mov->resolution==4){
                $text = 'FullHD';
            }else{
                $text = 'Trailer';
            }

            $output.='
                <div class="item">
                    <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                        <div class="item-link">
                            <img src="'.url('uploads/movie/'.$mov->image).'" class="lazy post-thumb" alt="'.$mov->title.'" title="'.$mov->title.'" />
                            <span class="is_trailer">'.$text.'</span>
                        </div>
                        <p class="title">'.$mov->title.'</p>
                    </a>
                    <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                    <div style="float: left;">
                        <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                        <span style="width: 0%"></span>
                        </span>
                    </div>
                </div>';
        }
        echo $output;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title', 'id');
        $list_genre = Genre::all();
        // $list = Movie::with('category', 'country', 'genre')->orderBy('id', 'DESC')->get();
        return view('BackEnd.movie.form',compact('category', 'country', 'genre','list_genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->tags = $data['tags'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->country_id = $data['country_id'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->resolution = $data['resolution'];
        $movie->name_eng = $data['name_eng'];
        $movie->phude = $data['phude'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];

        $movie->ngaytao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
        
        foreach($data['genre'] as $key => $gen){
            $movie->genre_id = $gen[0];
        }
              
        $get_image = $request->file('image');
        
        //them hinh anh
        if($get_image){

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/',$new_image);
            $movie->image = $new_image;
        }

        $movie->save();
        //them the loai cho phim
        $movie->movie_genre()->attach($data['genre']);
        return Redirect::to('/movie')->with('message', 'Thêm phim thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $list_genre = Genre::all();
        // $list = Movie::with('category', 'country', 'genre')->orderBy('id', 'DESC')->get();
        $movie = Movie::find($id);
        $movie_genre = $movie->movie_genre;
        return view('BackEnd.movie.form',compact('category', 'country', 'genre', 'movie', 'list_genre', 'movie_genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->tags = $data['tags'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->thuocphim = $data['thuocphim'];
        // $movie->genre_id = $data['genre_id'];
        $movie->country_id = $data['country_id'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->resolution = $data['resolution'];
        $movie->name_eng = $data['name_eng'];
        $movie->phude = $data['phude'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');

        foreach($data['genre'] as $key => $gen){
            $movie->genre_id = $gen[0];
        }

        $get_image = $request->file('image');
        
        //them hinh anh
        if($get_image){
            if(file_exists('uploads/movie/'.$movie->image)){
                unlink('uploads/movie/'.$movie->image);
            }else{
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image.rand(0,99999).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('uploads/movie/',$new_image);
                $movie->image = $new_image;
            }
        }
        $movie->save();
        // return redirect()->back();
        $movie->movie_genre()->sync($data['genre']);
        return Redirect::to('/movie')->with('message', 'Update phim thành công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if(file_exists('uploads/movie/'.$movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        
        //xoa the loai
        Movie_Genre::whereIn('movie_id', [$movie->id])->delete();
      
        //xoa tap phim
        Episode::whereIn('movie_id', [$movie->id])->delete();

        $movie->delete();
        return redirect()->back()->with('message', 'Xóa phim thành công');
    }

    
}
