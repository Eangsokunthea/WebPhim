@extends('BackEnd.master')
@section('title')
    Liệt kê danh mục
@endsection

@section('content')


<div class="card-body">
    <a href="{{route('category.index')}}" class="btn btn-primary">Liệt kê danh mục</a>
    <div class="col-md-10">
        
        <h2 class="text-center"><span class="badge badge-info">QUẢN LÝ DANH MỤC</span></h2>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        @if(!isset($category))
            {!! Form::open(['route' => 'category.store', 'method'=>'POST']) !!}
        @else
            {!! Form::open(['route' => ['category.update',$category->id], 'method'=>'PUT']) !!}
        @endif   
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('title','Title', []) !!}
                    {!! Form::text('title',isset($category) ? $category->title : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('slug','Slug', []) !!}
                    {!! Form::text('slug',isset($category) ? $category->slug : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'convert_slug']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('active','Active', []) !!}
                    {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Không'], isset($category) ? $category->status : '', ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    {!! Form::label('description','Description', []) !!}
                    {!! Form::textarea('description',isset($category) ? $category->description : '', ['style'=>'resize:none','rows' => 5 ,'class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>' description']) !!}
                </div>
            </div>
            
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
