@extends('BackEnd.master')
@section('title')
    Liệt kê khách hàng
@endsection

@section('content')
<div class="card-body">    
    <a href="{{route('customer.index')}}" class="btn btn-primary">Liệt kê</a>
    <div class="col-md-10">
        <h2 class="text-center"><span class="badge badge-warning">CẬP NHẬT THÔNG TIN NGƯỜI DÙNG</span></h2>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        {!! Form::open(['route'=> ['customer.update',$customer->id], 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('name','Tiêu đề khách hàng', []) !!}
                    {!! Form::text('name',isset($customer) ? $customer->name : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('phone_no','Số điện thoại', []) !!}
                    {!! Form::text('phone_no',isset($customer) ? $customer->phone_no : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    {!! Form::label('email','Tài khoản', []) !!}
                    {!! Form::text('email',isset($customer) ? $customer->email : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    {!! Form::label('password','Mật khẩu', []) !!}
                    {!! Form::text('password',isset($customer) ? $customer->password : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
            </div>
        </div>

        {!! Form::submit('Cập nhật', ['class'=>' btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>


@endsection
