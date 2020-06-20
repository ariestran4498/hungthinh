<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'bds'],function(){
		Route::get('danhsach','BDSController@getDanhsach')->name('bds');
		Route::post('them','BDSController@themBDS')->name('thembds');
		Route::post('xoa','BDSController@xoaBDS')->name('xoabds');
		Route::post('sua','BDSController@suaBDS')->name('suabds');
	});

	Route::group(['prefix'=>'diadiem'],function(){
		Route::get('danhsach','DiaDiemController@getDanhsach')->name('diadiem');
		Route::post('sua','DiaDiemController@suaDiaDiem')->name('suadiadiem');
		Route::post('them','DiaDiemController@themDiaDiem')->name('themdiadiem');
		Route::post('xoa','DiaDiemController@xoaDiaDiem')->name('xoadiadiem');
	});

	Route::group(['prefix'=>'hinhthuc'],function(){
		Route::get('danhsach','HinhThucController@getDanhsach')->name('hinhthuc');
		Route::post('sua','HinhThucController@suaHinhThuc')->name('suahinhthuc');
		Route::post('them','HinhThucController@themHinhThuc')->name('themhinhthuc');
		Route::post('xoa','HinhThucController@xoaHinhThuc')->name('xoahinhthuc');
	});

	Route::group(['prefix'=>'loaibds'],function(){
		Route::get('danhsach','LoaiBDSController@getDanhsach')->name('loaibds');
		Route::post('sua','LoaiBDSController@suaLoaiBDS')->name('sualoaibds');
		Route::post('them','LoaiBDSController@themLoaiBDS')->name('themloaibds');
		Route::post('xoa','LoaiBDSController@xoaLoaiBDS')->name('xoaloaibds');
	});

	Route::group(['prefix'=>'loaitin'],function(){
		Route::get('danhsach','LoaiTinController@getDanhsach')->name('loaitin');
		Route::post('sua','LoaiTinController@suaLoaiTin')->name('sualoaitin');
		Route::post('them','LoaiTinController@themLoaiTin')->name('themloaitin');
		Route::post('xoa','LoaiTinController@xoaLoaiTin')->name('xoaloaitin');
	});

	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('danhsach','TinTucController@getDanhsach')->name('tintuc');
		Route::post('them','TinTucController@themTinTuc')->name('themtintuc');
		Route::post('xoa','TinTucController@xoaTinTuc')->name('xoatintuc');
		Route::post('sua','TinTucController@suaTinTuc')->name('suatintuc');
	});

	Route::group(['prefix'=>'users'],function(){
		Route::get('danhsach','UsersController@getDanhsach')->name('users');
		Route::post('them','UsersController@themUsers')->name('themusers');
		Route::post('xoa','UsersController@xoaUsers')->name('xoausers');
		Route::post('sua','UsersController@suaUsers')->name('suausers');
	});

	Route::group(['prefix'=>'dientich'],function(){
		Route::get('danhsach','DienTichController@getDanhsach')->name('dientich');
		Route::post('sua','DienTichController@suaDienTich')->name('suadientich');
		Route::post('them','DienTichController@themDienTich')->name('themdientich');
		Route::post('xoa','DienTichController@xoaDienTich')->name('xoadientich');
	});

	Route::group(['prefix'=>'gia'],function(){
		Route::get('danhsach','GiaController@getDanhsach')->name('gia');
		Route::post('sua','GiaController@suaGia')->name('suagia');
		Route::post('them','GiaController@themGia')->name('themgia');
		Route::post('xoa','GiaController@xoaGia')->name('xoagia');
	});

	Route::group(['prefix'=>'huongbds'],function(){
		Route::get('danhsach','HuongBDSController@getDanhsach')->name('huongbds');
		Route::post('sua','HuongBDSController@suaHuongBDS')->name('suahuongbds');
		Route::post('them','HuongBDSController@themHuongBDS')->name('themhuongbds');
		Route::post('xoa','HuongBDSController@xoaHuongBDS')->name('xoahuongbds');
	});

	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','SlideController@getDanhsach')->name('slide');
		Route::post('sua','SlideController@suaSlide')->name('suaslide');
		Route::post('them','SlideController@themSlide')->name('themslide');
		Route::post('xoa','SlideController@xoaSlide')->name('xoaslide');
		Route::post('tinhtrang','SlideController@TinhTrangSlide')->name('tinhtrangslide');
	});

	Route::group(['prefix'=>'thongtin'],function(){
		Route::get('thongtin','ThongTinController@getThongTin')->name('thongtin');
		Route::post('sua','ThongTinController@suaThongTin')->name('suathongtin');
	});
});

Route::get('trangchu','TrangChuController@viewTrangChu')->name('trangchu');
Route::get('login','UsersController@getLoginAdmin');
Route::post('login','UsersController@postLoginAdmin');
Route::get('loaitin/{id}','TrangChuController@viewLoaiTin');
Route::get('baiviet/{id}','TrangChuController@viewTinTuc');

