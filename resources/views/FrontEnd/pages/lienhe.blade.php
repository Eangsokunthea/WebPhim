@extends('FrontEnd.master')
@section('title')
    Phim hay 2022 - Liên hệ tôi
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
                    <div class="card-body">
                        <h3 class="text-center" style="font-weight: 500;">Xin Chào Quý Khách </h3><br>
                        <div class="col-md-3"></div>
                        <div class="col-md-6" style="background-color: #192b22;">
                            <p style="margin-top: 15px; text-align:center;"> Mọi người có thể tham khảo thông tin của tôi ở đây nhé :)) </p>

                            <ul class="list-info-group">
                                <li class="list-info-group-item"><span>Mô tả</span> : 
                                    <span class="quality">{{$info->description}} </span>
                                </li>
                                
                                <li class="list-info-group-item"><span>Họ và Tên</span> : 
                                    <span class="quality">@Eang Sokunthea </span>
                                </li>

                                <li class="list-info-group-item"><span>Số điện thoại</span> : 
                                    <span class="quality">08884545552 </span>
                                </li>

                                <li class="list-info-group-item"><span>Liên hệ QC Email</span> : 
                                    <span class="quality">&#160;sokuntheaeang198@gmail.com </span>
                                </li>

                                <li class="list-info-group-item"><span>CopyRight </span> : 
                                    <span class="episode">{{$info->copyright}} </span>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
            </div>
        </div>
    </div>
    
@endsection    
