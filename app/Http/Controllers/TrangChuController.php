<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
class TrangChuController extends Controller
{
    public function __construct()
	{
        $slide=Slide::all();
        $loaitin=LoaiTin::all();
        view()->share('slide',$slide);
        view()->share('loaitin',$loaitin);
	}
	public function viewTrangChu()
    {
    	return view('nguoidung.trangchu');
        $loaitin = Loaitin::all();
    }

    public function viewLoaiTin($id)
    {
        $loaitin = Loaitin::find($id);
        $tintuc = TinTuc::where('idloaitin',$id)->paginate(5);
        return view('nguoidung.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]) ;
    }
    public function viewTinTuc($id)
    {
        $tintuc = Tintuc::find($id);
        return view('nguoidung.baiviet',['tintuc'=>$tintuc]);
    }
}
