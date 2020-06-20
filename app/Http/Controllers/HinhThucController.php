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

class HinhThucController extends Controller
{
    public function getDanhsach()
    {
    	$hinhthuc = hinhthuc::all();
    	return view('admin.hinhthuc.danhsach',['hinhthuc'=>$hinhthuc]);
    }

    public function themHinhThuc(Request $request)
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
    	$hinhthuc = hinhthuc::create(['tenhinhthuc'=>$request->tenhinhthuc]);
    	return redirect()->route('hinhthuc');
    }
    
    public function suaHinhThuc(Request $request)
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
      hinhthuc::find($request->id)->update(['tenhinhthuc'=>$request->tenhinhthuc]);
      return redirect()->route('hinhthuc')->with('thongbao','Sửa thành công');
    }
    public function xoaHinhThuc(Request $request)
    {
        hinhthuc::delHinhThuc($request->id);
    }
}
