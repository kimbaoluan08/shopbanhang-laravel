@extends('layout')
@section('content')
<!-- Breadcrumb Section End -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Đơn hàng</h4>
                    <div class="breadcrumb__links">
                        <a href="./Trang-chu">Trang chủ</a>
                        <a href="./show_cart">Đơn hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                </div>
                                <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__tags">
                                            <a href="#">Product</a>
                                            <a href="#">Bags</a>
                                            <a href="#">Shoes</a>
                                            <a href="#">Fashio</a>
                                            <a href="#">Clothing</a>
                                            <a href="#">Hats</a>
                                            <a href="#">Accessories</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <h3>Lịch sử đặt hàng</h3> <br>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Địa chỉ nhận hàng</th>
                            <th>SĐT</th>
                            <th>Trạng thái</th>
                            <th>Ngày đặt</th>
                        </tr>
                        @foreach ($dh as $key => $donhang )
                        <tr>
                            <td class="text-center">{{ $donhang-> id_dh }}</td>
                            <td>{{ $donhang-> Diachi }}</td>
                            <td>{{ $donhang-> Sdt }}</td>
                            <td>{{ $donhang-> Trangthai }}</td>
                            <td>{{ $donhang-> created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
            </div>
        </div>
</section>
@endsection
