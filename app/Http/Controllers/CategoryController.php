<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Category::orderBy('position', 'ASC')->get();
        return view('BackEnd.category.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Category::orderBy('position', 'ASC')->get();
        return view('BackEnd.category.form',compact('list'));
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
                'title' => 'required|unique:categories|max:255',
                'slug' => 'required|unique:categories|max:255',
                'description' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'title.unique' => 'Tên danh mục đã có, xin điền tên khác',
                'slug.unique' => 'Slug danh mục đã có, xin điền slug khác',
                'title.required' => 'Tên danh mục phải có',
                'slug.required' => 'Từ khóa danh mục phải có',
                'description.required' => 'Mô tả danh mục phải có',
                'status.required' => 'Kícch hoạt danh mục phải có',
            ]
        );
        
        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->save();
        toastr()->success('Thành công','Thêm danh mục phim thành công.');
        return Redirect::to('/category');
        

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
        $category = Category::find($id);
        // $list = Category::orderBy('position', 'ASC')->get();
        return view('BackEnd.category.form',compact('category'));

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
                'title' => 'required|unique:catgories|max:255',
                'slug' => 'required|unique:catgories|max:255',
                'description' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'title.unique' => 'Tên danh mục đã có, xin điền tên khác',
                'slug.unique' => 'Slug danh mục đã có, xin điền slug khác',
                'title.required' => 'Tên danh mục phải có',
                'slug.required' => 'Từ khóa danh mục phải có',
                'description.required' => 'Mô tả danh mục phải có',
                'status.required' => 'Kícch hoạt danh mục phải có',
            ]
        );
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->save();
        toastr()->success('Thành công','Update danh mục phim thành công.');
        return Redirect::to('/category')->with('message', 'Update category thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        toastr()->success('Thành công','Xóa danh mục phim thành công.');
        return redirect()->back();

    }

    public function resorting_category(Request $request){
        $data = $request->all();
        foreach($data['array_id'] as $key => $value){
            $category = Category::find($value);
            $category->position = $key;
            $category->save();
        }
    }
}
