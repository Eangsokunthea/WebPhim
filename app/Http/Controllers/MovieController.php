<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\Constraint\Count;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Movie::with('category', 'country', 'movie_genre', 'genre')->withCount('episode')->orderBy('id', 'DESC')->get();
        
        $category = Category::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $genre = Genre::pluck('title','id');

        $list_genre = Genre::all();

        $destinationPath = public_path()."/json_file/";
        if(!is_dir($destinationPath)){
            mkdir($destinationPath,0777, true);
        }
        File::put($destinationPath.'movies.json',json_encode($list));
        return view('BackEnd.movie.index',compact('list', 'category', 'country', 'list_genre', 'genre'));
    }
    

    // public function edit_modal_movie($id){ 
    //     $category = Category::pluck('title','id');
    //     $country = Country::pluck('title','id');
    //     $genre = Genre::pluck('title','id');
    //     $list_genre = Genre::all();
    //     $movie = Movie::find($id);
    //     $movie_genre = $movie->movie_genre;
    //     return response()->json([
    //         'status'=>200,
    //         'category'=>$category,
    //         'country'=>$country,
    //         'genre'=>$genre,
    //         'list_genre'=>$list_genre,
    //         'movie'=>$movie,
    //         'movie_genre'=>$movie_genre,
    //     ]);
    // }

    public function category_choose(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->category_id = $data['category_id'];
        $movie->save();
    }

    public function country_choose(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->country_id = $data['country_id'];
        $movie->save();
    }

    public function phude_choose(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->phude = $data['phude_val'];
        $movie->save();
    }

    public function trangthai_choose(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->status = $data['trangthai_val'];
        $movie->save();
    }

    public function phimhot_choose(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->phim_hot = $data['phimhot_val'];
        $movie->save();
    }

    public function thuocphim_choose(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->thuocphim = $data['thuocphim_val'];
        $movie->save();
    }
    public function resolution_choose(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $movie->resolution = $data['resolution_val'];
        $movie->save();
    }

    public function update_image_movie_ajax(Request $request){
        $get_image = $request->file('file');
        $movie_id = $request->movie_id;

        if($get_image){
            $movie = Movie::find($movie_id);
            unlink('uploads/movie/'.$movie->image);
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/',$new_image);
            $movie->image = $new_image;
            $movie->save();
        }
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
                    
                    <div class="viewsCount" style="color: #9d9d9d;">'.$mov->year.'</div>
                    <div style="float: left;">
                        <ul class="list-inline rating"  title="Average Rating">';
                            for($count=1; $count<=5; $count++){
                                $output.='<li title="star_rating" style="font-size:20px;color:#ffcc00;padding:0">&#9733;</li>';
                            }
                           
                        $output.='</ul>
                        <ul class="total_rating" title="Average Rating"></ul>  
                    </div>
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
                    <div class="viewsCount" style="color: #9d9d9d;">'.$mov->year.'</div>
                    <div style="float: left;">
                        <ul class="list-inline rating"  title="Average Rating">';
                            for($count=1; $count<=5; $count++){
                                $output.='<li title="star_rating" style="font-size:20px;color:#ffcc00;padding:0">&#9733;</li>';
                            }
                           
                        $output.='</ul>
                        <ul class="total_rating" title="Average Rating"></ul>  
                    </div>
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
        // $data = $request->validate(
        //     [
        //         'title' => 'required|unique:movies|max:255',
        //         'slug' => 'required|unique:movies|max:255',
        //         'description' => 'required|max:255',
        //         'hinhanh' => 'required|image|mimes:jpg,png,ipeg,gif,svg|max:2048|dimensions:min_width=100, min_height=100,max_width=2000,max_height=2000',
        //         'status' => 'required',
        //     ],
        //     [
        //         'title.unique' => 'Tên movie đã có, xin điền tên khác',
        //         'slug.unique' => 'Slug movie đã có, xin điền slug khác',
        //         'title.required' => 'Tên movie phải có',
        //         'slug.required' => 'Từ khóa movie phải có',
        //         'description.required' => 'Mô tả movie phải có',
        //         'hinhanh.required' => 'Hình ảnh movie phải có',
        //         'status.required' => 'Kícch hoạt movie phải có',
        //     ]
        // );
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
        $movie->count_views =  rand(100,99999);
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
        Session::put('price', $movie->price);
        Session::put('free_price', $movie->free_price);

        $movie->save();
        //them the loai cho phim
        $movie->movie_genre()->attach($data['genre']);
        toastr()->success('Thành công','Thêm phim phim thành công.');
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
        // $movie->count_views =  rand(100,99999);
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
        toastr()->success('Thành công','Update phim phim thành công.');
        return Redirect::to('/movie');

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
        toastr()->success('Thành công','Xóa phim phim thành công.');
        return redirect()->back();
    }

    public function delete($id){
        $movie = Movie::find($id);
        if(file_exists('uploads/movie/'.$movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        //xoa the loai
        Movie_Genre::whereIn('movie_id', [$movie->id])->delete();
        //xoa tap phim
        Episode::whereIn('movie_id', [$movie->id])->delete();

        $movie->delete();
        toastr()->success('Thành công','Xóa phim phim thành công.');
        return redirect()->back();
    } 

    public function danh_gia(){
        $list = Rating::with('movie')->orderBy('id', 'DESC')->get();
        $movie = Movie::pluck('title', 'id');
        return view('BackEnd.rating.index',compact('list', 'movie'));
    }
    
    public function delete_rating($id){
        Rating::find($id)->delete();
        toastr()->success('Thành công','Xóa đánh giá thành công.');
        return redirect()->back();
    }  

    
}
