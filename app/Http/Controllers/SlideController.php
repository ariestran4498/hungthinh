<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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


class SlideController extends Controller
{
    public function getDanhsach()
    {
    	$slide= slide::all();
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }


    public function themSlide(Request $request)
    {
        
        if($request->hasFile('hinh'))
        {

            $file=$request->file('hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('slide')->with('loi','Bạn chọn sai định dạng ảnh');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhslide",$anh_ten_moi);
            $anh_slide=$anh_ten_moi;

        }
        else
        {
           $anh_slide="";
        }

        $slide = Slide::create(['tieude'=>$request->tieude,'chuthich'=>$request->chuthich,'tinhtrang'=>$request->tinhtrang,'hinh'=>$anh_slide]);
        return redirect()->route('slide')->with('thongbao','Thêm Thành Công');
    }
    public function xoaSlide(Request $request)
    {
    	Slide::delslide($request->id);
    }
    
    public function suaSlide(Request $request)
    {
         $slide2= Slide::find($request->id);
         $anh_cu=$slide2->hinh;
         
        if($request->hasFile('hinh'))
        {

            $file=$request->file('hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('slide')->with('loi','Bạn chọn sai định dạng ảnh');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhslide",$anh_ten_moi);
            $anh_slide=$anh_ten_moi;

        }
        else
        {
           $anh_slide=$anh_cu;
        }
        Slide::find($request->id)->update(['tieude'=>$request->tieude,'chuthich'=>$request->chuthich,'hinh'=>$anh_slide]);
        return redirect()->route('slide')->with('thongbao','Thêm Thành Công');
    }
    public function TinhTrangSlide(Request $request){
        Slide::find($request->id)->update(['tinhtrang'=>$request->tinhtrang]);
    }
}
