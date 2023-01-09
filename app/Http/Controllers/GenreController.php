<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Genre::all();
        return view('BackEnd.genre.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Genre::all();
        return view('BackEnd.genre.form',compact('list'));
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
        //         'tentheloai' => 'required|unique:theloai|max:255',
        //         'slug_theloai' => 'required|unique:theloai|max:255',
        //         'tukhoa' => 'required|max:255',
        //         'mota'=> 'required|max:255',
        //         'kichhoat' => 'required',
        //     ],
        //     [
        //         'slug_theloai.unique' => 'Tên thể loại đã có, xin điền tên khác',
        //         'tentheloai.unique' => 'Slug thể loại đã có, xin điền slug khác',
        //         'tentheloai.required' => 'Tên thể loại phải có',
        //         'tukhoa.required' => 'Từ khóa thể loại phải có',
        //         'mota.required' => 'Mô tả thể loại phải có',
        //     ]
        // );
        $genre = new Genre();
        $genre->title = $data['title'];
        $genre->slug = $data['slug'];
        $genre->description = $data['description'];
        $genre->status = $data['status'];
        $genre->save();
        toastr()->success('Thành công','Thêm thể loại phim thành công.');
        return Redirect::to('/genre');

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
        $genre = Genre::find($id);
        // $list = Genre::all();
        return view('BackEnd.genre.form',compact('genre'));

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
        //         'tentheloai' => 'required|unique:theloai|max:255',
        //         'slug_theloai' => 'required|unique:theloai|max:255',
        //         'tukhoa' => 'required|max:255',
        //         'mota'=> 'required|max:255',
        //         'kichhoat' => 'required',
        //     ],
        //     [
        //         'slug_theloai.unique' => 'Tên thể loại đã có, xin điền tên khác',
        //         'tentheloai.unique' => 'Slug thể loại đã có, xin điền slug khác',
        //         'tentheloai.required' => 'Tên thể loại phải có',
        //         'tukhoa.required' => 'Từ khóa thể loại phải có',
        //         'mota.required' => 'Mô tả thể loại phải có',
        //     ]
        // );
        $genre = Genre::find($id);
        $genre->title = $data['title'];
        $genre->slug = $data['slug'];
        $genre->description = $data['description'];
        $genre->status = $data['status'];
        $genre->save();
        toastr()->success('Thành công','Update thể loại phim thành công.');
        return Redirect::to('/genre');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genre::find($id)->delete();
        toastr()->success('Thành công','Xóa thể loại phim thành công.');
        return redirect()->back();

    }
    public function delete($id){
        Genre::find($id)->delete();
        toastr()->success('Thành công','Xóa thể loại phim thành công.');
        return redirect()->back();
    } 
}
