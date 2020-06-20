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

class HuongBDSController extends Controller
{
    public function getDanhsach()
    {
    	$huongbds = huongbds::all();
    	return view('admin.huongbds.danhsach',['huongbds'=>$huongbds]);
    }

    public function themHuongBDS(Request $request)
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
    	$huongbds = huongbds::create(['huongnha'=>$request->huongnha]);
    	return redirect()->route('huongbds');
    }
    
    public function suaHuongBDS(Request $request)
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
      huongbds::find($request->id)->update(['huongnha'=>$request->huongnha]);
      return redirect()->route('huongbds')->with('thongbao','Sửa thành công');
    }
    public function xoaHuongBDS(Request $request)
    {
        huongbds::delLoaiBDS($request->id);
    }
}
