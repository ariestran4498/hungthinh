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

class LoaiBDSController extends Controller
{
	public function getDanhsach()
    {
    	$loaibds = loaibds::all();
    	return view('admin.loaibds.danhsach',['loaibds'=>$loaibds]);
    }

    public function themLoaiBDS(Request $request)
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
    	$loaibds = loaibds::create(['tenloaibds'=>$request->tenloaibds]);
    	return redirect()->route('loaibds');
    }
    
    public function suaLoaiBDS(Request $request)
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
      loaibds::find($request->id)->update(['tenloaibds'=>$request->tenloaibds]);
      return redirect()->route('loaibds')->with('thongbao','Sửa thành công');
    }
    public function xoaLoaiBDS(Request $request)
    {
        loaibds::delLoaiBDS($request->id);
    }
}
