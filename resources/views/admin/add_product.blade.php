@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
            </header>
            <?php
            $mess = Session()->get('message');
            if($mess) {
                echo '<span style="color: red; margin-left: 5px;">'. $mess .'</span>';
                Session()->put('message', null);
            }
        ?>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="ten_sp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá gốc</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="gia_goc">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá bán</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="gia_ban">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm 1</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="hinhanh1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm 2</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="hinhanh2">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm 3</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="hinhanh3">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea class="form-control" style="resize: none;" rows="3"; id="exampleInputPassword1" name="mota_sp"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh mục sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="danhmuc">
                                <option value="">-</option>
                                @foreach ($cate_product as $key => $cate_sp )
                                    <option value="{{$cate_sp-> maloai}}">{{$cate_sp-> tenloai}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Thương hiệu sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="thuonghieu">
                                <option value="">-</option>
                                @foreach ($brand_product as $key => $brand_sp )
                                    <option value="{{$brand_sp-> ma_hangsx}}">{{$brand_sp-> ten_hangsx}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hiển thị</label>
                            <select class="form-control input-sm m-bot15" name="tinhtrang">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Đồ Họa</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="dohoa">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Màn Hình</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="manhinh">
                            </div>
                            <label for="exampleInputEmail1">CPU</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="cpu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">RAM</label>
                            <select class="form-control" name="ram">
                                <option value="0">-</option>
                                <option value="4GB">4 GB</option>
                                <option value="8GB">8 GB</option>
                                <option value="16GB">16 GB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ổ Cứng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="ocung">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hệ điều hành</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="hdh">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Trọng lượng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="tluong">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kích thước</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="kthuoc">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Xuất xứ</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="xuatxu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Năm sản xuất</label>
                            <select class="form-control" name="namsx">
                                <option value="0">-</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Link video sản phẩm</label>
                            <textarea class="form-control" style="resize: none;" rows="3" ; id="exampleInputPassword1" name="link"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thông tin sản phẩm</label>
                            <textarea class="form-control" style="resize: none;" rows="10" ; id="exampleInputPassword1" name="thongtin"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_brand_product">Thêm sản phẩm</button>
                    </form>
                </div>
            </div>
        </section>

    </div>
    </div>
    @endsection
