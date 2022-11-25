<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Country::all();
        return view('BackEnd.country.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Country::all();
        return view('BackEnd.country.form',compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        $data = $request->validate(
            [
                'title' => 'required|unique:countries|max:255',
                'slug' => 'required|unique:countries|max:255',
                'description' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'title.unique' => 'Tên quốc gia đã có, xin điền tên khác',
                'slug.unique' => 'Slug quốc gia đã có, xin điền slug khác',
                'title.required' => 'Tên quốc gia phải có',
                'slug.required' => 'Từ khóa quốc gia phải có',
                'description.required' => 'Mô tả quốc gia phải có',
                'status.required' => 'Kícch hoạt quốc gia phải có',
            ]
        );
        $country = new Country();
        $country->title = $data['title'];
        $country->slug = $data['slug'];
        $country->description = $data['description'];
        $country->status = $data['status'];
        $country->save();
        toastr()->success('Thành công','Thêm quốc gia phim thành công.');
        return Redirect::to('/country');

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
        $country = Country::find($id);
        // $list = Country::all();
        return view('BackEnd.country.form',compact('country'));

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
        // $data = $request->all();
        $data = $request->validate(
            [
                'title' => 'required|unique:countries|max:255',
                'slug' => 'required|unique:countries|max:255',
                'description' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'title.unique' => 'Tên quốc gia đã có, xin điền tên khác',
                'slug.unique' => 'Slug quốc gia đã có, xin điền slug khác',
                'title.required' => 'Tên quốc gia phải có',
                'slug.required' => 'Từ khóa quốc gia phải có',
                'description.required' => 'Mô tả quốc gia phải có',
                'status.required' => 'Kícch hoạt quốc gia phải có',
            ]
        );
        $country = Country::find($id);
        $country->title = $data['title'];
        $country->slug = $data['slug'];
        $country->description = $data['description'];
        $country->status = $data['status'];
        $country->save();
        toastr()->success('Thành công','Update quốc gia phim thành công.');
        return Redirect::to('/country')->with('message', 'Update Country thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::find($id)->delete();
        toastr()->success('Thành công','Xóa quốc gia phim thành công.');
        return redirect()->back();

    }
}
