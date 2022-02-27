@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Chi tiết sản phẩm
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">None</option>
                    <option value="1">Sửa sản phẩm</option>
                    <option value="2">Xóa sản phẩm</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <?php
        $mess = Session()->get('message');
        if ($mess) {
            echo '<span style="color: red; margin-left: 5px;">' . $mess . '</span>';
            Session()->put('message', null);
        }
        ?>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <tbody>
                    @foreach($info as $key => $info_pr)
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>{{ $info_pr->tensp }}</td>
                    </tr>
                    <tr>
                        <td>Hình ảnh sản phẩm</td>
                        <td>{{ $info_pr->tensp }}</td>
                    </tr>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>{{ $info_pr->tensp }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
            </div>
    </div>
    </footer>
</div>
</div>
@endsection
