@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
            <?php
            $mess = Session()->get('message');
            if ($mess) {
                echo '<span style="color: red; margin-left: 5px;">' . $mess . '</span>';
                Session()->put('message', null);
            }
            ?>
            <div class="panel-body">
                <div class="position-center">
                    @foreach ($edit_product as $key => $product)
                    <form role="form" action="{{URL::to('/cap-nhat-product/'. $product->masp)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="ten_sp" value="{{ $product-> tensp }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá gốc</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="gia_goc" value="{{ $product-> giaGoc }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá bán</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="gia_ban" value="{{ $product-> giaBan }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="hinhanh1">
                            <img src="{{URL::to('public/uploads/product/'.$product -> hinhanh_sp1)}}" height="100" width="120" alt="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="hinhanh2">
                            <img src="{{URL::to('public/uploads/product/'.$product -> hinhanh_sp2)}}" height="100" width="120" alt="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="hinhanh3">
                            <img src="{{URL::to('public/uploads/product/'.$product -> hinhanh_sp3)}}" height="100" width="120" alt="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea class="form-control" style="resize: none;" rows="5" ; id="exampleInputPassword1" name="mota_sp">{{ $product-> thongTin }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh mục sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="danhmuc">
                                @foreach ($cate_product as $key => $cate_sp )
                                @if ($cate_sp->maloai == $product->id_loai)
                                <option selected value="{{$cate_sp-> maloai}}">{{$cate_sp-> tenloai}}</option>
                                @else
                                <option value="{{$cate_sp-> maloai}}">{{$cate_sp-> tenloai}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Thương hiệu sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="thuonghieu">
                                @foreach ($brand_product as $key => $brand_sp )
                                @if ($brand_sp->ma_hangsx == $product->id_hangsx)
                                <option selected value="{{$brand_sp-> ma_hangsx}}">{{$brand_sp-> ten_hangsx}}</option>
                                @else
                                <option value="{{$brand_sp-> ma_hangsx}}">{{$brand_sp-> ten_hangsx}}</option>
                                @endif
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
                        @foreach ($info as $key => $info_pr)
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Màn Hình</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="manhinh" value="{{ $info_pr->manHinh }}">
                            </div>
                            <label for="exampleInputEmail1">CPU</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="cpu" value="{{ $info_pr->CPU }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">RAM</label>
                            <select class="form-control" name="ram">
                                <option value="0">-</option>
                                <option value="4GB" <?php if ($info_pr->RAM == '4GB') echo 'selected'; ?>>4 GB</option>
                                <option value="8GB"<?php if ($info_pr->RAM == '8GB') echo 'selected'; ?>>8 GB</option>
                                <option value="16GB"<?php if ($info_pr->RAM == '16GB') echo 'selected'; ?>>16 GB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Đồ Họa</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="dohoa" value="{{ $info_pr->doHoa }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ổ Cứng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="ocung" value="{{ $info_pr->Ocung }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hệ điều hành</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="hdh" value="{{ $info_pr->Hdh }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Trọng lượng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="tluong" value="{{ $info_pr->trongLuong }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kích thước</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="kthuoc" value="{{ $info_pr->kichThuoc }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Xuất xứ</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="xuatxu" value="{{ $info_pr->xuatXu }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Năm sản xuất</label>
                            <select class="form-control" name="namsx">
                                <option value="0">-</option>
                                <option value="2018" <?php if ($info_pr->namSX == '2018') echo 'selected'; ?>>2018</option>
                                <option value="2019" <?php if ($info_pr->namSX == '2019') echo 'selected'; ?>>2019</option>
                                <option value="2020" <?php if ($info_pr->namSX == '2020') echo 'selected'; ?>>2020</option>
                                <option value="2021" <?php if ($info_pr->namSX == '2021') echo 'selected'; ?>>2021</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Link video sản phẩm</label>
                            <textarea class="form-control" style="resize: none;" rows="3" ; id="exampleInputPassword1" name="link" value="">{{ $info_pr->Link_Video }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thông tin sản phẩm</label>
                            <textarea class="form-control" style="resize: none;" rows="5" ; id="exampleInputPassword1" name="thongtin">{{ $info_pr->ThongTinSP }}</textarea>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-info" name="add_brand_product">Cập nhật sản phẩm</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
