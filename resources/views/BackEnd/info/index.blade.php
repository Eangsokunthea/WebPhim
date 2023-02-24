@extends('BackEnd.master')
@section('title')
    Thông tin Website
@endsection

@section('content')
  
    <div class="card-body">
        <a href="{{route('info.create')}}" class="btn btn-primary">Cập nhập</a>

        <h3 class="text-center" style="font-weight: 500;">QUẢN LÝ THÔNG TIN WEBSITE</h3>
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
                    <th>Họ Tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Tiêu Đề</th>
                    <th>Copyright</th>
                    <!-- <th>Mô tả</th> -->
                    <th>Hình ảnh</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody class="order_position">
            @php($i = 1)
                @foreach($list as $key => $cate)
                    <td>{{$i++}}</td>
                    <td>{{$cate->name}}</td>
                    <td>{{$cate->phoneNum}}</td>
                    <td>{{$cate->email}}</td>
                    <td>{{$cate->title}}</td>
                    <td>{{$cate->copyright}}</td>
                    <!-- <td>{{$cate->description}}</td> -->
                    <td>
                        <img src="{{asset('uploads/logo/'.$cate->logo)}}" width="15%">
                    </td>
                    <td>
                        <a href="{{route('info.edit',$cate->id)}}" class="active btn btn-info btn-sm" style="font-size: 10px;" ><i class="fa fa-edit" title="click to change it"></i></a> 
                        <a data-toggle="modal" data-target="#info_modal" class="btn btn-primary btn-sm" href="#" style="font-size: 10px;">
                              <i class="fas fa-folder"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="info_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 style="text-align: center;">
                                    Quản lý thông tin Website
                                </h3>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tiêu Đề</th>
                                            <th>Copyright</th>
                                            <th>Mô tả</th>
                                            <th>Hình ảnh</th>
                                            <th>Quản lý</th>
                                        </tr>
                                    </thead>
                                    <tbody class="order_position">
                                    @php($i = 1)
                                        @foreach($list as $key => $cate)
                                            <td>{{$i++}}</td>
                                            <td>{{$cate->title}}</td>
                                            <td>{{$cate->copyright}}</td>
                                            <td>{{$cate->description}}</td>
                                            <td>
                                                <img src="{{asset('uploads/logo/'.$cate->logo)}}" width="40%">
                                            </td>
                                            <td>
                                                <a href="{{route('info.edit',$cate->id)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                        
                                                <!-- <a data-toggle="modal" data-target="#Login_or_Register">
                                                    <i class="fa fa-eye" style="color: #2196f3;"></i>
                                                </a> -->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                </div>
            </div>
        </div>
    </div>

@endsection
