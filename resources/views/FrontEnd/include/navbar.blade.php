
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="menu-main-menu-container">
        <ul id="top-menu" class="navbar-nav ml-auto">
        <li class="menu-item active"><a title="Trang Chủ" href="{{route('homepage')}}"><b>TRANG CHỦ</b> </a></li>
        <li class="menu-item">
            <a title="Thể loại" href="#">THỂ LOẠI</a>
            <ul class="sub-menu">
                @foreach($genre_home as $key => $genres)
                <li class="menu-item"><a title="{{$genres->title}}" href="{{route('genre', [$genres->slug])}}">{{$genres->title}}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="menu-item">
            <a title="Quốc Gia" href="#">QUỐC GIA</a>
            <ul class="sub-menu">
                @foreach($country_home as $key => $counties)
                <li class="menu-item"><a title="{{$counties->title}}" href="{{route('country', [$counties->slug])}}">{{$counties->title}}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="menu-item">
            <a title="Năm Phim" href="#">NĂM SẢN XUẤT</a>
            <ul class="sub-menu">
                @for($year=2000;$year<=2022;$year++)
                <li class="menu-item"><a title="{{$year}}" href="{{url('nam/'.$year)}}">{{$year}}</a></li>
                @endfor
            </ul>
        </li>
        <li class="menu-item">
            <a title="Danh mục" href="#">DANH MỤC</a>
            <ul class="sub-menu">
                @foreach($category_home as $key => $cate)
                <li class="menu-item"><a title="{{$cate->title}}" href="{{route('category', [$cate->slug])}}">{{$cate->title}}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="menu-item">
            <a href="#">LIÊN HỆ</a>
            <ul class="sub-menu">
                <li class="menu-item"><a href="#">VỀ BÊN MÌNH</a></li>
                <li class="menu-item"><a href="#">LIÊN HỆ</a></li>
            </ul>
        </li>
        </ul>
    </div>
</div>

