@extends('BackEnd.master')
@section('title')
    Liệt kê người quản lý
@endsection

@section('content')
    
<div class="card-body">    
    <a href="{{route('user.index')}}" class="btn btn-primary">Liệt kê</a>
    <div class="col-md-10">
        <h2 class="text-center"><span class="badge badge-warning">CẬP NHẬT THÔNG TIN ADMIN</span></h2>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif
       
        {!! Form::open(['route' => ['user.update',$user->id], 'method'=>'PUT']) !!}
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('name','Tiêu đề khách hàng', []) !!}
                    {!! Form::text('name',isset($user) ? $user->name : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('email','Tài khoản', []) !!}
                    {!! Form::text('email',isset($user) ? $user->email : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('password','Mật khẩu', []) !!}
                    {!! Form::text('password',isset($user) ? $user->password : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
            </div>
        </div>
        {!! Form::submit('Cập nhật', ['class'=>' btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>


@endsection
