@extends('BackEnd.master')
@section('title')
    Liệt kê thông tin Website
@endsection

@section('content')
    
<div class="card-body">    
    <a href="{{route('info.index')}}" class="btn btn-primary">Liệt kê</a>
    <div class="col-md-10">
        <h3 class="text-center" style="font-weight: 500;">QUẢN LÝ THÔNG TIN WEBSITE</h3>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        
                {!! Form::open(['route' => ['info.update',$info->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('name','Tên', []) !!}
                    {!! Form::text('name',isset($info) ? $info->name : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('phoneNum','Số điện thoại', []) !!}
                    {!! Form::text('phoneNum',isset($info) ? $info->phoneNum : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('email','Email', []) !!}
                    {!! Form::text('email',isset($info) ? $info->email : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('title','Tiêu đề website', []) !!}
                    {!! Form::text('title',isset($info) ? $info->title : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('copyright','Copyright', []) !!}
                    {!! Form::text('copyright',isset($info) ? $info->copyright : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {!! Form::label('image','Hình ảnh logo', []) !!}
                    {!! Form::file('image', ['class'=>'form-control-file']) !!}
                    @if(isset($info))
                        <img src="{{asset('uploads/logo/'.$info->logo)}}" width="20%">
                    @endif
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    {!! Form::label('description','Mô tả website', []) !!}
                    {!! Form::textarea('description',isset($info) ? $info->description : '', ['style'=>'resize:none','rows' => 5 ,'class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>' description']) !!}
                </div>
            </div>
            
        </div>

        {!! Form::submit('Cập nhật thông tin website', ['class'=>' btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>


@endsection
