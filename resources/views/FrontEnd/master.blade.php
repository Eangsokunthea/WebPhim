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
      <meta name="csrf-token" content="{{csrf_token()}}" />
      

      <link rel="shortcut icon" href="{{asset('uploads/logo/'.$info->logo)}}" type="image/x-icon" />
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

      <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

      <link rel='dns-prefetch' href='//s.w.org' />

      <link rel='stylesheet' id='bootstrap-css' href="{{asset('/frontEnd/css/bootstrap.min.css')}}" media='all' />
      <link rel='stylesheet' id='style-css' href="{{asset('/frontEnd/css/style.css')}}" media='all' />
      <link rel='stylesheet' id='wp-block-library-css' href="{{asset('/frontEnd/css/style.min.css')}}" media='all' />

      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"  />
      <link rel="stylesheet" href="{{asset('/frontEnd/f2/style.css')}}" />
      
      <!--  -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

      <script type='text/javascript' src="{{asset('/frontEnd/js/jquery.min.js')}}" id='halim-jquery-js'></script>
      
      <style type="text/css" id="wp-custom-css">
         .textwidget p a img {
         width: 100%;
         }
      </style>

      <style>
         #header {
            background: var(--primary-color) !important;
            /* background: #1b2d3c; */
         }

         #timkiem{
            background: var(--primary-color);
         }
         #get-bookmark{
            background: var(--primary-color);
            /* color: var(--secondary-color); */
            color: #ffd700;
         }
         #get-bookmark:hover {
            background:#224361; 
            /* background: var(--primary-color); */
         }

        
         .movie_info {  
            /* background: #00000026; */
            /* background: #212121; */
            color: var(--secondary-color); 
            background: var(--primary-color);
            
         }
         #wrapper {
            /* background:#224361;  */
            background: var(--primary-color);
            padding: 0 0 15px;
         }
         .toggles{
            /* background: var(--primary-color); */
            color: var(--secondary-color); 
            /* color: #ffd700; */
            /* background:#224361; */
            /* background:#224361;  */
            display:inline-block; 
            line-height:20px; 
            padding:6px 15px; 
            border-radius:20px; 
            /* color:#fff;  */
            cursor:pointer; 
            transition:.4s all; 
            margin-top:1px; 
            margin-right:15px 
         }
         .box-shadow {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
         }
       
         .toggles:hover { 
            /* background:#224361;  */
            /* background: var(--primary-color); */
            background:#224361; 
         } 
         
         .popular-post .item {
            background: var(--primary-color);
            /* background: #0b0f15; */
            border: 1px solid #faf0e6 !important;
            border-radius: 6px;
            box-shadow: 0 4px 5px 0 rgb(0 0 0 / 10%), 0 2px 4px 0 rgb(0 0 0 / 19%);
         }
   
         .popular-post p.title {
            color: var(--secondary-color);
         }

         .halim-panel-filter .panel-heading {
            background: var(--primary-color);
            /* background: #1821299e; */
            /* border: 1px solid #faf0e6; */
            /* border-bottom: 1px solid #1d2731; */
            /* border-style: solid;
            border-width: 0px 1px 2px 1px; 
            border-bottom: 1px solid #faf0e6; */
            border: 1px solid #faf0e6;
            border-radius: 6px;
            box-shadow: 0 4px 5px 0 rgb(0 0 0 / 10%), 0 2px 4px 0 rgb(0 0 0 / 19%);
            padding: 12px 15px;
         }

         ul.list-info-group {
            /* border: 1px solid #14212d; */
            border: none;
            padding: 12px 10px;
            color: var(--secondary-color);
            background: var(--primary-color);
            /* border: 1px solid #faf0e6 !important;
            border-radius: 6px;
            box-shadow: 0 4px 5px 0 rgb(0 0 0 / 10%), 0 2px 4px 0 rgb(0 0 0 / 19%); */
            /* background: #00000026;  */
            text-shadow: 0px 0px 0px #000;
            box-shadow: 0 4px 5px 0 rgb(0 0 0 / 10%), 0 0px 0px 0 rgb(0 0 0 / 19%);
            /*box-shadow: inset 0 1px 1px transparent, 0 1px 10px rgb(0 0 0 / 86%); */
         }
         /* .bluan {
            color: var(--secondary-color) !important;
         } */
        

    
      </style>
      
      <style>#header .site-title {background: url(https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png) no-repeat top left;background-size: contain;text-indent: -9999px;}</style>
   </head>
   <body class="blog halimthemes halimmovies" data-masonry="">
         
         @include('FrontEnd.include.header')
         
         <!-- @include('FrontEnd.include.navbar') -->

         
         <!-- <div class=""> -->
         <div class="container">
            <div class="row fullwith-slider"></div>
         </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <!-- <div class="container p-0"> -->
               @yield('content')
               @include('FrontEnd.pages.include.banner')
         </div>

         <div class="clearfix"></div>

      
         @include('FrontEnd.include.footer')

         <div id='easy-top'></div>
      
         <script type='text/javascript' src="{{asset('/')}}frontEnd/js/bootstrap.min.js" id='bootstrap-js'></script>
         <script type='text/javascript' src="{{asset('/')}}frontEnd/js/owl.carousel.min.js" id='carousel-js'></script>
      
         <!-- <script type='text/javascript' src="{{asset('/')}}frontEnd/js/halimtheme-core.min.js" id='halim-init-js'></script> -->
         
         <!-- comment script   -->
         <div id="fb-root"></div>
         <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v14.0" nonce="hj0cswcH"></script>
         
         <script type="text/javascript">
            $(document).ready(function(){
               
               load_comment();

               function load_comment(){
                     var movie_id = $('.comment_movie_id').val();
                     var _token = $('input[name="_token"]').val();
                     $.ajax({
                     url:"{{url('/load-comment')}}",
                     method:"POST",
                     headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     data:{movie_id:movie_id, _token:_token},
                     success:function(data){
                     
                        $('#comment_show').html(data);
                     }
                     });
               }
               $('.send-comment').click(function(){
                     var movie_id = $('.comment_movie_id').val();
                     var comment_name = $('.comment_name').val();
                     var comment_content = $('.comment_content').val();
                     var _token = $('input[name="_token"]').val();
                     $.ajax({
                     url:"{{url('/send-comment')}}",
                     method:"POST",
                     headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     data:{movie_id:movie_id,comment_name:comment_name,comment_content:comment_content, _token:_token},
                     success:function(data){
                        
                        $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>');
                        load_comment();
                        $('#notify_comment').fadeOut(9000);
                        $('.comment_name').val('');
                        $('.comment_content').val('');
                     }
                     });
               });
            });
         </script>
         
         <script src="{{asset('/frontEnd/f2/main.js')}}"></script>
         
         
         <!-- dark/mode -->
         <!-- <script>
            var Mode = document.getElementById("Mode");

            Mode.onclick = function(){
               document.body.classList.toggle("dark");
               if(document.body.classList.contains("dark")){
                     Mode.src = "{{asset('/frontEnd/img/Rsun.png')}}"; 
                    

               }else{
                     Mode.src = "{{asset('/frontEnd/img/moon.png')}}";
                     
               }
            }
         </script> -->

         <!-- banner show -->
         <!-- <script type='text/javascript'>
            $(window).on('load', function(){
               $('#banner_quangcao').modal('show');
            });
         </script> -->
         
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
      
         <!-- tim kiem    -->
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

   <!-- Đoạn script đánh giá phim -->
      <script type="text/javascript">
         
         function remove_background(movie_id)
            {
            for(var count = 1; count <= 5; count++)
            {
            $('#'+movie_id+'-'+count).css('color', '#ccc');
            }
         }

         //hover chuột đánh giá sao
         $(document).on('mouseenter', '.rating', function(){
            var index = $(this).data("index");
            var movie_id = $(this).data('movie_id');
         // alert(index);
         // alert(movie_id);
            remove_background(movie_id);
            for(var count = 1; count<=index; count++)
            {
            $('#'+movie_id+'-'+count).css('color', '#ffcc00');
            }
         });
         //nhả chuột ko đánh giá
         $(document).on('mouseleave', '.rating', function(){
            var index = $(this).data("index");
            var movie_id = $(this).data('movie_id');
            var rating = $(this).data("rating");
            remove_background(movie_id);
            //alert(rating);
            for(var count = 1; count<=rating; count++)
            {
            $('#'+movie_id+'-'+count).css('color', '#ffcc00');
            }
            });

         //click đánh giá sao
         $(document).on('click', '.rating', function(){
            
               var index = $(this).data("index");
               var movie_id = $(this).data('movie_id');
            
               $.ajax({
                  url:"{{route('add-rating')}}",
                  method:"POST",
                  data:{index:index, movie_id:movie_id},
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success:function(data)
                  {
                  if(data == 'done')
                  {
                  
                  alert("Bạn đã đánh giá "+index +" trên 5");
                  location.reload();
                  
                  }else if(data =='exist'){
                     alert("Bạn đã đánh giá phim này rồi,cảm ơn bạn nhé");
                  }
                  else
                  {
                  alert("Lỗi đánh giá");
                  }
                  
                  }
               });
         });
      
      </script>

