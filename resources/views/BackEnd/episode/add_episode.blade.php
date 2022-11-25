@extends('BackEnd.master')
@section('title')
    Thêm Tập Phim
@endsection

@section('content')

    <div class="card-body">
        <a href="{{route('movie.index')}}" class="btn btn-danger">Back</a>
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
                    {!! Form::label('movie_title','Phim', []) !!}
                    {!! Form::text('movie_title',isset($movie) ? $movie->title : '', ['class'=>'form-control','readonly']) !!}
                    {!! Form::hidden('movie_id',isset($movie) ? $movie->id : '') !!}
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
                        <!-- <select name="episode" class="form-control" id="show_movie"></select> -->
                        {!! Form::selectRange('episode',1,$movie->sotap,$movie->sotap, ['class'=>'form-control']) !!}
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
    <div class="card-body">      
        <!-- Liet Ke Phim  -->
        <a href="{{route('episode.create')}}" class="btn btn-primary">Thêm Tập Phim</a>

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('message')}}</strong>
            </div>
        @endif  
        

        <h3 class="text-center">Quản lý Tập Phim</h3>
        
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
                        <td>{{$epi->episode}}</td>
                        <td>{{ $epi->linkphim }}</td>
                        <td>
                            {!! Form::open(['method'=>'DELETE','route'=>['episode.destroy',$epi->id],'onsubmit'=>'return confirm("Xóa hay không?")']) !!}
                                {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{route('episode.edit',$epi->id)}}"class="btn btn-warning">Sửa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>

    </div>

@endsection
