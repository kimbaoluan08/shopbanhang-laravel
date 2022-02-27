@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách sản phẩm
        </div>
        <?php
            $mess = Session()->get('message');
            if ($mess) {
                echo '<span style="color: red; margin-left: 5px;">' . $mess . '</span>';
                Session()->put('message', null);
            }
            ?>
        <div class="table-responsive text-center">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Danh mục</th>
                        <th>Hãng SX</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_product as $key => $product)
                    <tr style="text-align: left;">
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$product -> tensp}}</td>
                        <td><img src="public/uploads/product/{{$product -> hinhanh_sp1}}" height="70" width="100" alt=""></td>
                        <td>{{$product -> tenloai}}</td>
                        <td>{{$product -> ten_hangsx}}</td>
                        <td><span class="text-ellipsis">
                                <?php
                                if ($product->trangThai_sp == 0) {
                                ?>
                                    <a href="{{URL::to('/unactive-product/'.$product->masp)}}"><i class="fas fa-eye-slash"></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href="{{URL::to('/active-product/'.$product->masp)}}"><i class="fas fa-eye"></i></a>
                                <?php } ?>
                            </span></td>
                        <td>
                            <a href="{{URL::to('/edit-product/'.$product->masp)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a> <br>
                            <a href="{{URL::to('/del-product/'.$product->masp)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
