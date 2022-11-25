@extends('BackEnd.master')
@section('title')
    Thêm danh mục
@endsection

@section('content')
  
    <div class="card-body">
        <a href="{{route('category.create')}}" class="btn btn-primary">Thêm danh mục</a>
        
        <!-- @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror -->
        <!-- @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('message')}}</strong>
            </div>
        @endif   -->
        

        <h3 class="text-center">Quản lý doanh mục</h3>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        
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
            <tbody class="order_position">
                @php($i = 1)
                @foreach($list as $key => $cate)
                <tr id="{{$cate->id}}">
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
                        {!! Form::open(['method'=>'DELETE','route'=>['category.destroy',$cate->id],'onsubmit'=>'return confirm("Xóa hay không?")']) !!}
                            {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('category.edit',$cate->id)}}"class="btn btn-warning">Sửa</a>
                    </td>
                </tr>
              @endforeach
            </tbody>
            
        </table>

    </div>

@endsection
