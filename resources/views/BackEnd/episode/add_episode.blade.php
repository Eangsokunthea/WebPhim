@extends('BackEnd.master')
@section('title')
    Thêm Tập Phim
@endsection

@section('content')
    <div class="card-body">
        <a href="{{route('movie.index')}}" class="btn btn-danger">Back</a>
        <a href="{{route('episode.index')}}" class="btn btn-primary">Liệt kê danh sách tập phim</a>
        
        <div class="col-md-10">
            <h3 class="text-center" style="font-weight: 500;">QUẢN LÝ TẬP PHIM</h3>
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
                        {!! Form::label('movie_title','Phim', []) !!}
                        {!! Form::text('movie_title',isset($movie) ? $movie->title : '', ['class'=>'form-control','readonly']) !!}
                        {!! Form::hidden('movie_id',isset($movie) ? $movie->id : '') !!}
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
                        <!-- <select name="episode" class="form-control" id="show_movie"></select> -->
                        {!! Form::selectRange('episode',1,$movie->sotap,$movie->sotap, ['class'=>'form-control']) !!}
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

        <div class="card-body">      
          
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Phim</th>
                        <th>Hình Ảnh Phim</th>
                        <th>Tập Phim</th>
                        <th>Link Phim</th>
                        <th>Quản lý</th>
                    </tr>
                </thead>
                <tbody class="order_position">
                    @php($i = 1)
                    @foreach($list_episode as $key => $epi)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$epi->movie->title}}</td>
                            <td><img src="{{asset('uploads/movie/'.$epi->movie->image)}}" width="100%"></td>
                            <td><span class="badge badge-success">{{$epi->episode}}</span></td>
                            <td>{{ $epi->linkphim }}</td>
                            <td>
                                <a href="{{route('episode.edit',$epi->id)}}" class="active btn btn-info btn-sm" style="font-size: 10px;" ><i class="fa fa-edit" title="click to change it"></i></a>
                                <a href="{{route('delete_episode', ['id'=>$epi->id])}}" class="btn btn-danger btn-sm" id="delete" style="font-size: 10px;"><i class="fas fa-trash-alt" title="click to destroy"></i></a>  
                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>

        </div>

    </div>

  
    

@endsection
