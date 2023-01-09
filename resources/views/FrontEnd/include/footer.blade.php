

 <footer id="footer" class="clearfix" style="background: var(--primary-color) !important;">
    <!-- <div class="container footer-columns"> -->
    <div class="footer-columns" style="border-bottom: 1px solid #faf0e6; ">
        <div class="col-md-12">
            <!-- <div class="row container"> -->
                <div class="widget about col-xs-12 col-sm-4 col-md-2">
                    <div class="footer-logo">
                        <img class="img-responsive" src="{{asset('uploads/logo/'.$info->logo)}}" width="100px" alt="Phim hay 2022- Xem phim hay nhất"> 
                    </div>
                </div>
                <div class="widget about col-xs-12 col-sm-4 col-md-7">
                    <div class="footer-logo">
                        <p style="color: #eec10a;">{{$info->description}}</p>
                    </div>
                </div>
                <div class="widget about col-xs-12 col-sm-4 col-md-2">
                    <div class="footer-logo" style="padding-left: 80px;">
                        Liên hệ QC: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail=" bvb  vgb hg bncd vbg cvgb" style="color: #eec10a;">[email&#160;eangsokuntheaeang198@gmail.com]</a>
                    </div>
                </div>
            <!-- </div> -->
        </div>
        
    </div>
</footer>
<style>
    .copyright{
        text-align: center;
        line-height: 32px;
        color: #fc8900;
        border-top: 1px solid #faf0e6;
        background: #e6f1fa;
    }
</style>
<div class="col-xs-12 col-sm-4 col-md-12 copyright">
    {{$info->copyright}}
</div>