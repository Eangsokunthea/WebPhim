@extends('BackEnd.master')
@section('title')
    Thêm phim
@endsection

@section('content')
  
    <div class="card-body">
        <a href="{{route('movie.index')}}" class="btn btn-primary">Liệt kê phim</a>

        <h2 class="text-center"><span class="badge badge-info">QUẢN LÝ ĐÁNH GIA PHIM</span></h2>
        
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <!-- <th>Tên người dùng</th> -->
                    <th>Tên phim</th>
                    <th>Đánh giá</th>
                    <th>Địa chỉ IP</th>
                    <th>Ngày tạo</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($list as $key => $cate)
                <tr>
                    <td>{{$i++}}</td>
                    <!-- <td>$cate->customer->name</td> -->
                    <!-- <td>{{$cate->movie->title}}</td> -->
                    <td><a href="{{asset('uploads/movie/'.$cate->movie->image)}}" target="_blank" style="color: #118156;" >{{ $cate->movie->title }}</a></td>
                    <td>đánh giá <span class="badge badge-success">{{$cate->rating}}/5</span> lượt</td>
                    <td><span class="badge badge-warning">{{$cate->ip_address}}</span></td>
                    <td>{{ \Carbon\Carbon::parse( $cate->created_at )->format('d/m/Y'); }}</td>
                    <td>
                        <a href="{{route('delete_rating', ['id'=>$cate->id])}}" class="btn btn-danger btn-sm" id="delete" style="font-size: 10px;"><i class="fas fa-trash-alt" title="click to destroy"></i></a>  
                    </td>
                </tr>
                @endforeach
            </tbody>
             
            
        </table>

    </div>
    
@endsection
