@extends('FrontEnd.master')
@section('title')
    Phim hay 2022 - thông tin của bạn 
@endsection 
@section('content')
    <div class="row" id="wrapper" style="margin-left: 10px; margin-right: 10px; margin-top:80px; margin-bottom:150px;">
        <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="halim-panel-filter">
                <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                    <div class="ajax"></div>
                </div>
            </div>
            <div id="halim_related_movies-2xx" class="wrap-slider">
                @if(Session::get('id'))
                    <div class="card-body">
                        <h3 class="text-center" style="font-weight: 500;">Xin Chào Quý Khách {{$customer->name}}</h3><br>
                        <div class="col-md-4"></div>
                        <div class="col-md-5" style="background-color: #192b22;">
                            <p style="margin-top: 15px;">{{$customer->name}}, bạn có thể tham khảo thông tin của bạn nhé :)) </p>

                            <ul class="list-info-group">
                                <li class="list-info-group-item"><span>Họ Tên</span> : 
                                    <span class="quality">{{$customer->name}} </span>
                                </li>
                                <li class="list-info-group-item"><span>Số điện thoại</span> : 
                                    <span class="quality">{{$customer->phone_no}} </span>
                                </li>
                                <li class="list-info-group-item"><span>Tài khoản</span> : 
                                    <span class="quality">{{$customer->email}} </span>
                                </li>
                                <li class="list-info-group-item"><span>Mật khẩu</span> : 
                                    <span class="episode">{{$customer->password}} </span>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
@endsection    
