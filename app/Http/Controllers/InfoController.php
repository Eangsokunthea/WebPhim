<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Info::orderBy('id', 'DESC')->get();
        return view('BackEnd.info.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $info = Info::find(1);
        return view('BackEnd.info.form', compact('info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'image' => 'image|mimes:jpg,png,ipeg,gif,svg|max:2048|dimensions:min_width=100, min_height=100,max_width=2000,max_height=2000',
                'description' => 'required',
                'copyright' => 'required|max:255',
            ],
            [
                'title.required' => 'Tên info phải có',
                'description.required' => 'Mô tả info phải có',
                'hinhanh.required' => 'Hình ảnh info phải có',
                'copyright.required' => 'Copyright phải có',
            ]
        );
        $info = new Info();
        $info->title = $data['title'];
        $info->description = $data['description'];
        $info->copyright = $data['copyright'];
        
        $get_image = $request->file('image');
        
        //them hinh anh
        if($get_image){

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/logo/',$new_image);
            $info->logo = $new_image;
        } 
        
        $info->save();
        toastr()->success('Thành công','Thêm thông tin website thành công.');
        return Redirect::to('/info');
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
        $info = Info::find($id);
        return view('BackEnd.info.form', compact('info'));
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
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'image' => 'image|mimes:jpg,png,ipeg,gif,svg|max:2048|dimensions:min_width=100, min_height=100,max_width=2000,max_height=2000',
                'description' => 'required',
                'copyright' => 'required|max:255',
            ],
            [
                'title.required' => 'Tên info phải có',
                'description.required' => 'Mô tả info phải có',
                'hinhanh.required' => 'Hình ảnh info phải có',
                'copyright.required' => 'Copyright phải có',
            ]
        );
        $info = Info::find($id);
        $info->title = $data['title'];
        $info->description = $data['description'];
        $info->copyright = $data['copyright'];
              
        $get_image = $request->file('image');
        
        //them hinh anh
        if($get_image){

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/logo/',$new_image);
            $info->logo = $new_image;
        } 

        $info->save();
        toastr()->success('Thành công','Update thông tin website thành công.');
        return Redirect::to('/info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


   
}
