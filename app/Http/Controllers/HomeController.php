<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
session_start();

class HomeController extends Controller
{
    public function index() {
        $cate_product = DB::table('loai')->where('trangThai','1')->orderBy('maloai', 'desc')->get();
        $brand_product = DB::table('hangsx')->where('TinhTrang','1')->orderBy('ma_hangsx', 'desc')->get();
        $all_product = DB::table('sanpham')->where('trangThai_sp','1')->orderBy('masp', 'desc')->get();
        return view('pages.home')->with('category', $cate_product)->with('brand', $brand_product)->with('product', $all_product);
    }
}
