
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{('public/backend/css/bootstrap.min.css')}}">
    <link href="{{('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css')}}" type="text/css" />
    <link href="{{('public/backend/css/font-awesome.css')}}" rel="stylesheet">
</head>

<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2 style="color: black;">Đăng nhập</h2>
            <?php
            $message = Session()->get('message');
            if ($message) {
                echo $message;
                Session()->put('message', null);
            }
            ?>
            <form action="{{ URL::to('/login-customer') }}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" class="form-control" name="pass" id="exampleInputPassword1" required>
                </div>
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                <div class="form-group" style="padding-top: 10px">
                    <a href="{{ url('/register-checkout') }}" class="txt2 bo1" style="color: black;">
                        Đăng kí tài khoản?
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script src="{{('public/backend/js/bootstrap.js')}}"></script>
    <script src="{{('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
</body>

</html>
