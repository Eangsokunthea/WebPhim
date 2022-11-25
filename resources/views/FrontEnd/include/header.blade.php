
<header id="header">
    <div class="container">
        <div class="row" id="headwrap">
            <div class="col-md-3 col-sm-6 slogan">
                <p class=""><a class="logo" href="" title="phim hay ">
                    <img src="{{asset('uploads/logo/'.$info->logo)}}" width="100px" alt=""> 
                </a></p>
                </a>
                <!-- <a class="logo" href="" title="phim hay "><img src="{{asset('/FrontEnd/img/Gmovies.png')}}" width="90px" alt=""></a> -->
            </div>
            <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
                <div class="header-nav">
                    <div class="col-xs-12">
                        <style type="text/css">
                            ul#result {
                                position: absolute;
                                z-index: 9999;
                                background: #1b2d3c;
                                width: 94%;
                                padding: 10px;
                                margin: 1px;
                            }
                        </style>
                        <div class="form-group form-timkiem">
                            <div class="input-group col-xs-12"> 
                                <form action="{{route('tim-kiem')}}" method="GET">
                                    <input id="timkiem" type="text" name="search" class="form-control" placeholder="Tìm kiếm phim..." autocomplete="off">
                                    <i class="animate-spin hl-spin4 hidden">Tìm kiếm</i>
                                    <!-- <button class="btn btn-primary">Tìm kiếm</button> -->
                                </form>
                            </div>
                        </div>
                        
                    <ul class="list-group" id="result" style="display: none;"></ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 hidden-xs">
                <div id="get-bookmark" class="box-shadow"><i class="hl-bookmark"></i><span> Bookmarks</span><span class="count">0</span></div>
                <div id="bookmark-list" class="hidden bookmark-list-on-pc">
                    <ul style="margin: 0;"></ul>
                </div>
                
                <div class="btn-group">
                    <button type="button" class="toggle dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('lang.language') 
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{url('lang/vi')}}"><img src="{{asset('frontEnd/img/vietnam.png')}}" width="20px"> Tiếng Việt</a></li>
                        <li><a class="dropdown-item" href="{{url('lang/kh')}}"><img src="{{asset('frontEnd/img/cambodia.png')}}" width="20px"> Tiếng Khmer</a></li>
                        <li><a class="dropdown-item" href="{{url('lang/en')}}"><img src="{{asset('frontEnd/img/english.png')}}" width="20px"> Tiếng Anh</a></li>
                        <li><a class="dropdown-item" href="{{url('lang/cn')}}"><img src="{{asset('frontEnd/img/china.png')}}" width="20px"> Tiếng Trung</a></li>
                    </ul>
                </div>

                <div class="toggle"><img src="{{asset('/frontEnd/img/moon.png')}}" id="Mode" width="20px" class="mode_icon" alt=""></div>

                <style>
                    :root{
                        --primary-color: #212121;
                        --secondary-color: #f5f5f5;
                        --shadow: rgba(0, 0, 0, 0.2);
                    }
                    .dark{
                        --primary-color: #f5f5f5;
                        --secondary-color: #212121;
                        --shadow: rgba(255, 255, 255, 0.2);
                    }

                    /* .warning:hover {
                    background: #ff9800;
                    color: white;
                    }  */

                    .mode_icon{
                        color:#fff; 
                    }

                    body.halimthemes {
                        color: #a5a5a5;
                        font-size: 14px;
                        line-height: 1.6;
                        letter-spacing: 0.6px;
                        overflow-x: hidden;
                        background: var(--primary-color) url(assets/images/halimBg.png) fixed center;
                    }
                    
                    .movie_info {
                       
                        /* background: #00000026; */
                        background: #212121;
                       
                    }
                    #wrapper {
                        background: var(--primary-color);
                        padding: 0 0 15px;
                    }
                    .toggle{
                        background:#224361; 
                        display:inline-block; 
                        line-height:20px; 
                        padding:6px 15px; 
                        border-radius:20px; 
                        color:#fff; 
                        cursor:pointer; 
                        transition:.4s all; 
                        margin-top:1px; 
                        margin-right:15px 
                    }
                   
                    .toggle:hover { 
                        background:#337ab7 
                    } 

                </style>
                
            </div>           
        </div>
        
    </div>
</header>
