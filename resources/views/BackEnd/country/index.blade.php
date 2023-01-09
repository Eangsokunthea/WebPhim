@extends('BackEnd.master')
@section('title')
    Thêm quốc gia
@endsection

@section('content')
  
    <div class="card-body">
    
        <a href="{{route('country.create')}}" class="btn btn-primary">Thêm quốc gia</a>

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{session()->get('message')}}</strong>
            </div>
        @endif  
        

        <h3 class="text-center">QUẢN LÝ QUỐC GIA</h3>
        
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Slug</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Quản lý</th>
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
                        <!-- <button type="button" class="btn btn-primary" data-country_id="{{$cate->id}}" id="editCount">show</button> -->
                        <a href="{{route('country.edit',$cate->id)}}" class="active btn btn-info btn-sm" style="font-size: 10px;" ><i class="fa fa-edit" title="click to change it"></i></a>&nbsp;  
                        <a href="{{route('delete_country', ['id'=>$cate->id])}}" class="btn btn-danger btn-sm" id="delete" style="font-size: 10px;"><i class="fas fa-trash-alt" title="click to destroy"></i></a>  
                    </td>
                </tr>
              @endforeach
            </tbody>
            
        </table>

    </div>

@endsection
