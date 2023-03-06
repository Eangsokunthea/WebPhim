@extends('BackEnd.master')
@section('title')
    Liệt kê quốc gia
@endsection

@section('content')
  
    <div class="card-body">
        <a href="{{route('country.index')}}" class="btn btn-primary">Liệt kê quốc gia</a>
        <div class="col-md-10">
            <h2 class="text-center"><span class="badge badge-info">QUẢN LÝ QUỐC GIA</span></h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}} </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!isset($country))
                {!! Form::open(['route' => 'country.store', 'method'=>'POST']) !!}
            @else
                {!! Form::open(['route' => ['country.update',$country->id], 'method'=>'PUT']) !!}
            @endif  

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('title','Title', []) !!}
                        {!! Form::text('title',isset($country) ? $country->title : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
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
                        {!! Form::select('status', ['1'=>'Hiển thị', '0'=>'Không'], isset($country) ? $country->status : '', ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('description','Description', []) !!}
                        {!! Form::textarea('description',isset($country) ? $country->description : '', ['style'=>'resize:none','rows' => 5 ,'class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>' description']) !!}
                    </div>
                </div>
                
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
