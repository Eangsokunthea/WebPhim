@extends('BackEnd.master')
@section('title')
    Thông tin khách hàng
@endsection

@section('content')
    <div class="card-body">
        <h3 class="text-center" style="font-weight: 500;">THÔNG TIN KHÁCH HÀNG</h3>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Họ Tên</th>
                    <th>Số điện thoại</th>
                    <th>Tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Ngày tạo</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody class="order_position">
            @php($i = 1)
                @foreach($list as $key => $cate)
                    <td>{{$i++}}</td>
                    <td>{{$cate->name}}</td>
                    <td>{{$cate->phone_no}}</td>
                    <td>{{$cate->email}}</td>
                    <td>{{$cate->password}}</td>
                    <td>{{ \Carbon\Carbon::parse( $cate->created_at )->format('d/m/Y'); }}</td>
                    <!-- <td>{{ \Carbon\Carbon::parse( $cate->created_at )->format('d/m/Y h:i A'); }}</td> -->
                    <td>
                        <a href="{{route('customer.edit',$cate->id)}}" class="active btn btn-info btn-sm" style="font-size: 10px;" ><i class="fa fa-edit" title="click to change it"></i></a>&nbsp;  
                        <a href="{{route('delete_customer', ['id'=>$cate->id])}}" class="btn btn-danger btn-sm" id="delete" style="font-size: 10px;"><i class="fas fa-trash-alt" title="click to destroy"></i></a>  
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>

    </div>
   

@endsection
