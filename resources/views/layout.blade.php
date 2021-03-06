<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Male_Fashion Template" />
    <meta name="keywords" content="Male_Fashion, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="{{('public/frontend/img/pixlr-bg-result.png')}}" rel="shortcut icon" type="image/x-icon" />
    <title>Shoppe</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/elegant-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/magnific-popup.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/nice-select.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/slicknav.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/jquery.multiselect.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/sweetalert.css')}}">

</head>

<body>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Mi???n ph?? v???n chuy???n, ho??n tr??? trong 30 ng??y ho???c ?????m b???o ho??n l???i ti???n.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <?php $customer_id =  Session::get('id_kh');
                                if ($customer_id != null) {
                                ?>
                                    <div class="header__top__links">
                                        <a href="{{ URL::to('/don-hang/'. $customer_id) }}">????n ha??ng</a>
                                    </div>
                                    <div class="header__top__links">
                                        <a href="{{ URL::to('/logout') }}">????ng xu????t</a>
                                    </div>
                                <?php } else { ?>
                                    <div class="header__top__links">
                                        <a href="{{ URL::to('/login-checkout') }}">????ng nh????p</a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="{{asset('public/frontend/img/pixlr-bg-result.png')}}" style="background: black;height: 50px; width:192px; margin-top:-10px;" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="{{URL::to('/Trang-chu')}}">Trang ch???</a></li>
                            <li><a href="#">Sa??n ph????m</a></li>
                            <li><a href="#">Tin t???c</a></li>
                            <li><a href="{{URL::to('/contacts')}}">Li??n h????</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="{{URL::to('/show_cart')}}"><img src="{{asset('public/frontend/img/icon/cart.png')}}" alt=""> <span>0</span></a>
                        <div class="price">
                            <?php
                            $sum = 0;
                            if (Session::get('cart') != null) {
                                foreach (Session::get('cart') as $key => $cart) {
                                    $sum += $cart['product_price'] * $cart['product_qty'];
                                }
                                echo number_format($sum) . ' ' . '??';
                            } else {
                                echo '0 ??';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->
    @yield('content')
    <!-- Shop Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{asset('public/frontend/img/pixlr-bg-result.png')}}" alt="" style="height: 50px; width:192px;"></a>
                        </div>
                        <p>Kh??ch h??ng l?? tr???ng t??m c???a m?? h??nh kinh doanh ?????c ????o c???a ch??ng t??i, bao g???m c??? thi???t k???.</p>
                        <a href="#"><img src="{{asset('public/frontend/img/payment.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Th??ng tin</h6>
                        <ul>
                            <li><a href="#">Tin khuy????n ma??i</a></li>
                            <li><a href="#">Tin tuy????n du??ng</a></li>
                            <li><a href="#">H???? th????ng c????a ha??ng</a></li>
                            <li><a href="#">H??????ng d????n mua online</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Chi??nh sa??ch</h6>
                        <ul>
                            <li><a href="#">Chi??nh sa??ch ba??o m????t</a></li>
                            <li><a href="#">Chi??nh sa??ch tra?? go??p</a></li>
                            <li><a href="#">Quy ch???? hoa??t ??????ng</a></li>
                            <li><a href="#">Chi??nh sa??ch ??????i tra??</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Go??p y??</h6>
                        <div class="footer__newslatter">
                            <p>Vui lo??ng nh????p ??i??a chi?? mail chu??ng t??i se?? li??n h???? s????m nh????t</p>
                            <form action="#">
                                <input type="email" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('public/frontend/js/mixitup.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var id = $(this).data('id');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name = "_token"]').val();

                $.ajax({
                    url: "{{url('/add-cart-ajax')}}",
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function() {
                        swal({
                                title: '???? th??m th??nh c??ng',
                                text: 'B???n c?? th??? ?????n gi??? h??ng',
                                icon: "success",
                                showCancelButton: true,
                                cancelButtonText: 'Xem ti???p',
                                confirmButtonClass: 'btn-success',
                                confirmButtonText: '??i ?????n gi??? h??ng',
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{ url('/show_cart') }}";
                            });
                    }
                });
            });
        });

        $('input[type="checkbox"]').on('change', function() {
            $('input[type="checkbox"]').not(this).prop('checked', false);
        });
    </script>
</body>

</html>
