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
                            <a href="{{url('/quen-mat-khau')}}">Bạn quên mật khẩu</a>
                            
                            <br><br> Hoặc chưa có tài khoản ?
                            <a href="{{route('sign_up')}}" >Đăng kí</a>
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


