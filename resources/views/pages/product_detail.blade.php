@extends('layout')
@section('content')
<!-- Shop Details Section Begin -->
@foreach ($detail as $key => $detail_sp )
<style>
    .carousel-control-next,
    .carousel-control-prev

    /*, .carousel-indicators */
        {
        filter: invert(100%);
    }

    .carousel-indicators .active {
        background-color: red;
    }

    .carousel-indicators li {
        background-color: #ced4da;
        ;
    }
</style>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Trang chủ</a>
                        <a href="./shop.html">{{ $detail_sp -> tenloai }}</a>
                        <a href="./shop.html">{{ $detail_sp -> ten_hangsx }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div>
                <h4 style="text-align: left; font-weight: bold;">{{ $detail_sp -> tensp }}</h4>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6 col-md-9">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{URL::to('public/uploads/product/'. $detail_sp ->hinhanh_sp1)}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{URL::to('public/uploads/product/'. $detail_sp ->hinhanh_sp2)}}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{URL::to('public/uploads/product/'. $detail_sp ->hinhanh_sp3)}}" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- <img src="{{URL::to('public/uploads/product/'. $detail_sp ->hinhanh_sp1)}}" alt="Error" width="90%" height="80%"> -->
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-11">
                                <div class="product__details__text">
                                    <h3 style="color: red;">{{number_format($detail_sp-> giaBan). ' ' . 'đ'}} <span>{{number_format($detail_sp-> giaGoc). ' ' . 'đ'}}</span></h3>
                                    <table class="table table-sm table-bordered" style="text-align: left;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Ưu đãi thêm</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="margin: 5px 5px">
                                                <td scope="row" >
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                    <span>Tặng Balo Laptop</span> <br>
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                    <span>Tặng PMH 300.000đ mua máy in HP</span> <br>
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                    <span>Giảm ngay 5% tối đa 300.000đ khi thanh toán Online 100% qua VNPAY-QR. Mã khuyến mại VNPAY300 (Chọn hình thức thanh toán ATM nội địa/QR CODE/Internet Banking)</span> <br>
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                    <span>Thu cũ đổi mới - Trợ giá ngay 15%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$detail_sp -> masp}}" class="cart_product_id_{{$detail_sp -> masp}}">
                                    <input type="hidden" value="{{$detail_sp -> tensp}}" class="cart_product_name_{{$detail_sp -> masp}}">
                                    <input type="hidden" value="{{$detail_sp -> hinhanh_sp1}}" class="cart_product_image_{{$detail_sp -> masp}}">
                                    <input type="hidden" value="{{$detail_sp -> giaBan}}" class="cart_product_price_{{$detail_sp -> masp}}">

                                    <div class="product__details__cart__option">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1" class="cart_product_qty_{{$detail_sp -> masp}}">
                                            </div>
                                        </div>
                                        <button class="primary-btn add-to-cart" type="button" name="add-to-cart" data-id="{{$detail_sp -> masp}}">Thêm giỏ hàng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @foreach ($info as $key_1 => $info_pro)
    <div class="product__details__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Mô tả sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Thông số kỹ thuật
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Đánh giá sản phẩm</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <p class="note">{{ $detail_sp ->thongTin }}</p>
                                    <div class="product__details__tab__content__item text-center">
                                        <iframe width="660" height="415" src="https://www.youtube.com/embed/{{$info_pro -> Link_Video}}?controls=0&amp;start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <div class="product__details__tab__content__item">
                                        {{ $info_pro -> ThongTinSP }}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-6" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="product__details__tab__content__item">
                                        <h5>Thông số kỹ thuật của {{ $detail_sp -> tensp }}</h5>

                                    </div>
                                    <div class="product__details__tab__content__item">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">CPU</th>
                                                    <td>{{ $info_pro -> CPU }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">RAM</th>
                                                    <td>{{ $info_pro -> RAM }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Màn hình</th>
                                                    <td>{{ $info_pro -> manHinh }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Đồ họa</th>
                                                    <td>{{ $info_pro -> doHoa }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Ổ cứng</th>
                                                    <td>{{ $info_pro -> Ocung }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Hệ điều hành</th>
                                                    <td>{{ $info_pro -> Hdh }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Trọng lượng (kg)</th>
                                                    <td>{{ $info_pro -> trongLuong }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Kích thước (nm)</th>
                                                    <td>{{ $info_pro -> kichThuoc }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Xuất xứ</th>
                                                    <td>{{ $info_pro -> xuatXu }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Năm ra mắt</th>
                                                    <td>{{ $info_pro -> namSX }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-7" role="tabpanel">
                                <h2>COMING SOON</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @endforeach
</section>
@endforeach
<!-- Shop Details Section End -->
<br>
@endsection
