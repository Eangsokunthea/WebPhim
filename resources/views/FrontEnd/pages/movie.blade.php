@extends('FrontEnd.master')
@section('title')
    Phim hay 2022 - Xem phim hay nhất
@endsection

@section('content')  
    <div class="row" id="wrapper" style="margin-left: 10px; margin-right: 10px;">
    <!-- <div class="row container" id="wrapper"> -->
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                    <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{route('category', [$movie->category->slug])}}">{{$movie->category->title}}</a> » 
                            <span>
                                <a href="{{route('country', [$movie->country->slug])}}">{{$movie->country->title}}</a> » 
                                
                                @foreach($movie->movie_genre as $gen)
                                    <a href="{{route('genre', [$gen->slug])}}">{{$gen->title}}</a> » 
                                @endforeach
                                <span class="breadcrumb_last" aria-current="page">{{$movie->title}}</span>
                        </span>
                        </span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
    </div>
    <div class="row" id="wrapper" style="margin-left: 10px; margin-right: 10px;">
        <main id="main-contents" class="col-sm-8 col-xs-12 col-md-7">
            <section id="content" class="test">
                <div class="clearfix wrap-content">
                    <div class="halim-movie-wrapper">
                    <div class="title-block">
                        <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                            <div class="halim-pulse-ring"></div>
                        </div>
                        <div class="title-wrapper" style="font-weight: bold;">
                            GMovie Phim
                        </div>
                    </div>
                    <div class="movie_info col-xs-12">
                        <div class="movie-poster col-md-3">
                            <img class="movie-thumb" src="{{asset('uploads/movie/'.$movie->image)}}" alt="{{$movie->title}}">
                        @if(Session::get('id'))
                            @if($movie->resolution!=5)
                                @if($episode_current_list_count>0)   
                                <div class="bwa-content">
                                    <div class="loader"></div>
                                    <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$episode_tapdau->episode)}}" class="bwac-btn">
                                    <i class="fa fa-play"></i>
                                    </a>
                                </div>
                                @endif
                            @else
                                <a href="#watch_trailer" style="display: block;" class="btn btn-primary watch_trailer">Xem Trailer</a>
                            @endif
                        @else
                                @if($movie->resolution!=5)
                                    @if($episode_current_list_count>0)   
                                    <div class="bwa-content">
                                        <div class="loader"></div>
                                        <a data-toggle="modal" data-target="#Login_or_Register" class="bwac-btn">
                                        <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                    @endif
                                @else
                                    <a href="#watch_trailer" style="display: block;" class="btn btn-primary watch_trailer">Xem Trailer</a>
                                @endif
                        @endif
                            
                            
                            <ul class="list-inline rating"  title="Average Rating" style="
                                margin-bottom:0px!important; text-align: center;">

                                @for($count=1; $count<=5; $count++)

                                @php

                                    if($count<=$rating){ 
                                    $color = 'color:#ffcc00;'; //mau vang
                                    }
                                    else {
                                    $color = 'color:#ccc;'; //mau xam
                                    }
                                
                                @endphp
                                
                                <li title="star_rating" 

                                id="{{$movie->id}}-{{$count}}" 
                                
                                data-index="{{$count}}"  
                                data-movie_id="{{$movie->id}}" 

                                data-rating="{{$rating}}" 
                                class="rating" 
                                style="cursor:pointer; {{$color}} 

                                font-size:20px;padding-left: 8px;padding-right: 8px;">&#9733;</li>

                                @endfor

                            </ul>
                            <span class="total_rating"  title="Average Rating" style="font-size: 11px;padding-left: 78px;"> Đánh giá : {{$rating}}/{{$count_total}} lượt</span>

                        </div>
                        <div class="film-poster col-md-9">
                            <!-- <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                            <h2 class="movie-title title-2" style="font-size: 12px;">({{$movie->name_eng}})</h2> -->
                            <ul class="list-info-group">
                                <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                                <h2 class="movie-title title-2" style="font-size: 12px;">({{$movie->name_eng}})</h2>
                                <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality">
                                    @if($movie->resolution==0)
                                        HD
                                    @elseif($movie->resolution==1)
                                        SD 
                                    @elseif($movie->resolution==2)
                                        HDCam
                                    @elseif($movie->resolution==3)
                                        Cam
                                    @elseif($movie->resolution==4)
                                        FullHD
                                    @else
                                        Trailer    
                                    @endif
                                    </span>

                                    @if($movie->resolution!=5)
                                    <span class="episode">
                                        @if($movie->phude==0)
                                            Phụ đề
                                        @else
                                            Thuyết minh
                                        @endif
                                    </span>
                                    @endif
                                </li>
                                <li class="list-info-group-item"><span>Thời lượng</span> : {{$movie->thoiluong}}</li>
                                <li class="list-info-group-item"><span>Tập phim</span> : 
                                    @if($movie->thuocphim=='phimbo')
                                        {{$episode_current_list_count}}/{{$movie->sotap}} - 
                                        @if($episode_current_list_count==$movie->sotap)
                                            Hoàn thành
                                        @else
                                            Đang cập nhập
                                        @endif
                                    @else
                                        Phim lẻ
                                    @endif    
                                </li>
                                @if($movie->season!=0)
                                    <li class="list-info-group-item"><span>Season</span> : {{$movie->season}}</li>
                                @endif
                                <li class="list-info-group-item"><span>Năm phim</span> : {{$movie->year}}</li>
                                <li class="list-info-group-item"><span>Thể loại</span> : 
                                    @foreach($movie->movie_genre as $gen)
                                        <a href="{{route('genre', $gen->slug)}}" rel="category tag">{{$gen->title}}.</a>
                                    @endforeach
                                </li>
                                <li class="list-info-group-item"><span>Doanh mục phim</span> : 
                                    <a href="{{route('category', [$movie->category->slug])}}" rel="category tag">{{$movie->category->title}}</a>
                                </li>
                                <li class="list-info-group-item"><span>Quốc gia</span> : 
                                    <a href="{{route('country', [$movie->country->slug])}}" rel="tag">{{$movie->country->title}}</a>
                                </li>
                                <li class="list-info-group-item"><span>Tập phim mới nhất</span> : 
                                    @if($episode_current_list_count>0)
                                        @if($movie->thuocphim=='phimbo')                                       
                                            @foreach($episode as $key =>$ep)
                                                <a href="{{url('xem-phim/'.$ep->movie->slug.'/tap-'.$ep->episode)}}" rel="tag">Tập{{$ep->episode}}</a>
                                            @endforeach
                                        @elseif($movie->thuocphim=='phimle')
                                            @foreach($episode as $key =>$ep_le)
                                                <a href="{{url('xem-phim/'.$ep_le->movie->slug.'/tap-'.$ep_le->episode)}}" rel="tag">{{$ep_le->episode}}</a>
                                            @endforeach
                                        @endif
                                    @else
                                        Đang cập nhập    
                                    @endif    
                                </li>
                            
                            </ul>
                            
                            <div class="movie-trailer">
                                @php
                                    $current_url = Request::url();
                                @endphp
                                <div class="fb-like" data-href="{{$current_url}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
                                <div class="fb-save" data-uri="{{$current_url}}" data-size="large"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="halim_trailer"></div>
                    <div class="clearfix"></div>
                    <!-- Noi dung phim -->
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                {{$movie->description}}
                            </article>
                        </div>
                    </div>
                    
                    <!-- Tags phim  -->
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Tags phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                @if($movie->tags!=NULL)
                                    @php
                                        $tags = array();
                                        $tags = explode(',' , $movie->tags);
                                    @endphp
                                    @foreach($tags as $key => $tag)
                                        <a href="{{url('tag/'.$tag)}}">{{$tag}}</a>
                                    @endforeach
                                @else
                                    {{$movie->title}}
                                @endif    
                            </article>
                        </div>
                    </div>
                    
                    <div class="wrapper-comment">
                        <style>
                            .wrapper-comment {
                                background: white;
                                border-radius: 10px;
                                /* width: 500px; */
                                /* height: 300px; */
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                border-bottom-left-radius: 0;
                                border-bottom-right-radius: 0;
                            }

                            .wrapper-comment .form input {
                                background: #222222;
                                color: white;
                                font-size: 15px;
                                width: 600px;
                                border-radius: 20px;
                                padding: 10px;
                                border: none;
                                outline: none;
                                margin-bottom: 10px;
                                margin-top: 20px;
                            }

                            .wrapper-comment .form textarea {
                                background: #222222;
                                color: white;
                                font-size: 15px;
                                width: 600px;
                                border-radius: 20px;
                                padding: 10px;
                                border: none;
                                outline: none;
                                resize: none;
                            }

                            .wrapper-comment .form .btn {
                                background: #222222;
                                color: white;
                                font-size: 15px;
                                border: none;
                                outline: none;
                                cursor: pointer;
                                padding: 10px;
                                width: 200px;
                                border-radius: 20px;
                                margin: 0 auto;
                                display: block;
                                margin-top: 5px;
                                margin-bottom: 20px;
                                opacity: 0.8;
                                transition: 0.3s all ease;
                            }

                            .wrapper-comment .form .btn:hover {
                                opacity: 1;
                            }

                            .content-comment {
                                /* text-align: center; */
                                background: royalblue;
                                color: white;
                                padding: 10px;
                                /* width: 500px; */
                                border-radius: 10px;
                                border-top-left-radius: 0;
                                border-top-right-radius: 0;
                            }
                            .content-comment p {
                                margin-bottom: 15px;
                                /* width: 450px; */
                            }
                        </style>
                        <form action="" class="form">
                            <input type="text" class="comment_name" name="name" placeholder="Tên bình luận">
                            <br>
                            <textarea cols="10" rows="3" class="comment_content" placeholder="Nội dung bình luận"></textarea>
                            <div id="notify_comment"></div>
                            <br>
                            <button type="button" class="btn send-comment" >Gửi bình luận</button> 
                        </form>
                    </div>
                    <div class="content-comment">
                        <form>
                            @csrf
                            <input type="hidden" name="comment_movie_id" class="comment_movie_id" value="{{$movie->id}}">
                            <div id="comment_show"></div>
                        </form>
                    </div>
                    

                    <!-- comment fb -->
                    <!-- <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        @php 
                            $current_url = Request::url();
                        @endphp 
                        <div class="video-item halim-entry-box" style="color:#ffed4d">
                            <article id="post-38424" class="item-content">
                                <div class="fb-comments" data-href="http://127.0.0.1:8000/WebPhimlrv8/public/phim/{{$current_url}}" data-width="100%" data-numposts="10"></div>
                            </article>
                        </div>
                    </div> -->


                    <!-- Trailer phim  -->
                    @if($movie->trailer!=NULL)
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Trailer phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="watch_trailer" class="item-content">
                                <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$movie->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                                </iframe>
                            </article>
                        </div>
                    </div>
                    @endif
                </div>
            </section>
            <section class="related-movies">
                <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">
                    <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                    </div>
                    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach($related as $key => $hot)
                            @foreach($phimhot as $key => $hot)
                        <article class="thumb grid-item post-38498"  style="padding: 2px;">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{route('movie',[$hot->slug])}}" title="{{$hot->title}}">
                                    <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$hot->image)}}" alt="{{$hot->title}}" title="{{$hot->title}}"></figure>
                                    <span class="status">
                                        @if($hot->phude==0)
                                            Phụ đề 
                                        @else
                                            Thuyết minh
                                        @endif
                                    </span><span class="episode"><i class='fa fa-bookmark'></i>
                                  
                                        @if($hot->thuocphim=='phimle')
                                            @if($hot->resolution==0)
                                            HD
                                            @elseif($hot->resolution==1)
                                                SD 
                                            @elseif($hot->resolution==2)
                                                HDCam
                                            @elseif($hot->resolution==3)
                                                Cam
                                            @elseif($hot->resolution==4)
                                                FullHD
                                            @else
                                                Trailer    
                                            @endif   
                                        @else
                                            {{$hot->episode_count}}/{{$hot->sotap}} 
                                        @endif
                                    </span> 
                                    <div class="icon_overlay"></div>
                                    <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">{{$hot->title}}</p>
                                        <p class="original_title">{{$hot->name_eng}}
                                            @if($hot->phude==0)
                                                @if($hot->season!=0)
                                                    - season{{$hot->season}}
                                                @endif
                                            @else
                                                @if($hot->season!=0)
                                                    - season{{$hot->season}}
                                                @endif
                                            @endif
                                        </p>
                                    </div>
                                    </div>
                                </a>
                            </div>
                        </article>
                            @endforeach
                        @endforeach
                    </div>
                    <script>
                        jQuery(document).ready(function($) {	
                        var owl = $('#halim_related_movies-2');
                        owl.owlCarousel({
                            loop: true,margin: 5,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: 
                                ['<i class="fa fa-angle-double-left"></i>', '<i class="fa fa-angle-double-right"></i>'],responsiveClass: true,responsive: 
                                    {
                                        0: {items:2},
                                        480: {items:3}, 
                                        600: {items:5},
                                        1000: {items: 6}
                                    }})});
                    </script>
                </div>
            </section>
        </main>
        @include('FrontEnd.pages.include.sidebar')
    </div>

    <!-- Modal -->
    <div class="modal fade" id="Login_or_Register" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 style="color: #18e988;">
                                    <b> Wellcome GMovie..!</b>
                                </h3>
                                <div class="text-center" 
                                    style="
                                        margin-top: 25px;
                                        height: 168px;
                                        width:160px;
                                        border-radius:50%;
                                        background-color: #58d768;
                                        color: ghostwhite;
                                        padding-top:25px;
                                        font-size:20px;        
                                        ">
                                        
                                        <img src="{{asset('uploads/logo/'.$info->logo)}}" width="100%" > 
                                        Giữ nụ cười của bạn
                                    <!-- Keep your smile... -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-align: center;margin-top: 5px;">Bạn là thành viên mới..!</h6>
                                <a href="{{route('sign_up')}}" class="btn-block btn-primary text-center" 
                                    style="
                                        height:60px;
                                        width:auto;
                                        padding-top:12px;
                                        margin-top:25px;
                                        font-size:25px; 
                                        border: 1px solid #faf0e6 !important;
                                        border-radius: 10px;
                                        box-shadow: 0 4px 5px 0 rgb(0 0 0 / 10%), 0 2px 4px 0 rgb(0 0 0 / 19%);                                                                                   
                                        ">
                                    <span class="mt-5">Đăng ký</span>                                                        
                                </a>
                                <h5 class="mt-lg-5 text-center">Hoặc</h5>
                                <h6 class="text-align: center;margin-top: 5px;" >Bạn có sẵn tai khoản...!</h6>
                                <a href="{{route('sign_in')}}" class="btn-block btn-success text-center" 
                                    style="
                                        height:60px;
                                        width:auto;
                                        padding-top:12px;
                                        margin-top:10px;
                                        font-size:25px; 
                                        border: 1px solid #faf0e6 !important;
                                        border-radius: 10px;
                                        box-shadow: 0 4px 5px 0 rgb(0 0 0 / 10%), 0 2px 4px 0 rgb(0 0 0 / 19%);  
                                        ">

                                    <span class="mt-5">Đăng nhập</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  