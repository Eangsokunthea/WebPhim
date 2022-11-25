

 <footer id="footer" class="clearfix">
    <div class="container footer-columns">
        <div class="row container">
            <div class="widget about col-xs-12 col-sm-4 col-md-2">
                <div class="footer-logo">
                    <img class="img-responsive" src="{{asset('uploads/logo/'.$info->logo)}}" width="100px" alt="Phim hay 2022- Xem phim hay nhất"> 
                </div>
            </div>
            <div class="widget about col-xs-12 col-sm-4 col-md-8">
                <div class="footer-logo">
                    <p>{{$info->description}}</p>
                </div>
            </div>
            <div class="widget about col-xs-12 col-sm-4 col-md-2">
                <div class="footer-logo">
                    Liên hệ QC: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail=" bvb  vgb hg bncd vbg cvgb">[email&#160;eangsokuntheaeang198@gmail.com]</a>
                </div>
            </div>
        </div>
        
    </div>
</footer>
<style>
    .copyright{
        text-align: center;
        line-height: 32px;
        color: #fcc200;
    }
</style>
<div class="col-xs-12 col-sm-4 col-md-12 copyright">
    <p>{{$info->copyright}}</p>
</div>