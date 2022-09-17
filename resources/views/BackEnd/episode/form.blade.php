@extends('BackEnd.master')
@section('title')
    Liệt kê danh sách tập phim
@endsection

@section('content')
  
    <div class="card-body">
        <a href="{{route('episode.index')}}" class="btn btn-primary">Liệt kê danh sách tập phim</a>

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('message')}}</strong>
            </div>
        @endif  

        <h3 class="text-center">Quản lý tập phim</h3>
        
        <div class="offset-2 col-md-8 my-lg-8">
            @if(!isset($episode))
                {!! Form::open(['route' => 'episode.store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
            @else
                {!! Form::open(['route' => ['episode.update',$episode->id], 'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
            @endif   
                
                <div class="form-group">
                    {!! Form::label('movie','Chọn Phim', []) !!}
                    {!! Form::select('movie_id', ['0'=>'Chọn Phim', 'Phim mới nhất'=>$list_movie], isset($episode) ? $episode->movie_id : '', ['class'=>'form-control select-movie']) !!}
                </div>
                <div class="form-group">   
                    {!! Form::label('link','Link phim', []) !!}
                    {!! Form::text('link',isset($episode) ? $episode->linkphim : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                </div>
                @if(isset($episode))
                    <div class="form-group">
                        {!! Form::label('episode','Tập Phim', []) !!}
                        {!! Form::text('episode',isset($episode) ? $episode->episode : '', ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...',isset($episode) ? 'readonly' : '']) !!}
                    </div>
                @else
                    <div class="form-group">
                        {!! Form::label('episode','Tập Phim', []) !!}
                        <select name="episode" class="form-control" id="show_movie"></select>
                    </div>
                @endif
                <!-- <div class="form-group">
                    {!! Form::label('episode','Tập Phim', []) !!}
                    <select name="episode" class="form-control" id="show_movie">                  
                    </select>
                </div> -->
                
            @if(!isset($episode))
                {!! Form::submit('Thêm Tập Phim', ['class'=>' btn btn-success']) !!}
            @else
                {!! Form::submit('Cập Nhật', ['class'=>' btn btn-success']) !!}
            @endif 
     
            {!! Form::close() !!}
        </div>
        

    </div>

@endsection

		
