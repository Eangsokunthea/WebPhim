@extends('BackEnd.master')
@section('title')
    Liệt kê thể loại
@endsection

@section('content')
  
    <div class="card-body">
        <a href="{{route('genre.index')}}" class="btn btn-primary">Liệt kê thể loại</a>

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('message')}}</strong>
            </div>
        @endif  
        
        <h3 class="text-center">Quản lý thể loại</h3>
        
        <div class="offset-2 col-md-8 my-lg-8">
            @if(!isset($genre))
                {!! Form::open(['route' => 'genre.store', 'method'=>'POST']) !!}
            @else
                {!! Form::open(['route' => ['genre.update',$genre->id], 'method'=>'PUT']) !!}
            @endif   
                <div class="form-group">
                    {!! Form::label('title','Title', []) !!}
                    {!! Form::text('title',isset($genre) ? $genre->title : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug','Slug', []) !!}
                    {!! Form::text('slug',isset($category) ? $category->slug : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'convert_slug']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description','Description', []) !!}
                    {!! Form::textarea('description',isset($genre) ? $genre->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>' description']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('active','Active', []) !!}
                    {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Không'], isset($genre) ? $genre->status : '', ['class'=>'form-control']) !!}
                </div>
            @if(!isset($genre))
                {!! Form::submit('Thêm dữ liệu', ['class'=>' btn btn-success']) !!}
            @else
                {!! Form::submit('Cập nhật', ['class'=>' btn btn-success']) !!}
            @endif 
     
            {!! Form::close() !!}
        </div>

    </div>

@endsection
