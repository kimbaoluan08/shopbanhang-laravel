@extends('layout')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Thanh toán</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Trang chủ</a>
                        <a href="./shop.html">Thanh toán giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="{{ URL::to('save-checkout') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">CHI TIẾT HÓA ĐƠN</h6>
                        <div class="checkout__input">
                            <p>Họ và tên<span>*</span></p>
                            <input type="text" name="hoten" placeholder="Họ và tên của bạn" class="checkout__input__add" required>
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ người nhận<span>*</span></p>
                            <input type="text" name="diachi" placeholder="Địa chỉ nhận hàng" class="checkout__input__add" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="sdt" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Ghi chú gửi hàng</p>
                            <input type="text" name="note" placeholder="Ghi chú đơn hàng của bạn">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Tiến hành thanh toán</h4>
                            <br>
                            <div class="checkout__input__checkbox">
                                Chọn hình thức thanh toán:
                            </div>
                            <br>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Thanh toán khi nhận hàng
                                    <input type="checkbox" id="payment" value="1" name="pay" required>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal" value="2" name="pay">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">ĐẶT HÀNG</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection
