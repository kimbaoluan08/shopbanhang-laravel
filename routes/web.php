<?php

use Illuminate\Support\Facades\Route;

//Frontend
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/Trang-chu','App\Http\Controllers\HomeController@index');
Route::get('/chi-tiet-san-pham/{id_sp}','App\Http\Controllers\ProductController@product_detail');


//Backend
Route::get('/Admin','App\Http\Controllers\AdminController@index');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');

//Product
Route::get('/add-product','App\Http\Controllers\ProductController@add_product');
Route::get('/edit-product/{id_sp}','App\Http\Controllers\ProductController@edit_product');
Route::get('/del-product/{id_sp}','App\Http\Controllers\ProductController@del_product');
Route::get('/all-product','App\Http\Controllers\ProductController@all_product');
Route::get('/active-product/{id_sp}','App\Http\Controllers\ProductController@active_product');
Route::get('/unactive-product/{id_sp}','App\Http\Controllers\ProductController@unactive_product');
Route::post('/save-product','App\Http\Controllers\ProductController@save_product');
Route::post('/cap-nhat-product/{id_sp}','App\Http\Controllers\ProductController@cap_nhat_product');
Route::get('/detail-product/{id_sp}','App\Http\Controllers\ProductController@product_detail');

Route::get('/don-hang/{id_kh}','App\Http\Controllers\ProductController@don_hang');

//Cart
Route::get('/show_cart','App\Http\Controllers\CartController@show_cart');
Route::get('/del-sp/{session_id}','App\Http\Controllers\CartController@del_sp');
Route::post('/add-cart-ajax','App\Http\Controllers\CartController@add_cart_ajax');
Route::post('/update-cart','App\Http\Controllers\CartController@update_cart');

//Checkout
Route::get('/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/register-checkout','App\Http\Controllers\CheckoutController@register_checkout');
Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');
Route::get('/logout','App\Http\Controllers\CheckoutController@log_out');
Route::post('/add-customer','App\Http\Controllers\CheckoutController@add_customer');
Route::post('/login-customer','App\Http\Controllers\CheckoutController@login_customer');
Route::post('/save-checkout','App\Http\Controllers\CheckoutController@save_checkout');

//Order
Route::get('/manage-order','App\Http\Controllers\ProductController@manage_order');
Route::get('/del-order/{id_dh}','App\Http\Controllers\ProductController@del_order');

//Customer
Route::get('/manage-kh','App\Http\Controllers\AdminController@manage_kh');
Route::get('/del-kh/{id}','App\Http\Controllers\AdminController@del_kh');