<!-- google translate -->
<!-- ------------------CSS-------------- -->
   <style>/*<![CDATA[*/
      #google_translate_element{padding: 5px 15px 2px 15px;right: 42px;top: 12px;}
      .goog-te-banner-frame.skiptranslate,.goog-te-gadget-simple img,img.goog-te-gadget-icon,.goog-te-menu-value span{display:none!important;}
      .goog-te-menu-frame{box-shadow:none!important;}
      .goog-te-gadget-simple{background-color:transparent!important;background: url("data:image/svg+xml,%3Csvg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20,5H10.88L10,2H4A2,2 0 0,0 2,4V17A2,2 0 0,0 4,19H11L12,22H20A2,2 0 0,0 22,20V7A2,2 0 0,0 20,5M7.17,14.59A4.09,4.09 0 0,1 3.08,10.5A4.09,4.09 0 0,1 7.17,6.41C8.21,6.41 9.16,6.78 9.91,7.5L10,7.54L8.75,8.72L8.69,8.67C8.4,8.4 7.91,8.08 7.17,8.08C5.86,8.08 4.79,9.17 4.79,10.5C4.79,11.83 5.86,12.92 7.17,12.92C8.54,12.92 9.13,12.05 9.29,11.46H7.08V9.91H11.03L11.04,10C11.08,10.19 11.09,10.38 11.09,10.59C11.09,12.94 9.5,14.59 7.17,14.59M13.2,12.88C13.53,13.5 13.94,14.06 14.39,14.58L13.85,15.11L13.2,12.88M13.97,12.12H13L12.67,11.08H16.66C16.66,11.08 16.32,12.39 15.1,13.82C14.58,13.2 14.21,12.59 13.97,12.12M21,20A1,1 0 0,1 20,21H13L15,19L14.19,16.23L15.11,15.31L17.79,18L18.5,17.27L15.81,14.59C16.71,13.56 17.41,12.34 17.73,11.08H19V10.04H15.36V9H14.32V10.04H12.36L11.18,6H20A1,1 0 0,1 21,7V20Z' fill='rgb(255,215,0)'/%3E%3C/svg%3E") center / 12px no-repeat;-webkit-transition:all .2s ease;transition:all .2s ease;background-size: 20px 20px;display:inline-block;font-weight:400;line-height: 1.8;padding:0 6px;text-align:center;white-space:nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action:manipulation;cursor:pointer;-webkit-user-select: none;-moz-user-select:none;-ms-user-select:none;user-select:none;border-left:none!important;border-top:none!important;border-bottom:none!important;border-right:none!important;border-radius: 4px}
   </style>
