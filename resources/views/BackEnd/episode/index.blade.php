@extends('BackEnd.master')
@section('title')
    Thêm Tập Phim
@endsection

@section('content')
  
    <div class="card-body">
        <a href="{{route('episode.create')}}" class="btn btn-primary">Thêm Tập Phim</a>

        <h2 class="text-center"><span class="badge badge-info">QUẢN LÝ TẬP PHIM</span></h2>
        
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên Phim</th>
                    <th>Hình Ảnh Phim</th>
                    <th>Link Phim</th>
                    <th>Tập Phim</th>
                    <th>Ngày tạo</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody class="order_position">
                @php($i = 1)
                @foreach($list_episode as $key => $epi)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$epi->movie->title}}</td>
                        <td><img src="{{asset('uploads/movie/'.$epi->movie->image)}}" width="30%"></td>
                        <td>{!! $epi->linkphim !!}</td>
                        <td><span class="badge badge-success">{{$epi->episode}}</span></td>
                        <td>{{ \Carbon\Carbon::parse( $epi->created_at )->format('d/m/Y h:i A');}}</td>
                        <td>
                            <a href="{{route('episode.edit',$epi->id)}}" class="active btn btn-info btn-sm" style="font-size: 10px;" ><i class="fa fa-edit" title="click to change it"></i></a>
                            <a href="{{route('delete_episode', ['id'=>$epi->id])}}" class="btn btn-danger btn-sm" id="delete" style="font-size: 10px;"><i class="fas fa-trash-alt" title="click to destroy"></i></a>  
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>

    </div>

@endsection
