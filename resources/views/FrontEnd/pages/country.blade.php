@extends('FrontEnd.master')
@section('title')
    Phim hay 2022 - Xem phim hay nhất
@endsection

@section('content')
    <div class="row" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                    <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{$count_slug->title}}</a> » <span class="breadcrumb_last" aria-current="page">2022</span></span></span></div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
    </div>
    <div class="row" id="wrapper" style="margin-left: 10px; margin-right: 10px;">
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-7">
            <section>
                <div class="section-bar clearfix">
                    <h1 class="section-title"><span>{{$count_slug->title}}</span></h1>
                </div>
                <div class="section-bar clearfix">
                    <div class="row">
                        @include('FrontEnd.pages.include.locphim')
                    </div>
                </div>
                <div class="halim_box">
                    @foreach($movie as $key => $mov)
                    <article class="col-md-2 col-sm-3 col-xs-6 thumb grid-item post-37606">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{route('movie',$mov->slug)}}">
                                <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$mov->image)}}" alt="{{$mov->title}}" title="{{$mov->title}}"></figure>
                                <span class="status">
                                    @if($mov->phude==0)
                                        Phụ đề 
                                    @else
                                        Thuyết minh
                                    @endif
                                </span>
                                <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                    
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
                <div class="clearfix"></div>
                <div class="text-center">
                    {!! $movie->links("pagination::bootstrap-4") !!}
                </div>
            </section>
        </main>
        @include('FrontEnd.pages.include.sidebar')
    </div>

@endsection    