<!-- -----------------------------JS------------- -->
   <script>/*<![CDATA[*/
      (function(){var gtConstEvalStartTime = new Date();
      var c="Translate",g=this||self;function h(a,b){a=a.split(".");var d=g;a[0]in d||"undefined"==typeof d.execScript||d.execScript("var "+a[0]);for(var e;a.length&&(e=a.shift());)a.length||void 0===b?d[e]&&d[e]!==Object.prototype[e]?d=d[e]:d=d[e]={}:d[e]=b}
      function k(a,b){function d(){}d.prototype=b.prototype;a.ka=b.prototype;a.prototype=new d;a.prototype.constructor=a;a.ja=function(e,f,v){for(var w=Array(arguments.length-2),n=2;n<arguments.length;n++)w[n-2]=arguments[n];return b.prototype[f].apply(e,w)}}function l(a){return a};function m(){return"[msg_undefined]"}var p={};

      (function(){if(void 0==window.CLOSURE_DEFINES||window.CLOSURE_DEFINES["te.msg.EMBED_MESSAGES"]){p={Y:function(){return MSG_TRANSLATE},m:function(){return MSG_CANCEL},s:function(){return MSG_CLOSE},K:function(){return MSGFUNC_PAGE_TRANSLATED_TO},Z:function(){return MSGFUNC_TRANSLATED_TO},B:function(){return MSG_GENERAL_ERROR},D:function(){return MSG_LANGUAGE_UNSUPPORTED},F:function(){return MSG_LEARN_MORE},L:function(){return MSGFUNC_POWERED_BY},ba:function(){return MSG_TRANSLATE_PRODUCT_NAME},da:function(){return MSG_TRANSLATION_IN_PROGRESS},
      aa:function(){return MSGFUNC_TRANSLATE_PAGE_TO},ia:function(){return MSGFUNC_VIEW_PAGE_IN},M:function(){return MSG_RESTORE},U:function(){return MSG_SSL_INFO_LOCAL_FILE},V:function(){return MSG_SSL_INFO_SECURE_PAGE},T:function(){return MSG_SSL_INFO_INTRANET_PAGE},N:function(){return MSG_SELECT_LANGUAGE},fa:function(){return MSGFUNC_TURN_OFF_TRANSLATION},ea:function(){return MSGFUNC_TURN_OFF_FOR},l:function(){return MSG_ALWAYS_HIDE_AUTO_POPUP_BANNER},I:function(){return MSG_ORIGINAL_TEXT},J:function(){return MSG_ORIGINAL_TEXT_NO_COLON},
      A:function(){return MSG_FILL_SUGGESTION},W:function(){return MSG_SUBMIT_SUGGESTION},S:function(){return MSG_SHOW_TRANSLATE_ALL},R:function(){return MSG_SHOW_RESTORE_ALL},O:function(){return MSG_SHOW_CANCEL_ALL},ca:function(){return MSG_TRANSLATE_TO_MY_LANGUAGE},$:function(){return MSGFUNC_TRANSLATE_EVERYTHING_TO},P:function(){return MSG_SHOW_ORIGINAL_LANGUAGES},H:function(){return MSG_OPTIONS},ga:function(){return MSG_TURN_OFF_TRANSLATION_FOR_THIS_SITE},G:function(){return MSG_MANAGE_TRANSLATION_FOR_THIS_SITE},
      j:function(){return MSG_ALT_SUGGESTION},h:function(){return MSG_ALT_ACTIVITY_HELPER_TEXT},i:function(){return MSG_ALT_AND_CONTRIBUTE_ACTIVITY_HELPER_TEXT},ha:function(){return MSG_USE_ALTERNATIVES},v:function(){return MSG_DRAG_TIP},o:function(){return MSG_CLICK_FOR_ALT},u:function(){return MSG_DRAG_INSTUCTIONS},X:function(){return MSG_SUGGESTION_SUBMITTED},C:function(){return MSG_LANGUAGE_TRANSLATE_WIDGET}};for(var a in p)if(p[a]!==Object.prototype[p[a]])try{p[a]=p[a].call(null)}catch(b){p[a]=m}}else a=
      function(b){return function(){return b}},p={Y:a(0),m:a(1),s:a(2),K:a(3),Z:a(4),B:a(5),D:a(45),F:a(6),L:a(7),ba:a(8),da:a(9),aa:a(10),ia:a(11),M:a(12),U:a(13),V:a(14),T:a(15),N:a(16),fa:a(17),ea:a(18),l:a(19),I:a(20),A:a(21),W:a(22),S:a(23),R:a(24),O:a(25),ca:a(26),$:a(27),P:a(28),H:a(29),ga:a(30),j:a(32),h:a(33),ha:a(34),v:a(35),o:a(36),u:a(37),X:a(38),G:a(39),i:a(40),J:a(41),C:a(46)}})();var q={},MSG_TRANSLATE=c;q[0]=MSG_TRANSLATE;var MSG_CANCEL="Cancel";q[1]=MSG_CANCEL;var MSG_CLOSE="Close";q[2]=MSG_CLOSE;function MSGFUNC_PAGE_TRANSLATED_TO(a){return"Google has automatically translated this page to: "+a}q[3]=MSGFUNC_PAGE_TRANSLATED_TO;function MSGFUNC_TRANSLATED_TO(a){return"Translated to: "+a}q[4]=MSGFUNC_TRANSLATED_TO;var MSG_GENERAL_ERROR="Error: The server could not complete your request. Try again later.";q[5]=MSG_GENERAL_ERROR;var MSG_LEARN_MORE="Learn more";q[6]=MSG_LEARN_MORE;
      function MSGFUNC_POWERED_BY(a){return"Powered by "+a}q[7]=MSGFUNC_POWERED_BY;var MSG_TRANSLATE_PRODUCT_NAME=c;q[8]=MSG_TRANSLATE_PRODUCT_NAME;var MSG_TRANSLATION_IN_PROGRESS="Translation in progress";q[9]=MSG_TRANSLATION_IN_PROGRESS;function MSGFUNC_TRANSLATE_PAGE_TO(a){return"Translate this page to: "+(a+" using Google Translate?")}q[10]=MSGFUNC_TRANSLATE_PAGE_TO;function MSGFUNC_VIEW_PAGE_IN(a){return"View this page in: "+a}q[11]=MSGFUNC_VIEW_PAGE_IN;var MSG_RESTORE="Show original";q[12]=MSG_RESTORE;
      var MSG_SSL_INFO_LOCAL_FILE="The content of this local file will be sent to Google for translation using a secure connection.";q[13]=MSG_SSL_INFO_LOCAL_FILE;var MSG_SSL_INFO_SECURE_PAGE="The content of this secure page will be sent to Google for translation using a secure connection.";q[14]=MSG_SSL_INFO_SECURE_PAGE;var MSG_SSL_INFO_INTRANET_PAGE="The content of this intranet page will be sent to Google for translation using a secure connection.";q[15]=MSG_SSL_INFO_INTRANET_PAGE;
      var MSG_SELECT_LANGUAGE="Select Language";q[16]=MSG_SELECT_LANGUAGE;function MSGFUNC_TURN_OFF_TRANSLATION(a){return"Turn off "+(a+" translation")}q[17]=MSGFUNC_TURN_OFF_TRANSLATION;function MSGFUNC_TURN_OFF_FOR(a){return"Turn off for: "+a}q[18]=MSGFUNC_TURN_OFF_FOR;var MSG_ALWAYS_HIDE_AUTO_POPUP_BANNER="Always hide";q[19]=MSG_ALWAYS_HIDE_AUTO_POPUP_BANNER;var MSG_ORIGINAL_TEXT="Original text:";q[20]=MSG_ORIGINAL_TEXT;var MSG_FILL_SUGGESTION="Contribute a better translation";q[21]=MSG_FILL_SUGGESTION;
      var MSG_SUBMIT_SUGGESTION="Contribute";q[22]=MSG_SUBMIT_SUGGESTION;var MSG_SHOW_TRANSLATE_ALL="Translate all";q[23]=MSG_SHOW_TRANSLATE_ALL;var MSG_SHOW_RESTORE_ALL="Restore all";q[24]=MSG_SHOW_RESTORE_ALL;var MSG_SHOW_CANCEL_ALL="Cancel all";q[25]=MSG_SHOW_CANCEL_ALL;var MSG_TRANSLATE_TO_MY_LANGUAGE="Translate sections to my language";q[26]=MSG_TRANSLATE_TO_MY_LANGUAGE;function MSGFUNC_TRANSLATE_EVERYTHING_TO(a){return"Translate everything to "+a}q[27]=MSGFUNC_TRANSLATE_EVERYTHING_TO;

      var MSG_SHOW_ORIGINAL_LANGUAGES="Show original languages";q[28]=MSG_SHOW_ORIGINAL_LANGUAGES;var MSG_OPTIONS="Options";q[29]=MSG_OPTIONS;var MSG_TURN_OFF_TRANSLATION_FOR_THIS_SITE="Turn off translation for this site";q[30]=MSG_TURN_OFF_TRANSLATION_FOR_THIS_SITE;q[31]=null;var MSG_ALT_SUGGESTION="Show alternative translations";q[32]=MSG_ALT_SUGGESTION;var MSG_ALT_ACTIVITY_HELPER_TEXT="Click on words above to get alternative translations";q[33]=MSG_ALT_ACTIVITY_HELPER_TEXT;var MSG_USE_ALTERNATIVES="Use";
      q[34]=MSG_USE_ALTERNATIVES;var MSG_DRAG_TIP="Drag with shift key to reorder";q[35]=MSG_DRAG_TIP;var MSG_CLICK_FOR_ALT="Click for alternative translations";q[36]=MSG_CLICK_FOR_ALT;var MSG_DRAG_INSTUCTIONS="Hold down the shift key, click, and drag the words above to reorder.";q[37]=MSG_DRAG_INSTUCTIONS;var MSG_SUGGESTION_SUBMITTED="Thank you for contributing your translation suggestion to Google Translate.";q[38]=MSG_SUGGESTION_SUBMITTED;var MSG_MANAGE_TRANSLATION_FOR_THIS_SITE="Manage translation for this site";
      q[39]=MSG_MANAGE_TRANSLATION_FOR_THIS_SITE;var MSG_ALT_AND_CONTRIBUTE_ACTIVITY_HELPER_TEXT="Click a word for alternative translations, or double-click to edit directly";q[40]=MSG_ALT_AND_CONTRIBUTE_ACTIVITY_HELPER_TEXT;var MSG_ORIGINAL_TEXT_NO_COLON="Original text";q[41]=MSG_ORIGINAL_TEXT_NO_COLON;q[42]=c;q[43]=c;q[44]="Your correction has been submitted.";var MSG_LANGUAGE_UNSUPPORTED="Error: The language of the webpage is not supported.";q[45]=MSG_LANGUAGE_UNSUPPORTED;
      var MSG_LANGUAGE_TRANSLATE_WIDGET="Language Translate Widget";q[46]=MSG_LANGUAGE_TRANSLATE_WIDGET;function r(a){if(Error.captureStackTrace)Error.captureStackTrace(this,r);else{var b=Error().stack;b&&(this.stack=b)}a&&(this.message=String(a))}k(r,Error);r.prototype.name="CustomError";function t(a,b){a=a.split("%s");for(var d="",e=a.length-1,f=0;f<e;f++)d+=a[f]+(f<b.length?b[f]:"%s");r.call(this,d+a[e])}k(t,r);t.prototype.name="AssertionError";function u(a,b){throw new t("Failure"+(a?": "+a:""),Array.prototype.slice.call(arguments,1));};var x;function y(a,b){this.g=b===z?a:""}y.prototype.toString=function(){return this.g+""};var z={};function _exportMessages(){h("google.translate.m",q)}function A(a){var b=document.getElementsByTagName("head")[0];b||(b=document.body.parentNode.appendChild(document.createElement("head")));b.appendChild(a)}
      function _loadJs(a){var b=document;var d="SCRIPT";"application/xhtml+xml"===b.contentType&&(d=d.toLowerCase());d=b.createElement(d);d.type="text/javascript";d.charset="UTF-8";if(void 0===x){b=null;var e=g.trustedTypes;if(e&&e.createPolicy){try{b=e.createPolicy("goog#html",{createHTML:l,createScript:l,createScriptURL:l})}catch(v){g.console&&g.console.error(v.message)}x=b}else x=b}a=(b=x)?b.createScriptURL(a):a;a=new y(a,z);a instanceof y&&a.constructor===y?a=a.g:(b=typeof a,u("expected object of type TrustedResourceUrl, got '"+
      a+"' of type "+("object"!=b?b:a?Array.isArray(a)?"array":b:"null")),a="type_error:TrustedResourceUrl");d.src=a;var f;a=(d.ownerDocument&&d.ownerDocument.defaultView||window).document;(f=(a=null===(f=a.querySelector)||void 0===f?void 0:f.call(a,"script[nonce]"))?a.nonce||a.getAttribute("nonce")||"":"")&&d.setAttribute("nonce",f);A(d)}function _loadCss(a){var b=document.createElement("link");b.type="text/css";b.rel="stylesheet";b.charset="UTF-8";b.href=a;A(b)}
      function _isNS(a){a=a.split(".");for(var b=window,d=0;d<a.length;++d)if(!(b=b[a[d]]))return!1;return!0}function _setupNS(a){a=a.split(".");for(var b=window,d=0;d<a.length;++d)b.hasOwnProperty?b.hasOwnProperty(a[d])?b=b[a[d]]:b=b[a[d]]={}:b=b[a[d]]||(b[a[d]]={});return b}h("_exportMessages",_exportMessages);h("_loadJs",_loadJs);h("_loadCss",_loadCss);h("_isNS",_isNS);h("_setupNS",_setupNS);
      window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
      if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='en-GB';c._cuc='googleTranslateElementInit';c._cac='';c._cam='';c._ctkk='450465.1037093230';var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main_en-GB.js');})();})();
      function googleTranslateElementInit(){new google.translate.TranslateElement({pageLanguage:'vi',includedLanguages:'vi,km,en,th,zh-CN,',layout:google.translate.TranslateElement.InlineLayout.SIMPLE},'google_translate_element')}$(".hover").mouseleave(function (){$(this).removeClass("hover")});
      /*]]>*/
   </script>           
   </body>
   

</html>

