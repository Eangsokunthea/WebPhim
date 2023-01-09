@extends('BackEnd.master')
@section('title')
    Home Page
@endsection

@section('content')
<style>
    .info-box {
        min-height: 105px;
        font-size: 20px;
    }
    </style>
    <!-- Default box -->
    <h2 class="text-center" style="font-weight: 500;">QUẢN LÝ TRANG CHỦ</h2>
    <div class="card card-solid">
        <div class="card-body pb-0">    
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$category_total}}</h3>

                        <p>DANH MỤC</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="{{route('category.index')}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$genre_total}}</h3>

                        <p>THỂ LOẠI</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('genre.index')}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$country_total}}</h3>

                        <p>QUỐC GIA</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{route('country.index')}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$movie_total}}</h3>

                        <p>PHIM</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div> 
                    <a href="{{route('movie.index')}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{$user_total}}</h3>

                        <p>QUẢN TRỊ VIÊN</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div> 
                    <a href="{{route('user.index')}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{$customer_total}}</h3>

                        <p>NGƯỜI DÙNG</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div> 
                    <a href="{{route('customer.index')}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>{{$episode_total}}</h3>

                        <p>TẬP PHIM</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div> 
                    <a href="{{route('episode.index')}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                    <div class="inner">
                        <h3>{{$comment_total}}</h3>

                        <p>BÌNH LUẬN</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div> 
                    <a href="{{route('list_comment')}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    <!-- <div class="card-body">     
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="position-relative mb-4">
                        <canvas id="sales-chart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div id="chart" style="height: 250px;"></div>
    </div> -->

@endsection



