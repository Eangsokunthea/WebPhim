@extends('BackEnd.master')
@section('title')
    Liệt kê quốc gia
@endsection

@section('content')
  
    <div class="card-body">
    
        <a href="{{route('country.index')}}" class="btn btn-primary">Liệt kê quốc gia</a>

        <!-- @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('message')}}</strong>
            </div>
        @endif   -->
        

        <h3 class="text-center">Quản lý quốc gia</h3>
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
            @if(!isset($country))
                {!! Form::open(['route' => 'country.store', 'method'=>'POST']) !!}
            @else
                {!! Form::open(['route' => ['country.update',$country->id], 'method'=>'PUT']) !!}
            @endif   
                <div class="form-group">
                    {!! Form::label('title','Title', []) !!}
                    {!! Form::text('title',isset($country) ? $country->title : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug','Slug', []) !!}
                    {!! Form::text('slug',isset($category) ? $category->slug : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'convert_slug']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description','Description', []) !!}
                    {!! Form::textarea('description',isset($country) ? $country->description : '', ['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>' description']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('active','Active', []) !!}
                    {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Không'], isset($country) ? $country->status : '', ['class'=>'form-control']) !!}
                </div>
            @if(!isset($country))
                {!! Form::submit('Thêm dữ liệu', ['class'=>' btn btn-success']) !!}
            @else
                {!! Form::submit('Cập nhật', ['class'=>' btn btn-success']) !!}
            @endif 
     
            {!! Form::close() !!}
        </div>

    </div>

@endsection
