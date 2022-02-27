<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Comment;

session_start();

class ProductController extends Controller
{
    public function AuthAdmin()
    {
        $admin_id =  Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('Dasboard');
        } else {
            return Redirect::to('Admin')->send();
        }
    }
    public function add_product()
    {
        $this->AuthAdmin();
        $cate_product = DB::table('loai')->orderBy('maloai', 'desc')->get();
        $brand_product = DB::table('hangsx')->orderBy('ma_hangsx', 'desc')->get();
        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    public function all_product()
    {
        $this->AuthAdmin();
        //print_r($chitiet);
        $all_product = DB::table('sanpham')
            ->join('loai', 'loai.maloai', '=', 'sanpham.id_loai')
            ->join('hangsx', 'hangsx.ma_hangsx', '=', 'sanpham.id_hangsx')->orderBy('sanpham.masp', 'desc')->get();
        $manager = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager);
    }
    public function save_product(Request $request)
    {
        $this->AuthAdmin();
        $data =  array();
        $data['tensp']  = $request->ten_sp;
        $data['giaGoc']  = $request->gia_goc;
        $data['giaBan']  = $request->gia_ban;
        $data['thongTin']  = $request->mota_sp;
        $data['id_loai']  = $request->danhmuc;
        $data['id_hangsx']  = $request->thuonghieu;
        $data['trangThai_sp']  = $request->tinhtrang;
        $data['created_at'] = date('Y-m-d H:i:s');
        $get_img = $request->file('hinhanh1');
        $get_img1 = $request->file('hinhanh2');
        $get_img2 = $request->file('hinhanh3');

        $detail = array();
        $detail['CPU']  = $request->cpu;
        $detail['RAM']  = $request->ram;
        $detail['manHinh']  = $request->manhinh;
        $detail['doHoa']  = $request->dohoa;
        $detail['Ocung']  = $request->ocung;
        $detail['Hdh']  = $request->hdh;
        $detail['trongLuong']  = $request->tluong;
        $detail['kichThuoc']  = $request->kthuoc;
        $detail['xuatXu']  = $request->xuatxu;
        $detail['namSX']  = $request->namsx;
        $detail['Link_Video']  = $request->link;
        $detail['ThongTinSP']  = $request->thongtin;


        if ($get_img) {
            $this->AuthAdmin();
            $get_name_img = $get_img->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));
            $new_img = $name_img . rand(0, 99) . '.' . $get_img->getClientOriginalExtension();
            $get_img->move('public/uploads/product', $new_img);
            $data['hinhanh_sp1'] = $new_img;

            $get_name_img1 = $get_img1->getClientOriginalName();
            $name_img1 = current(explode('.', $get_name_img1));
            $new_img1 = $name_img1 . rand(0, 99) . '.' . $get_img1->getClientOriginalExtension();
            $get_img1->move('public/uploads/product', $new_img1);
            $data['hinhanh_sp2'] = $new_img1;

            $get_name_img2 = $get_img2->getClientOriginalName();
            $name_img2 = current(explode('.', $get_name_img2));
            $new_img2 = $name_img2 . rand(0, 99) . '.' . $get_img2->getClientOriginalExtension();
            $get_img2->move('public/uploads/product', $new_img2);
            $data['hinhanh_sp3'] = $new_img;

            $id = DB::table('sanpham')->insertGetId($data);
            $detail['ma_sp'] = $id;
            DB::table('chitietsp')->insert($detail);
            Session()->put('message', 'Thêm sản phẩm thành công');
            return redirect('all-product');
        }
        $data['hinhanh_sp'] = '';
        $id = DB::table('sanpham')->insertGetId($data);
        $detail['ma_sp'] = $id;
        DB::table('chitietsp')->insert($detail);
        Session()->put('message', 'Thêm sản phẩm thành công');
        return redirect('add-product');
    }
    public function active_product($id_sp)
    {
        $this->AuthAdmin();
        DB::table('sanpham')->where('masp', $id_sp)->update(['trangThai_sp' => 0]);
        Session()->put('message', 'Unactive Success');
        return redirect('all-product');
    }
    public function unactive_product($id_sp)
    {
        $this->AuthAdmin();
        DB::table('sanpham')->where('masp', $id_sp)->update(['trangThai_sp' => 1]);
        Session()->put('message', 'Active Success');
        return redirect('all-product');
    }
    public function edit_product($id_sp)
    {
        $this->AuthAdmin();
        $cate_product = DB::table('loai')->orderBy('maloai', 'desc')->get();
        $brand_product = DB::table('hangsx')->orderBy('ma_hangsx', 'desc')->get();
        $product = DB::table('sanpham')->where('masp', $id_sp)->get();
        $info = DB::table('sanpham')->join('chitietsp', 'chitietsp.ma_sp', '=', 'sanpham.masp')
            ->where('sanpham.masp', $id_sp)->get();
        $manager = view('admin.edit_product')->with('edit_product', $product)
            ->with('cate_product', $cate_product)->with('brand_product', $brand_product)
            ->with('product', $product)->with('info', $info);
        return view('admin_layout')->with('admin.edit_product', $manager);
    }
    public function cap_nhat_product(Request $request, $id_sp)
    {
        $this->AuthAdmin();
        $data = array();

        $data['tensp']  = $request->ten_sp;
        $data['giaGoc']  = $request->gia_goc;
        $data['giaBan']  = $request->gia_ban;
        $data['thongTin']  = $request->mota_sp;
        $data['id_loai']  = $request->danhmuc;
        $data['id_hangsx']  = $request->thuonghieu;
        $data['trangThai_sp']  = $request->tinhtrang;
        $data['updated_at'] = date('Y-m-d H:i:s');

        $detail = array();
        $detail['CPU']  = $request->cpu;
        $detail['RAM']  = $request->ram;
        $detail['manHinh']  = $request->manhinh;
        $detail['doHoa']  = $request->dohoa;
        $detail['Ocung']  = $request->ocung;
        $detail['Hdh']  = $request->hdh;
        $detail['trongLuong']  = $request->tluong;
        $detail['kichThuoc']  = $request->kthuoc;
        $detail['xuatXu']  = $request->xuatxu;
        $detail['namSX']  = $request->namsx;
        $detail['Link_Video']  = $request->link;
        $detail['ThongTinSP']  = $request->thongtin;

        $get_img = $request->file('hinhanh1');
        $get_img1 = $request->file('hinhanh2');
        $get_img2 = $request->file('hinhanh3');
        if ($get_img) {
            $get_name_img = $get_img->getClientOriginalName();
            $name_img = current(explode('.', $get_name_img));
            $new_img = $name_img . rand(0, 99) . '.' . $get_img->getClientOriginalExtension();
            $get_img->move('public/uploads/product', $new_img);
            $data['hinhanh_sp1'] = $new_img;

            $get_name_img1 = $get_img1->getClientOriginalName();
            $name_img1 = current(explode('.', $get_name_img1));
            $new_img1 = $name_img1 . rand(0, 99) . '.' . $get_img1->getClientOriginalExtension();
            $get_img1->move('public/uploads/product', $new_img1);
            $data['hinhanh_sp2'] = $new_img1;

            $get_name_img2 = $get_img2->getClientOriginalName();
            $name_img2 = current(explode('.', $get_name_img2));
            $new_img2 = $name_img2 . rand(0, 99) . '.' . $get_img2->getClientOriginalExtension();
            $get_img2->move('public/uploads/product', $new_img2);
            $data['hinhanh_sp3'] = $new_img2;

            DB::table('sanpham')->where('masp', $id_sp)->update($data);
            DB::table('chitietsp')->where('ma_sp', $id_sp)->update($detail);
            Session()->put('message', 'Cập nhật sản phẩm thành công');
            return redirect('all-product');
        }
        DB::table('sanpham')->where('masp', $id_sp)->update($data);
        DB::table('chitietsp')->where('ma_sp', $id_sp)->update($detail);
        Session()->put('message', 'Cập nhật sản phẩm thành công');
        return redirect('all-product');
    }
    public function del_product($id_sp)
    {
        $this->AuthAdmin();
        DB::table('sanpham')->where('masp', $id_sp)->delete();
        Session()->put('message', 'Xóa thành công');
        return redirect('all-product');
    }
    //End Admin Page

    public function manage_order()
    {
        $this->AuthAdmin();
        $all_order = DB::table('khachhang')->join('dathang', 'dathang.id_kh', '=', 'khachhang.id')
            ->select('dathang.*', 'khachhang.HoTen')
            ->orderBy('dathang.id_dh', 'desc')->get();
        $manage_order =  view('admin.manage_order')->with('all_order', $all_order);

        return view('admin_layout')->with('admin.manage_order', $manage_order);
    }

    public function del_order($id_dh)
    {
        $this->AuthAdmin();
        DB::table('dathang')->where('id_dh', $id_dh)->delete();
        Session()->put('message', 'Xóa thành công');
        return redirect('manage-order');
    }
    //Order Admin
    public function don_hang($id)
    {
        $dh = DB::table('dathang')
        ->where('id_kh', '=', $id)
        ->join('chitiet_dh', 'chitiet_dh.id_dh', '=', 'dathang.id_dh')
        ->join('thanhtoan', 'thanhtoan.id_dh', '=', 'chitiet_dh.id_dh')->get();
        $cate_product = DB::table('loai')->where('trangThai', '1')->orderBy('maloai', 'desc')->get();
        $brand_product = DB::table('hangsx')->where('TinhTrang', '1')->orderBy('ma_hangsx', 'desc')->get();

        return view('donhang')->with('dh', $dh)->with('category', $cate_product)
        ->with('brand', $brand_product);
    }
    
    public function product_detail($id_sp)
    {
        $cate_product = DB::table('loai')->where('trangThai', '1')->orderBy('maloai', 'desc')->get();
        $brand_product = DB::table('hangsx')->where('TinhTrang', '1')->orderBy('ma_hangsx', 'desc')->get();
        $details_product = DB::table('sanpham')
            ->join('loai', 'loai.maloai', '=', 'sanpham.id_loai')
            ->join('hangsx', 'hangsx.ma_hangsx', '=', 'sanpham.id_hangsx')->where('sanpham.masp', $id_sp)->get();
        $info = DB::table('sanpham')->join('chitietsp', 'chitietsp.ma_sp', '=', 'sanpham.masp')
            ->where('sanpham.masp', $id_sp)->get();
        return view('pages.product_detail')->with('category', $cate_product)
            ->with('brand', $brand_product)->with('detail', $details_product)
            ->with('info', $info);
    }

}
//Lấy Tên files
//Lấy Đuôi File
