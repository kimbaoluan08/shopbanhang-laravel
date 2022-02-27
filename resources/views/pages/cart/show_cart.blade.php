<?php
    use Gloudemans\Shoppingcart\Facades\Cart;
    use Illuminate\Support\Facades\Session;
?>
@extends('layout')
@section('content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Giỏ hàng</h4>
                    <div class="breadcrumb__links">
                        <a href="./Trang-chu">Trang chủ</a>
                        <a href="./show_cart">Giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
       <!-- Shopping Cart Section Begin -->
       <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                    <?php if (Session::get('cart') != null){ ?>
                    <form action="{{ url('/update-cart') }}" method="POST">
                    @csrf
                        <table>
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                 @foreach(Session::get('cart') as $key => $cart )
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{URL::to('public/uploads/product/'. $cart['product_image'])}}" alt="" width="100">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{ $cart['product_name'] }}</h6>
                                            <h5>
                                                <?php
                                                    $price = $cart['product_price'];
                                                    echo number_format($price);
                                                ?>
                                                đ
                                            </h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="text"  name="cart_qty[{{ $cart['session_id'] }}]" value="{{ $cart['product_qty'] }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">
                                        <?php
                                            $subtotal = $cart['product_price'] * $cart['product_qty'];
                                           echo number_format($subtotal). ' ' . 'đ';
                                        $total +=$subtotal;
                                        ?>
                                    </td>
                                    <td class="cart__close">
                                        <a href="{{ url('/del-sp/'. $cart['session_id'] ) }}"><i class="fa fa-close"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{ url('/Trang-chu') }}">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <button type="submit" class="primary-btn"><i class="fa fa-spinner"></i> Cập nhật giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Tổng giỏ hàng</h6>
                        <ul>
                            <li>Tổng thanh toán <span><?php echo number_format($total) ?> đ</span></li>
                            <li>Thuế <span>0</span></li>
                            <li>Phí vận chuyển <span>Free</span></li>
                            <li>Thành tiền <span><?php echo number_format($total) ?> đ</span></li>
                        </ul>
                        <?php
                            $customer_id =  Session::get('id_kh');
                            if ($customer_id != null){
                        ?>
                        <a href="{{ URL::to('/checkout') }}" class="primary-btn">Thanh toán</a>
                        <?php } else { ?>
                        <a href="{{ URL::to('/login-checkout') }}" class="primary-btn">Thanh toán</a>
                        <?php } ?>
                    </div>
                </div>
                <?php } else { ?>
                        <p>Bạn chưa có sản phẩm nào trong giỏ hàng</p>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
