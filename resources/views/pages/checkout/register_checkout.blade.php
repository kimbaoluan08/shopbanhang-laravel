<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng kí tài khoản</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ 'public/frontend/register/fonts/material-icon/css/material-design-iconic-font.min.css' }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ 'public/frontend/register/css/style.css' }}">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container" style="border: 1px solid black; border-radius: 5px">
                <div class="signup-content">
                    <form action="{{ URL::to('/add-customer') }}" method="POST" id="signup-form" class="signup-form">
                        {{ csrf_field() }}
                        <h2 class="form-title">Đăng kí tài khoản</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="fullname" id="name" placeholder="Họ tên của bạn" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="email" placeholder="Tên đăng nhập" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="passwd" id="password" placeholder="Mật khẩu" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="phone" id="re_password" placeholder="Số điện thoại" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Đăng kí"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Bạn đã có tài khoản ? <a href="{{ url('/login-checkout') }}" class="loginhere-link">Đăng nhập ngay</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ 'public/frontend/register/vendor/jquery/jquery.min.js '}}"></script>
    <script src="{{ 'public/frontend/register/js/main.js' }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
