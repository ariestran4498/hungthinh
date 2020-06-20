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

class DienTichController extends Controller
{
    public function getDanhsach()
    {
    	$dientich = dientich::all();
    	return view('admin.dientich.danhsach',['dientich'=>$dientich]);
    }

    public function themDienTich(Request $request)
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
    	$dientich = dientich::create(['dientichbds'=>$request->dientichbds]);
    	return redirect()->route('dientich');
    }
    
    public function suaDienTich(Request $request)
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
      dientich::find($request->id)->update(['dientichbds'=>$request->dientichbds]);
      return redirect()->route('dientich')->with('thongbao','Sửa thành công');
    }
    public function xoaDienTich(Request $request)
    {
        dientich::delDienTich($request->id);
    }
}
