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
use App\Thongtin;


class TinTucController extends Controller
{
    function __construct()
    {
        $tintuc = tintuc::all();
        view()->share('tintuc',$tintuc);
        $loaitin = loaitin::all();
        view()->share('loaitin',$loaitin);
        view()->share('tintuc',$loaitin);
        $bds = bds::all();
        view()->share('bds',$bds);
        view()->share('tintuc',$bds);
        $user = user::all();
        view()->share('user',$user);
        view()->share('tintuc',$user);

    }

    public function getDanhsach()
    {
    	$tintuc=tintuc::orderBy('id','DESC')->get();
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function themTinTuc(Request $request)
    {


        $tintuc = new TinTuc;
        $tintuc->tieude=$request->tieude;
        $tintuc->idloaitin=$request->loaitin;
        $tintuc->idbds=$request->bds;
        $tintuc->iduser=$request->user;
        $tintuc->tomtat=$request->tomtat;
        $tintuc->noidung=$request->noidung;
        $tintuc->ngaydang=$request->ngaydang;
        $tintuc->ngayketthuc=$request->ngayketthuc;

        if($request->hasFile('anh'))
        {

            $file=$request->file('anh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('tintuc')->with('loi','Ban chon sai file');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhtin",$anh_ten_moi);
            $tintuc->anh=$anh_ten_moi;

        }
        else
        {
            $tintuc->anh="";
        }
        $tintuc->save();
        return redirect()->route('tintuc')->with('thongbao','Thêm thành công');
    }
    public function xoaTinTuc(Request $request)
    {
        tintuc::deltintuc($request->id);
    }
    
    public function suaTinTuc(Request $request)
    {
        $tintuc1=tintuc::find($request->id);
        $tintuc1->tieude=$request->tieude;
        $tintuc1->idloaitin=$request->loaitin;
        $tintuc1->idbds=$request->bds;
        $tintuc1->iduser=$request->user;
        $tintuc1->tomtat=$request->tomtat;
        $tintuc1->noidung=$request->noidung;
        $tintuc1->ngaydang=$request->ngaydang;
        $tintuc1->ngayketthuc=$request->ngayketthuc;
        if($request->hasFile('anh'))
        {

            $file=$request->file('anh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('tintuc')->with('loi','Ban chon sai file');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhtintuc",$anh_ten_moi);
            $tintuc1->anh=$anh_ten_moi;

        }
        else
        {
            $tintuc1->anh="";
        }
        $tintuc1->save();
        return redirect()->route('tintuc')->with('thongbao','Sửa thành công');

    }
}
