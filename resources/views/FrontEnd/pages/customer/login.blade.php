<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' id='bootstrap-css' href="{{asset('/frontEnd/css/bootstrap.min.css')}}" media='all' />
    <title>Đăng nhập</title>
    <style>
        .colorlib-form {
            background: whitesmoke;
            padding: 3em;
            margin-bottom: 30px;
            margin-top: 80px;
            border-radius: 5%;
        }
        .colorlib-form .form-control {
            height: 50px;
            -webkit-box-shadow: none;
            box-shadow: none;
            font-size: 16px;
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
            border: none;
            color: #999999;
            background: #fff;
        }
    </style>
</head>
<body>

<div class="background">
    <section>
        <div class="col-shop">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        @if(session()->has('message'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>{{session()->get('message')}}</strong>
                            </div>
                        @endif
                        <form action="{{route('store_customer_login')}}" method="post" class="colorlib-form"> 
                        @csrf
                            <h4 style="color: #291ef0;"><b>ĐĂNG NHẬP</b></h4>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fname">Tài khoản</label>
                                        <input type="text" name="email" class="form-control" placeholder="Tài khoản">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Đăng nhập</button>
                        </form>
                    </div>
                    <div class="col-md-3"> </div>
                   
                </div>
            </div>
        </div>
    </section>
    </div>
</body>
</html>


<!-- /* @import {
            url('https://fonts.googleapis.com/css?family=Montserrat:200,300,400,600')
        } */
        .more-pens{
            position: fixed;
            left: 20px;
            bottom: 20px;
            z-index: 10;
            font-family: "Montserrat";
            font-size: 12px;
        }

        a.white-mode, a.white-mode:link, a.white-mode:visited, a.white-mode:active{

            font-family: "Montserrat";
            font-size: 12px;
            text-decoration: none;
            background: #212121;
            padding: 4px 8px;
            color: #f7f7f7;

               
        }
        a.white-mode, a.white-mode:link, a.white-mode:visited, a.white-mode:active:hover{
            background: #edf3f8;
            color: #212121;
        }

        body{

            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        
        .background{

            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: #edf3f8;
            background: -moz-radial-gradient(center, ellipse cover, #edf3f8 1%, #dee3e8 100%);
            background: -webkit-radial-gradient(center, ellipse cover, #edf3f8 1%,#dee3e8 100%);
            background: radial-gradient(ellipse at center, #edf3f8 1%,#dee3e8 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#edf3f8', endColorstr='#dee3e8',GradientType=1 );
        }
        
        .title{
            z-index: 10;
            position: absolute;
            left: 50%;
            top: 40%;
            transform: translateX(-50%) translateY(-50%);
            font-family: "Montserrat";
            text-align: center;
            width: 60%;
        }
        h1{

            position: relative;
            color: #000000;
            font-weight: 300;
            font-size: 46px;
            padding: 0;
            margin: 0;
            line-height: 1;
        }
        h2{

            font-weight: 600;
            font-size: 60px;
            padding: 0;
            margin: 0;
            line-height: 1;
        }
        h3{

            font-weight: 200;
            font-size: 20px;
            padding: 0;
            margin: 0;
            line-height: 2;
            color: #5e7283;
            letter-spacing: 2px;
        }

        p{
            font-weight: 200;
            font-size: 16px;
            color: #5e7283;
        }
            
        .pentahedron{
            position: absolute;
            width: 100%;
            height: 100%;
            fill: #3E82F7;
        }
        .pentahedron .point{
            fill: #8491A3;
        }
        .pentahedron .rhombus{
            fill: #2DA94F;
            stroke: #2DA94F;
        }
        
        .x{
            fill: #FDBD00;
        }
        
        .circle{
            fill: #ED412D;
        }
        
        svg{
            display: block;
            width: 30px;
            height: 30px;
            position: absolute;
            transform: translateZ(0px);
        } -->