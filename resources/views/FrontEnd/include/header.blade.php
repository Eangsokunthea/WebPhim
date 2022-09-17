
<header id="header">
    <div class="container">
    <div class="row" id="headwrap">
        <div class="col-md-3 col-sm-6 slogan">
            <!-- <p class="site-title"><a class="logo" href="" title="phim hay ">Phim Hay</p></a> -->
            <a class="logo" href="" title="phim hay "><img src="{{asset('/FrontEnd/img/Gmovies.png')}}" width="90px" alt=""></a>
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
        </div>
    </div>
    </div>
</header>