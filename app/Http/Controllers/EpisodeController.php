<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_episode = Episode::with('movie')->orderBy('movie_id', 'DESC')->get();
        return view('BackEnd.episode.index', compact('list_episode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_movie = Movie::orderBy('id', 'DESC')->pluck('title', 'id');
        return view('BackEnd.episode.form',compact('list_movie'));
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
        //         'title' => 'required',
        //         'linkphim' => 'required|max:255',
        //         'episode' => 'required',
        //     ],
        //     [
        //         'title.required' => 'Tên tập phim phải có',
        //         'linkphim.required' => 'Mô tả tập phim phải có',
        //         'episode.required' => 'Kícch hoạt tập phim phải có',
        //     ]
        // );
        $episode_check =  Episode::where('episode', $data['episode'])->where('movie_id', $data['movie_id'])->count();
        if($episode_check>0){
            return redirect()->back();
        }else{
            $ep = new Episode();
            $ep->movie_id = $data['movie_id'];
            $ep->linkphim = $data['link'];
            $ep->episode = $data['episode'];
            $ep->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
            $ep->created_at = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $ep->save(); 
        }
        toastr()->success('Thành công','Thêm tập phim phim thành công.');
        return Redirect::to('/episode');
    }

    public function add_episode($id)
    {
        $movie = Movie::find($id);
        $list_episode = Episode::with('movie')->where('movie_id', $id)->orderBy('episode', 'DESC')->get();
        return view('BackEnd.episode.add_episode', compact('list_episode', 'movie')); 
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
        $episode = Episode::find($id);
        $list_movie = Movie::orderBy('id', 'DESC')->pluck('title', 'id');
        return view('BackEnd.episode.form',compact('episode', 'list_movie'));
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
        // $data = $request->validate(
        //     [
        //         'title' => 'required',
        //         'linkphim' => 'required|max:255',
        //         'episode' => 'required',
        //     ],
        //     [
        //         'title.required' => 'Tên tập phim phải có',
        //         'linkphim.required' => 'Mô tả tập phim phải có',
        //         'episode.required' => 'Kícch hoạt tập phim phải có',
        //     ]
        // );
        $ep = Episode::find($id);
        $ep->movie_id = $data['movie_id'];
        $ep->linkphim = $data['link'];
        $ep->episode = $data['episode'];
        $ep->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $ep->save();
        toastr()->success('Thành công','Update tập phim phim thành công.');
        return Redirect::to('/episode')->with('message', 'Update episode thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Episode::find($id)->delete();
        toastr()->success('Thành công','Xóa tập phim phim thành công.');
        return redirect()->back();
    }
    
    public function delete($id){
        Episode::find($id)->delete();
        toastr()->success('Thành công','Xóa tập phim phim thành công.');
        return redirect()->back();
    } 

    public function select_movie()
    {
        $id = $_GET['id'];
        $movie = Movie::find($id);
        $output = '<option>---Con tập phim---</option>';
        if($movie->thuocphim=='phimbo'){
            for($i=1;$i<=$movie->sotap;$i++){
                $output.='<option value="'.$i.'">'.$i.'</option>';
            }
        }else{
            $output.='<option value="HD">HD</option>
            <option value="FullHD">FullHD</option>
            <option value="Cam">Cam</option>
            <option value="HDCam">HDCam</option>';
        }

        echo $output;
    }

    
}
