@extends('BackEnd.master')
@section('title')
    Liệt kê thông tin Website
@endsection

@section('content')
    
    <div class="card-body">
        <a href="{{route('info.index')}}" class="btn btn-primary">Liệt kê thông tin Website</a>
        
        <h3 class="text-center">Quản lý thông tin Website</h3>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="offset-2 col-md-8 my-lg-8">
                {!! Form::open(['route' => ['info.update',$info->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
            
                <div class="form-group">
                    {!! Form::label('title','Tiêu đề website', []) !!}
                    {!! Form::text('title',isset($info) ? $info->title : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('copyright','Copyright', []) !!}
                    {!! Form::text('copyright',isset($info) ? $info->copyright : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description','Mô tả website', []) !!}
                    {!! Form::textarea('description',isset($info) ? $info->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>' description']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image','Hình ảnh logo', []) !!}
                    {!! Form::file('image', ['class'=>'form-control-file']) !!}
                    @if(isset($info))
                        <img src="{{asset('uploads/logo/'.$info->logo)}}" width="20%">
                    @endif
                </div>
                
            
                {!! Form::submit('Cập nhật thông tin website', ['class'=>' btn btn-success']) !!}
     
            {!! Form::close() !!}
        </div>


    </div>


@endsection
