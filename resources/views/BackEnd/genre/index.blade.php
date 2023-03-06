@extends('BackEnd.master')
@section('title')
    Thêm thể loại
@endsection

@section('content')
  
    <div class="card-body">
        <a href="{{route('genre.create')}}" class="btn btn-primary">Thêm thể loại</a>

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('message')}}</strong>
            </div>
        @endif 

        <h2 class="text-center"><span class="badge badge-info">QUẢN LÝ THỂ LOẠI</span></h2>
        
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Active/Inactive</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach($list as $key => $cate)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$cate->title}}</td>
                    <td>{{$cate->slug}}</td>
                    <td>{{$cate->description}}</td>
                    <td>
                        @if($cate->status)
                            <span class="badge badge-success">Hiển thị</span>
                        @else
                            <span class="badge badge-danger">Không hiển thị </span>
                        @endif    
                    </td>
                    <td>
                        <a href="{{route('genre.edit',$cate->id)}}" class="active btn btn-info btn-sm" style="font-size: 10px;" ><i class="fa fa-edit" title="click to change it"></i></a>&nbsp;  
                        <a href="{{route('delete_genre', ['id'=>$cate->id])}}" class="btn btn-danger btn-sm" id="delete" style="font-size: 10px;"><i class="fas fa-trash-alt" title="click to destroy"></i></a>  
                    </td>
                </tr>
              @endforeach
            </tbody>
            
        </table>

    </div>

@endsection
