@extends('BackEnd.master')
@section('title')
    Liệt kê thể loại
@endsection

@section('content')
  
<div class="card-body">
    <a href="{{route('genre.index')}}" class="btn btn-primary">Liệt kê thể loại</a>
    <div class="col-md-10">
    
        <h3 class="text-center" style="font-weight: 500;">QUẢN LÝ THỂ LOẠI</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(!isset($genre))
            {!! Form::open(['route' => 'genre.store', 'method'=>'POST']) !!}
        @else
            {!! Form::open(['route' => ['genre.update',$genre->id], 'method'=>'PUT']) !!}
        @endif   
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('title','Title', []) !!}
                    {!! Form::text('title',isset($genre) ? $genre->title : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
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
                    {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Không'], isset($genre) ? $genre->status : '', ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    {!! Form::label('description','Description', []) !!}
                    {!! Form::textarea('description',isset($genre) ? $genre->description : '', ['style'=>'resize:none','rows' => 5 ,'class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>' description']) !!}
                </div>
            </div>
            
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
