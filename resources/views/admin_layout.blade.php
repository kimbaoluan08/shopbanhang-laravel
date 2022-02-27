<!DOCTYPE html>

<head>
	<title>Admin page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}">
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet" />
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css" />
	<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
	<!-- //font-awesome icons -->
	<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
</head>

<body>
	<section id="container">
		<!--header start-->
		<header class="header fixed-top clearfix">
			<!--logo start-->
			<div class="brand">
				<a href="index.html" class="logo">
					Admin Page
				</a>
			</div>
			<!--logo end-->
			<div class="top-nav clearfix">
				<!--search & user info start-->
				<ul class="nav pull-right top-menu">
					<!-- user login dropdown start-->
							<li><a href="{{URL::to('/logout')}}">Đăng xuất</a></li>
						</ul>

					<!-- user login dropdown end -->

				</ul>
				<!--search & user info end-->
			</div>
		</header>
		<!--header end-->
		<!--sidebar start-->
		<aside>
			<div id="sidebar" class="nav-collapse">
				<!-- sidebar menu start-->
				<div class="leftside-navigation">
					<ul class="sidebar-menu" id="nav-accordion" style="color: black">
                        <li class="sub-menu">
							<a href="javascript:;">
								<span>Quản lý sản phẩm</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
								<li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>
							</ul>
						</li>
                        <li class="sub-menu">
                            <a href="{{URL::to('/manage-kh')}}">Quản lý khách hàng</a>
						</li>
                        <li class="sub-menu">
								<a href="{{URL::to('/manage-order')}}">Quản lý đơn hàng</a>
						</li>
					</ul>
				</div>
				<!-- sidebar menu end-->
			</div>
		</aside>
		<!--sidebar end-->
		<!--main content start-->
		<section id="main-content">
			<section class="wrapper">
				<!-- //market-->
				@yield('admin_content')
			</section>
			<!--main content end-->
		</section>
		<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
		<script src="{{asset('public/backend/js/scripts.js')}}"></script>
		<script src="{{('public/backend/js/jquery.scrollTo.js')}}"></script>

</body>

</html>
