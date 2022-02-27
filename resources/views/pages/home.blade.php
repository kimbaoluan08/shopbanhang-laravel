@extends('layout')
@section('content')
<hr>
<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Danh mục sản phẩm</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <ul>
                                                @foreach ($category as $key => $ct )
                                                <li><a href="#">{{$ct-> tenloai}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Thương hiệu</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <ul>
                                                @foreach ($brand as $key => $br )
                                                <li><a href="#">{{$br-> ten_hangsx}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Mức giá</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><a href="#">Dưới 10 triệu</a></li>
                                                <li><a href="#">Từ 10 - 15 triệu</a></li>
                                                <li><a href="#">Từ 15 - 20 triệu</a></li>
                                                <li><a href="#">Từ 20 - 25 triệu</a></li>
                                                <li><a href="#">Trên 25 triệu</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    @foreach ($product as $key => $pro )
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="public/uploads/product/{{$pro->hinhanh_sp1}}">

                            </div>
                            <div class="product__item__text">
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$pro -> masp}}" class="cart_product_id_{{$pro -> masp}}">
                                    <input type="hidden" value="{{$pro -> tensp}}" class="cart_product_name_{{$pro -> masp}}">
                                    <input type="hidden" value="{{$pro -> hinhanh_sp1}}" class="cart_product_image_{{$pro -> masp}}">
                                    <input type="hidden" value="{{$pro -> giaBan}}" class="cart_product_price_{{$pro -> masp}}">
                                    <input type="hidden" value="1" class="cart_product_qty_{{$pro -> masp}}">

                                    <h6>{{$pro -> tensp}}</h6>
                                    <a href="{{ URL::to('/chi-tiet-san-pham/'.$pro -> masp) }}" class="add-cart">Xem chi tiết</a>
                                    <h5 style="font-size: 20px;">{{number_format($pro-> giaBan). ' ' . 'đ'}}</h5>
                                    <br>
                                    <button type="button" class="btn btn-primary btn-sm add-to-cart" name="add-to-cart" data-id="{{$pro -> masp}}">
                                        <i style="font-size: 20px;" class="fa fa-cart-plus" aria-hidden="true"></i> Thêm giỏ hàng
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div>
            </div>
        </div>
</section>
@endsection
