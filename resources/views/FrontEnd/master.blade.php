<!DOCTYPE html>
<html lang="vi">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta name="theme-color" content="#234556">
      <meta http-equiv="Content-Language" content="vi" />
      <meta content="VN" name="geo.region" />
      <meta name="DC.language" scheme="utf-8" content="vi" />
      <meta name="language" content="Việt Nam">
      

      <link rel="shortcut icon" href="https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png" type="image/x-icon" />
      <meta name="revisit-after" content="1 days" />
      <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
      <title>@yield('title')</title>
      <meta name="description" content="Phim hay 2021 - Xem phim hay nhất, xem phim online miễn phí, phim hot , phim nhanh" />
      <link rel="canonical" href="">
      <link rel="next" href="" />
      <meta property="og:locale" content="vi_VN" />
      <meta property="og:title" content="Phim hay 2020 - Xem phim hay nhất" />
      <meta property="og:description" content="Phim hay 2020 - Xem phim hay nhất, phim hay trung quốc, hàn quốc, việt nam, mỹ, hong kong , chiếu rạp" />
      <meta property="og:url" content="" />
      <meta property="og:site_name" content="Phim hay 2021- Xem phim hay nhất" />
      <meta property="og:image" content="" />
      <meta property="og:image:width" content="300" />
      <meta property="og:image:height" content="55" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
     
      <link rel='dns-prefetch' href='//s.w.org' />
      
      <link rel='stylesheet' id='bootstrap-css' href="{{asset('/frontEnd/css/bootstrap.min.css')}}" media='all' />
      <link rel='stylesheet' id='style-css' href="{{asset('/frontEnd/css/style.css')}}" media='all' />
      <link rel='stylesheet' id='wp-block-library-css' href="{{asset('/frontEnd/css/style.min.css')}}" media='all' />
      <script type='text/javascript' src="{{asset('/frontEnd/js/jquery.min.js')}}" id='halim-jquery-js'></script>
      <style type="text/css" id="wp-custom-css">
         .textwidget p a img {
         width: 100%;
         }
      </style>
      <style>#header .site-title {background: url(https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png) no-repeat top left;background-size: contain;text-indent: -9999px;}</style>
   </head>
   <body class="home blog halimthemes halimmovies" data-masonry="">
        
      @include('FrontEnd.include.header')
      
      @include('FrontEnd.include.navbar')

      
      <div class="container">
         <div class="row fullwith-slider"></div>
      </div>

      <div class="container">
         @yield('content')
      </div>

      <div class="clearfix"></div>

     
      @include('FrontEnd.include.footer')

      <div id='easy-top'></div>
     
      <script type='text/javascript' src="{{asset('/')}}frontEnd/js/bootstrap.min.js" id='bootstrap-js'></script>
      <script type='text/javascript' src="{{asset('/')}}frontEnd/js/owl.carousel.min.js" id='carousel-js'></script>
     
      <script type='text/javascript' src="{{asset('/')}}frontEnd/js/halimtheme-core.min.js" id='halim-init-js'></script>
      
      <!-- comment script   -->
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0" nonce="hj0cswcH"></script>
      
      <script type='text/javascript'>
         $(".watch_trailer").click(function(){
            e.preventDefault();
            var aid = $(this).attr("href");
            $('html,body').animate({scrollTop: $(aid).offset().top},'slow');
         });

      </script>
      <script type='text/javascript'>
         $(document).ready(function(){
            $.ajax({
               url:"{{url('/filter-topview-default')}}",
               method:"GET",
               success:function(data)
               {
                  $('#show0').html(data);
               }
            });
         
            $('.filter-sidebar').click(function(){
               var href = $(this).attr('href');
               if(href=='#ngay'){
                  var value = 0;
               }else if(href=='#tuan'){
                  var value = 1;
               }else{
                  var value = 2;
               }
               $.ajax({
                  url:"{{url('/filter-topview-phim')}}",
                  method:"GET",
                  data:{value:value},
                  success:function(data)
                  {
                     $('#show'+value).html(data);
                  }
               });
            })
         })
      </script>
   
      <script type='text/javascript'>
         $(document).ready(function(){
            $('#timkiem').keyup(function(){
               $('#result').html('');
               var search = $('#timkiem').val();
               if(search!=''){
                  $('#result').css('display','inherit');
                  var expression = new RegExp(search, "i");
                  $.getJSON('json_file/movies.json', function(data){
                     $.each(data,function(key, value){
                        if(value.title.search(expression) != -1 || value.description.search(expression) != -1){
                           $('#result').append('<li style="cursor:pointer; display: flex; max-height: 200px;" class="list-group-item link-class"><img src="uploads/movie/'+value.image+'" width="100" class="" /><div style="flex-direction: column; margin-left: 2px;"><h4 width="100%">'+value.title+'</h4><span style="display: -webkit-box; max-height: 8.2rem; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; white-space: normal; -webkit-line-clamp: 5; line-height: 1.6rem;" class="text-muted">| '+value.description+'</span></div></li>');
                        }
                     });
                  })
               }else{
                  $('#result').css('display', 'none');
               }
            })
            $('#result').on('click', 'li', function(){
               var click_text = $(this).text().split('|');
               $('#timkiem').val($.trim(click_text[0]));
               $("#result").html('');
            });

            // $('#timkiem').keyup(function(){
            //    $('#result').html('');
            //    var search = $('#timkiem').val();
            //    if(search!=''){
            //       var expression = new RegExp(search, "i");
            //       $.getJSON('/json_file/movies.json', function(data){
            //          $.each(data,function(key, value){
            //             if(value.title.search(expression) != -1 || value.description.search(expression) != -1){
            //                $('#result').css('display','inherit');
            //                $('#result').append('<li style="cursor:pointer" class="list-group-item link-class"><img src="/uploads/movie/'+value.image+'" height="40" width="40" > '+value.title+'<br> -><span class="text-muted"> '+value.description+'</span></li>');
            //             }
            //          });
            //       });
            //    }else{
            //       $('#result').css('display', 'none');
            //    }
            // })

            // $('#result').on('click', 'li', function(){
            //    var click_text = $(this).text().split('->');
            //    $('#timkiem').val($.trim(click_text[0]));
            //    $("#result").html('');
            // });
         })

      </script>

      <style>#overlay_mb{position:fixed;display:none;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0, 0, 0, 0.7);z-index:99999;cursor:pointer}#overlay_mb .overlay_mb_content{position:relative;height:100%}.overlay_mb_block{display:inline-block;position:relative}#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:600px;height:auto;position:relative;left:50%;top:50%;transform:translate(-50%, -50%);text-align:center}#overlay_mb .overlay_mb_content .cls_ov{color:#fff;text-align:center;cursor:pointer;position:absolute;top:5px;right:5px;z-index:999999;font-size:14px;padding:4px 10px;border:1px solid #aeaeae;background-color:rgba(0, 0, 0, 0.7)}#overlay_mb img{position:relative;z-index:999}@media only screen and (max-width: 768px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:400px;top:3%;transform:translate(-50%, 3%)}}@media only screen and (max-width: 400px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:310px;top:3%;transform:translate(-50%, 3%)}}</style>
    
      <style>
         #overlay_pc {
         position: fixed;
         display: none;
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background-color: rgba(0, 0, 0, 0.7);
         z-index: 99999;
         cursor: pointer;
         }
         #overlay_pc .overlay_pc_content {
         position: relative;
         height: 100%;
         }
         .overlay_pc_block {
         display: inline-block;
         position: relative;
         }
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 600px;
         height: auto;
         position: relative;
         left: 50%;
         top: 50%;
         transform: translate(-50%, -50%);
         text-align: center;
         }
         #overlay_pc .overlay_pc_content .cls_ov {
         color: #fff;
         text-align: center;
         cursor: pointer;
         position: absolute;
         top: 5px;
         right: 5px;
         z-index: 999999;
         font-size: 14px;
         padding: 4px 10px;
         border: 1px solid #aeaeae;
         background-color: rgba(0, 0, 0, 0.7);
         }
         #overlay_pc img {
         position: relative;
         z-index: 999;
         }
         @media only screen and (max-width: 768px) {
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 400px;
         top: 3%;
         transform: translate(-50%, 3%);
         }
         }
         @media only screen and (max-width: 400px) {
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 310px;
         top: 3%;
         transform: translate(-50%, 3%);
         }
         }
      </style>
     
      <style>
         .float-ck { position: fixed; bottom: 0px; z-index: 9}
         * html .float-ck /* IE6 position fixed Bottom */{position:absolute;bottom:auto;top:expression(eval (document.documentElement.scrollTop+document.docum entElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0))) ;}
         #hide_float_left a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;float: left;}
         #hide_float_left_m a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;}
         span.bannermobi2 img {height: 70px;width: 300px;}
         #hide_float_right a { background: #01AEF0; padding: 5px 5px 1px 5px; color: #FFF;float: left;}
      </style>
        
   </body>

</html>

