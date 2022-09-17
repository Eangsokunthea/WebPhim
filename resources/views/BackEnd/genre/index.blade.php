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
        
        <h3 class="text-center">Quản lý thể loại</h3>
        
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
                            Hiển thị
                        @else
                            Không hiển thị    
                        @endif    
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','route'=>['genre.destroy',$cate->id],'onsubmit'=>'return confirm("Xóa hay không?")']) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('genre.edit',$cate->id)}}"class="btn btn-warning">Sửa</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
            
        </table>

    </div>

@endsection
