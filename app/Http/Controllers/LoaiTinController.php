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

class LoaiTinController extends Controller
{
    public function getDanhsach()
    {
    	$loaitin = loaitin::all();
    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function themLoaiTin(Request $request)
    {
    	// $this->validate($request,
     //    [
     //        'sotang'=> 'required|min:5|max:10'
     //    ],
     //    [
     //        'sotang.required'=>'Bạn chưa nhập số tầng',
     //        'sotang.min'=>'Số tầng phải có đọ dài tự 5 đến 10 ký tự',
     //        'sotang.max'=>'Số tầng bài viết phải có đọ dài tự 5 đến 10 ký tự',
     //    ]);
    	$loaitin = loaitin::create(['tenloaitin'=>$request->tenloaitin]);
    	return redirect()->route('loaitin');
    }
    
    public function suaLoaiTin(Request $request)
    {
      	// $this->validate($request,
       //  [
       //      'sotang'=> 'required|min:5|max:10'

       //  ],
       //  [
       //      'sotang.required'=>'Bạn chưa nhập số tầng',

       //      'sotang.min'=>'Số tầng phải có đọ dài tự 5 đến 10 ký tự',
       //      'sotang.max'=>'Số tầng bài viết phải có đọ dài tự 5 đến 10 ký tự',
       //  ]);
      loaitin::find($request->id)->update(['tenloaitin'=>$request->tenloaitin]);
      return redirect()->route('loaitin')->with('thongbao','Sửa thành công');
    }
    public function xoaLoaiTin(Request $request)
    {
        loaitin::delLoaiTin($request->id);
    }
}
