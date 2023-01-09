@extends('FrontEnd.master')
@section('title')
    Phim hay 2022 - Xem phim hay nhất
@endsection
@section('content')
    <div class="row" id="wrapper" style="margin-left: 10px; margin-right: 10px; margin-top:80px;">
    <!-- <div class="row container" id="wrapper"> -->
        <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="halim-panel-filter">
                <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                    <div class="ajax"></div>
                </div>
            </div>
            <div id="halim_related_movies-2xx" class="wrap-slider">
                <div class="section-bar clearfix">
                    <h3 class="section-title"><span>PHIM NỔI BẬT</span></h3>
                </div>
                <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                    @foreach($phimhot as $key => $hot)
                    <article class="thumb grid-item post-38498" style="padding: 2px;">
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
                                        <!-- @if($hot->season!=0)
                                            - Season {{$hot->season}}
                                        @endif -->
                                    @else
                                        {{$hot->episode_count}}/{{$hot->sotap}} 
                                        <!-- Thuyết minh -->
                                        <!-- @if($hot->season!=0)
                                            - Season {{$hot->season}}
                                        @endif -->
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
                </div>
                <script>
                    jQuery(document).ready(function($) {	
                    var owl = $('#halim_related_movies-2');
                    owl.owlCarousel({
                        loop: true,margin: 5,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: 
                            ['<i class="fa fa-angle-double-left"></i>', '<i class="fa fa-angle-double-right"></i>'],responsiveClass: true,responsive: 
                                {
                                    0: {items:2},
                                    // 600: {items:2},
                                    // 1000: {items:6},
                                    480: {items:3}, 
                                    600: {items:5},
                                    1000: {items: 8}
                                }})});
                </script>
            </div>
        </div>
    </div>
    <div class="row" id="wrapper" style="margin-left: 10px; margin-right: 10px;">
        <main id="main-contents" class="col-sm-8 col-xs-12 col-md-7">
            @foreach($Category_home as $key => $cate_home)
            <section id="halim-advanced-widget-2">
                <div class="section-heading">
                    <span class="h-text">{{$cate_home->title}}</span>
                    
                    <style>
                        .xemphim{
                            position: absolute;
                            right: 0;
                            font-weight: 400;
                            line-height: 21px;
                            text-transform: uppercase;
                            padding: 9px 25px 9px px 10px;
                        }
                    </style>

                    <a href="{{route('category',$cate_home->slug)}}" class="xemphim" title="Xem thêm">
                        <span class="h-text">Xem thêm</span>
                    </a>
                </div> 
                <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                    @foreach($cate_home->movie->take(18) as $key => $mov)
                    <article class="col-md-2 col-sm-2 col-xs-5 thumb grid-item post-37606">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{route('movie',[$mov->slug])}}">
                                <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$mov->image)}}" alt="{{$mov->title}}" title="{{$mov->title}}"></figure>
                                <span class="status">
                                    @if($mov->phude==0)
                                        Phụ đề 
                                    @else
                                        Thuyết minh
                                    @endif
                                </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                    @if($mov->thuocphim=='phimle')
                                        @if($mov->resolution==0)
                                            HD
                                        @elseif($mov->resolution==1)
                                            SD 
                                        @elseif($mov->resolution==2)
                                            HDCam
                                        @elseif($mov->resolution==3)
                                            Cam
                                        @elseif($mov->resolution==4)
                                            FullHD
                                        @else
                                            Trailer    
                                        @endif   
                                    @else
                                        {{$mov->episode_count}}/{{$mov->sotap}} 
                                    @endif   
                                
                                </span> 
                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                    <p class="entry-title">{{$mov->title}}</p>
                                    <p class="original_title">{{$mov->name_eng}}
                                        @if($mov->phude==0)
                                            @if($mov->season!=0)
                                                - season{{$mov->season}}
                                            @endif
                                        @else
                                            @if($mov->season!=0)
                                                - season{{$mov->season}}
                                            @endif
                                        @endif
                                    </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>
            <div class="clearfix"></div>
            @endforeach
            
        </main>
        @include('FrontEnd.pages.include.sidebar')
    </div>

@endsection    
