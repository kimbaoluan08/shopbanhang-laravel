<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    public function AuthAdmin(){
        $admin_id =  Session::get('admin_id');
        if($admin_id){
            return Redirect::to('Dasboard');
        } else {
            return Redirect::to('Admin')->send();
        }
    }
    public function index() {
        return view('admin_login');
    }
    public function dashboard(Request $request) {
        $tenDN = $request->username_admin;
        $pass = md5($request->password_admin);

        $result = DB::table('admin')->where('tenDN_ad', $tenDN)->where('password_ad', $pass)->first();

        if($result){
            Session::put('admin_name', $result->HoTen_ad);
            Session::put('admin_id', $result->id_ad);
            return Redirect::to('/all-product');
        } else {
            Session::put('message', 'Bạn đã nhập sai tài khoản hoặc mật khẩu');
            return Redirect::to('/Admin');
        }
    }
    public function logout(){
        $this->AuthAdmin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/Admin');
    }
    public function manage_kh(){
        $this->AuthAdmin();
        $kh = DB::table('khachhang')->get();
        return view('admin.manage_kh')->with('kh', $kh);
    }
    public function del_kh($id)
    {
        $this->AuthAdmin();
        DB::table('khachhang')->where('id', $id)->delete();
        Session()->put('message', 'Xóa thành công');
        return redirect('manage-kh');
    }
}
