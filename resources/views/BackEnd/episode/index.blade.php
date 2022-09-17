@extends('BackEnd.master')
@section('title')
    Thêm Tập Phim
@endsection

@section('content')
  
    <div class="card-body">
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
                    <th>Link Phim</th>
                    <th>Tập Phim</th>
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
                        <td>{!! $epi->linkphim !!}</td>
                        <td>{{$epi->episode}}</td>
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
