@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách khách hàng
    </div>
    <div class="table-responsive">
        <?php
            $mess = Session()->get('message');
            if($mess) {
                echo '<span style="color: red; margin-left: 5px;">'. $mess .'</span>';
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
            <th>Tên khách hàng</th>
            <th>Tên tài khoản</th>
            <th>Ngày tạo</th>
            <th>Thao tác</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($kh as $key => $khh)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$khh -> HoTen}}</td>
            <td><span class="text-ellipsis">
            {{$khh -> TenDN}}
            </span></td>
            <td><span class="text-ellipsis">{{ $khh -> created_at }}</span></td>
            <td>
              <a href="{{URL::to('/del-kh/'. $khh->id )}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
