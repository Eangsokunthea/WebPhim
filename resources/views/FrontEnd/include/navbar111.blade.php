    <div class="navbar-container">
        <div class="">
        <!-- <div class="container"> -->
        <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                <span class="hl-search" aria-hidden="true"></span>
                </button>
                <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
                Bookmarks<i class="hl-bookmark" aria-hidden="true"></i>
                <span class="count">0</span>
                </button>
                <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">
                <a href="javascript:;" id="expand-ajax-filter" style="color: #ffed4d;">Lọc <i class="fas fa-filter"></i></a>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="halim">
                <div class="menu-menu_1-container">
                    <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                        <li class="current-menu-item active"><a title="Trang Chủ" href="{{route('homepage')}}">TRANG CHỦ</a></li>
                        <li class="mega dropdown">
                            <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">THỂ LOẠI <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach($genre_home as $key => $genres)
                                <li><a title="{{$genres->title}}" href="{{route('genre', [$genres->slug])}}">{{$genres->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="mega dropdown">
                            <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">QUỐC GIA <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach($country_home as $key => $counties)
                                <li><a title="{{$counties->title}}" href="{{route('country', [$counties->slug])}}">{{$counties->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="mega dropdown">
                            <a title="Năm Phim" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">NĂM SẢN XUẤT <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @for($year=2000;$year<=2022;$year++)
                                <li><a title="{{$year}}" href="{{url('nam/'.$year)}}">{{$year}}</a></li>
                                @endfor
                            </ul>
                        </li>
                        <li class="mega dropdown">
                            <a title="Danh mục" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">DANH MỤC <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach($category_home as $key => $cate)
                                <li class="mega"><a title="{{$cate->title}}" href="{{route('category', [$cate->slug])}}">{{$cate->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        
                    </ul>
                   
                </div>
                <!-- <ul class="nav navbar-nav navbar-left" style="background:#000;">
                    <li><a href="#" onclick="locphim()" style="color: #ffed4d;">Lọc Phim</a></li>
                </ul> -->
            </div>
        </nav>
        <div class="collapse navbar-collapse" id="search-form">
            <div id="mobile-search-form" class="halim-search-form"></div>
        </div>
        <div class="collapse navbar-collapse" id="user-info">
            <div id="mobile-user-login"></div>
        </div>
        </div>
    </div>     
    </div>