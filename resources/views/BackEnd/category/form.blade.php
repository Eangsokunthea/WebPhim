@extends('BackEnd.master')
@section('title')
    Liệt kê danh mục
@endsection

@section('content')
  
    <div class="card-body">
        <a href="{{route('category.index')}}" class="btn btn-primary">Liệt kê danh mục</a>

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('message')}}</strong>
            </div>
        @endif  
        
        <h3 class="text-center">Quản lý doanh mục</h3>
        
        <div class="offset-2 col-md-8 my-lg-8">
            @if(!isset($category))
                {!! Form::open(['route' => 'category.store', 'method'=>'POST']) !!}
            @else
                {!! Form::open(['route' => ['category.update',$category->id], 'method'=>'PUT']) !!}
            @endif   
                <div class="form-group">
                    {!! Form::label('title','Title', []) !!}
                    {!! Form::text('title',isset($category) ? $category->title : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug','Slug', []) !!}
                    {!! Form::text('slug',isset($category) ? $category->slug : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'convert_slug']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description','Description', []) !!}
                    {!! Form::textarea('description',isset($category) ? $category->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>' description']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('active','Active', []) !!}
                    {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Không'], isset($category) ? $category->status : '', ['class'=>'form-control']) !!}
                </div>
            @if(!isset($category))
                {!! Form::submit('Thêm dữ liệu', ['class'=>' btn btn-success']) !!}
            @else
                {!! Form::submit('Cập nhật', ['class'=>' btn btn-success']) !!}
            @endif 
     
            {!! Form::close() !!}
        </div>


    </div>

@endsection
