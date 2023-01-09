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
    <section>
        <div class="col-shop">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-md-3"></div>
                    
                    <div class="col-md-6">
                        <form action="{{route('store_customer_register')}}" method="post" class="colorlib-form"> 
                        @csrf
                            <h4 style="color: #f01ebf;"><b>ĐĂNG KÝ</b> </h4>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fname">Họ &amp; Tên</label>
                                        <input type="text" name="name" class="form-control" placeholder="Họ Tên">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" name="phone_no" class="form-control" placeholder="Số điện thoại">
                                    </div>
                                </div>
                                <div class="col-md-12">
								    <div class="form-group">
                                        <label for="email">Địa chỉ email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Tài khoản">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-success">Đăng ký</button>

                        </form>
                    </div>
                    <div class="col-md-3"> </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>



