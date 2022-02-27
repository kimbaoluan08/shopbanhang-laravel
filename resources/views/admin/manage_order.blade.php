@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách đơn hàng
        </div>
        <div class="table-responsive">
            <?php
            $mess = Session()->get('message');
            if ($mess) {
                echo '<span style="color: red; margin-left: 5px;">' . $mess . '</span>';
                Session()->put('message', null);
            }
            ?>

            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên người đặt</th>
                        <th>Ngày mua hàng</th>
                        <th>Tình trạng</th>
                        <th>Thao tác</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_order as $key => $order)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$order -> HoTen}}</td>
                        <td><span class="text-ellipsis">
                                {{$order -> created_at}}
                            </span></td>
                        <td><span class="text-ellipsis">{{$order -> Trangthai}}</span></td>
                        <td>
                            <a href="{{URL::to('/del-order/'. $order->id_dh)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
