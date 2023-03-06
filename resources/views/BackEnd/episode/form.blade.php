@extends('BackEnd.master')
@section('title')
    Liệt kê danh sách tập phim
@endsection

@section('content')
  
    <div class="card-body">
        <a href="{{route('episode.index')}}" class="btn btn-primary">Liệt kê danh sách tập phim</a>
        <div class="col-md-10">
            <h2 class="text-center"><span class="badge badge-info">QUẢN LÝ TẬP PHIM</span></h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}} </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(!isset($episode))
                {!! Form::open(['route' => 'episode.store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
            @else
                {!! Form::open(['route' => ['episode.update',$episode->id], 'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
            @endif   

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('movie','Chọn Phim', []) !!}
                        {!! Form::select('movie_id', ['0'=>'Chọn Phim', 'Phim mới nhất'=>$list_movie], isset($episode) ? $episode->movie_id : '', ['class'=>'form-control select-movie']) !!}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">   
                        {!! Form::label('link','Link phim', []) !!}
                        {!! Form::text('link',isset($episode) ? $episode->linkphim : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                    </div>
                </div>

                @if(isset($episode))
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('episode','Tập Phim', []) !!}
                        {!! Form::text('episode',isset($episode) ? $episode->episode : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...',isset($episode) ? 'readonly' : '']) !!}
                    </div>
                </div>
                @else
                <div class="col-sm-4">
                    <div class="form-group">
                        {!! Form::label('episode','Tập Phim', []) !!}
                        <select name="episode" class="form-control" id="show_movie"></select>
                    </div>
                </div>
                @endif
                    
            </div>

            @if(!isset($episode))
                {!! Form::submit('Thêm Tập Phim', ['class'=>' btn btn-success']) !!}
            @else
                {!! Form::submit('Cập Nhật', ['class'=>' btn btn-success']) !!}
            @endif 
    
            {!! Form::close() !!}
        </div>

    </div>

@endsection

		
