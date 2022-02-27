<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Gloudemans\Shoppingcart\Facades\Cart;

session_start();

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        return view('pages.checkout.login_checkout');
    }
    public function register_checkout()
    {
        return view('pages.checkout.register_checkout');
    }
    public function login_customer(Request $request)
    {
        $user = $request->username;
        $passwd = $request->pass;

        $check = DB::table('khachhang')->where('TenDN', $user)->first();

        if ($check) {
            if (Hash::check($passwd, $check->password)) {
                Session::put('id_kh', $check->id);
                if (Session::get('cart') != null) {
                    return Redirect::to('/checkout');
                } else {
                    return Redirect::to('/Trang-chu');
                }
            } else {
                Session::put('message', 'Bạn đã nhập sai mật khẩu');
                return Redirect::to('/login-checkout');
            }
        } else {
            Session::put('message', 'Tài khoản không đúng hoặc không tồn tại');
            return Redirect::to('/login-checkout');
        }
    }
    public function add_customer(Request $request)
    {
        $data = array();

        $data['HoTen'] = $request->fullname;
        $data['TenDN'] = $request->username;
        $data['password'] = Hash::make($request->passwd);
        $data['sdt'] = $request->phone;
        $data['created_at'] = date('Y-m-d H:i:s');

        //print_r($data);

        $id_kh = DB::table('khachhang')->insertGetId($data);
        Session::put('id_kh', $id_kh);
        Session::put('Ten_kh', $request->fullname);

        if (Session::get('cart') != null) {
            return Redirect::to('/checkout');
        } else {
            return Redirect::to('/Trang-chu');
        }
    }
    public function checkout()
    {
        return view('pages.checkout.checkout');
    }
    public function log_out()
    {
        Session::put('id_kh', null);
        return Redirect('/Trang-chu');
    }
    public function save_checkout(Request $request)
    {
        $data = array();
        $id_kh = Session::get('id_kh');

        $data['id_kh'] = $id_kh;
        $data['Hoten'] = $request->hoten;
        $data['Diachi'] = $request->diachi;
        $data['Sdt'] = $request->sdt;
        $data['Email'] = $request->email;
        $data['Ghichu'] = $request->note;
        $data['Trangthai'] = 'Đang xử lý';
        $data['created_at'] = date('Y-m-d H:i:s');

        // print_r(Session::get('cart'));die();

        $id_dathang = DB::table('dathang')->insertGetId($data);
        $sum = 0;
        foreach (Session::get('cart') as $key => $cart) {
            $chitiet = array();
            $chitiet['id_dh'] = $id_dathang;
            $chitiet['id_sp'] = $cart['product_id'];
            $chitiet['tensp'] = $cart['product_name'];
            $chitiet['soluong'] = $cart['product_qty'];
            $chitiet['giasp'] = $cart['product_qty'] * $cart['product_price'];
            $sum += $cart['product_qty'] * $cart['product_price'];

            DB::table('chitiet_dh')->insert($chitiet);
        }

        $payment = array();
        $payment['id_dh'] = $id_dathang;

        if ($request->pay == 1) {
            $payment['hinhthuc'] = 'Thanh toán khi nhận hàng';
        } else {
            $payment['hinhthuc'] = 'Paypal';
        }

        $payment['tongtien'] = $sum;
        DB::table('thanhtoan')->insert($payment);

        $request->session()->forget('cart');

        $cate_product = DB::table('loai')->where('trangThai', '1')->orderBy('maloai', 'desc')->get();
        $brand_product = DB::table('hangsx')->where('TinhTrang', '1')->orderBy('ma_hangsx', 'desc')->get();

        return view('pages.checkout.hashcard')->with('category', $cate_product)->with('brand', $brand_product);
    }
    public function manage_order()
    {
        $this->AuthAdmin();
        return view('admin.manage_order');
    }
}
