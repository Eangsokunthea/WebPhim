@extends('BackEnd.master')
@section('title')
    Thông tin người quản lý
@endsection

@section('content')
    <div class="card-body">
        <a href="{{route('customer.index')}}" class="btn btn-primary">Người dùng</a>
        
        <div class="col-md-12">
            <h2 class="text-center"><span class="badge badge-info">QUẢN LÝ THÔNG TIN CÁ NHÂN</span></h2>
       
            <div class="row">
                <div class="col-sm-2">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                        <div class="text-center">
                            <!-- <img width="100%" src="{{asset('/images/OIP.jpg')}}" class="img img-responsive img-thumbnail"> -->
                            <img class="profile-user-img img-fluid img-circle admin_picture" src="users/images/{{Auth::user()->image}}" alt="User profile picture">
                        </div>
        
                        <h3 class="profile-username text-center admin_name">{{Auth::user()->name}}</h3>
        
                        <p class="text-muted text-center">@Admin</p>

                        <input type="file" name="admin_image" id="admin_image" style="opacity: 0;height:1px;display:none">
                        <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn"><b>Đổi ảnh</b></a>
                        
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    
                </div>
                <div class="col-sm-10">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Họ Tên</th>
                                <!-- <th>Hình ảnh</th> -->
                                <th>Tài khoản</th>
                                <th>Mật khẩu</th>
                                <th>Ngày tạo</th>
                                <th>Quản lý</th>
                                <!-- <th>Ngày cập nhật</th> -->
                            </tr>
                        </thead>
                        <tbody class="order_position">
                        @php($i = 1)
                            @foreach($list as $key => $cate)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$cate->name}}</td>
                                
                                <td>{{$cate->email}}</td>
                                <td>{{$cate->password}}</td>
                                <td>{{ \Carbon\Carbon::parse( $cate->created_at )->format('d/m/Y'); }}</td>
                                <!-- <td>{{ \Carbon\Carbon::parse( $cate->updated_at )->format('d/m/Y'); }}</td> -->
                                <td>
                                    <a href="{{route('user.edit',$cate->id)}}" class="active btn btn-info btn-sm" style="font-size: 10px;" ><i class="fa fa-edit" title="click to change it"></i></a>&nbsp;  
                                    <a href="{{route('delete_user', ['id'=>$cate->id])}}" class="btn btn-danger btn-sm" id="delete" style="font-size: 10px;"><i class="fas fa-trash-alt" title="click to destroy"></i></a>  
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>

        
       
    </div>
   

@endsection


