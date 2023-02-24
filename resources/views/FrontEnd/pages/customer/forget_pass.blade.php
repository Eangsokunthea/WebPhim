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
						<div class="alert alert-success">
							{!! session()->get('message') !!}
						</div>
						@elseif(session()->has('error'))
						<div class="alert alert-danger">
							{!! session()->get('error') !!}
						</div>
						@endif
						
                        <form action="{{url('/recover-pass')}}" method="POST" class="colorlib-form"> 
                        @csrf
                            <h4 style="color: #291ef0;"><b>ĐỔI MẬT KHẨU</b></h4>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fname">Điền email để lấy lại mật khẩu</label>
										<input type="text" name="email" class="form-control" placeholder="Nhập Tài khoản email..." />
                                    </div>
                                </div>
                            </div>
							<button type="submit" class="btn btn-info">Gửi mail</button>
							<a href="{{route('sign_up')}}" >Đăng kí</a> Hoặc <a href="{{route('sign_in')}}" >Đăng nhập</a>
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


