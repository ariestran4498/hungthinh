<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BDS;
use App\DiaDiem;
use App\HinhThuc;
use App\LoaiBDS;
use App\LoaiTin;
use App\TinTuc;
use App\User;
use App\Slide;
use App\HuongBDS;
use App\DienTich;
use App\Gia;

class DiaDiemController extends Controller
{
         public function getDanhsach()
    {
    	$diadiem = diadiem::all();
    	return view('admin.diadiem.danhsach',['diadiem'=>$diadiem]);
    }

    public function themDiaDiem(Request $request)
    {
    	$diadiem = diadiem::create(['diadiembds'=>$request->diadiembds]);
    	return redirect()->route('diadiem');
    }
    
    public function suaDiaDiem(Request $request)
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
      diadiem::find($request->id)->update(['diadiembds'=>$request->diadiembds]);
      return redirect()->route('diadiem')->with('thongbao','Sửa thành công');
    }
    public function xoaDiaDiem(Request $request)
    {
        diadiem::delDiaDiem($request->id);
    }
}
