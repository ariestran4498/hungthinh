<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BDS;
use App\DiaDiem;
use App\HinhThuc;
use App\LoaiBDS;
use App\LoaiTin;
use App\TinTuc;
use App\Users;
use App\Slide;
use App\HuongBDS;
use App\DienTich;
use App\Gia;
use App\Thongtin;

class ThongTinController extends Controller
{
    public function getThongTin()
    {
    	$thongtin=thongtin::find(1);
    	return view('admin.thongtin.thongtin',['thongtin'=>$thongtin]);
    }
    public function suaThongTin(Request $request)
    {
    	 // $this->validate($request,
      //   [
      //       'diachi'=> 'required|min:3|max:60',
      //       'sdt'=> 'required|min:10|max:11',
      //       'email'=> 'required',

      //   ],
      //   [
      //       'diachi.required'=>'Bạn chưa địa chỉ',
      //       'sdt.required'=>'Bạn chưa nhập sdt',
      //       'email.required'=>'Bạn chưa nhập email',

      //       'diachi.min'=>'Địa chỉ có đọ dài tự 10 đến 60 ký tự',
      //       'diachi.max'=>'Địa chỉ bài viết phải có đọ dài tự 3 đến 100 ký tự',
      //       'sdt.min'=>'Số điện thoại có từ 10 đến 11 chữ số',
      //       'sdt.max'=>'Số điện thoại có từ 10 đến 11 chữ số',
      //   ]);
    	  thongtin::find(1)->update(['diachi'=>$request->diachi,'sdt'=>$request->sdt,'email'=>$request->email,'gioithieu'=>$request->gioithieu]);
    	  return redirect()->route('thongtin')->with('thongbao','Sửa thành công'); 
    }
     /*public function getGioiThieu()
    {
       $gioithieu=gioithieu::find(1);
       return view('admin.pages.thongtin.gioithieu',['gioithieu'=>$gioithieu]);
    }
    public function suaGioiThieu(Request $request)
    {
         $this->validate($request,
        [
            'tomtat'=> 'required|min:30|max:200',
            'linkvideo'=> 'required|min:10|max:200',

        ],
        [
            'tomtat.required'=>'Bạn chưa nhập tóm tắt',
            'linkvideo.required'=>'Bạn chưa nhập link video',

            'tomtat.min'=>'Tóm tắt phải có đọ dài tự 30 đến 200 ký tự',
            'tomtat.max'=>'Tóm tắt phải có đọ dài tự 30 đến 200 ký tự',
            'linkvideo.min'=>'Link video phải có từ 10 đến 200 ký tự',
            'linkvideo.max'=>'Link video phải có từ 10 đến 200 ký tự',
        ]);
       gioithieu::find(1)->update(['tomtat'=>$request->tomtat,'linkvideo'=>$request->linkvideo]);
       return redirect()->route('gioithieu')->with('thongbao','Sửa thành công'); 
    }*/
}
