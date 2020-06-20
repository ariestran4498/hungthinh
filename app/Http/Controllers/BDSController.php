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

class BDSController extends Controller
{
	function __construct()
    {
        $bds = bds::all();
        view()->share('bds',$bds);
        $diadiem = diadiem::all();
        view()->share('diadiem',$diadiem);
        view()->share('bds',$diadiem);
        $loaibds = loaibds::all();
        view()->share('loaibds',$loaibds);
        view()->share('bds',$loaibds);
        $hinhthuc = hinhthuc::all();
        view()->share('hinhthuc',$hinhthuc);
        view()->share('bds',$hinhthuc);
        $gia = gia::all();
        view()->share('gia',$gia);
        view()->share('bds',$gia);
        $huongbds = huongbds::all();
        view()->share('huongbds',$huongbds);
        view()->share('bds',$huongbds);
        $user = user::all();
        view()->share('user',$user);
        view()->share('bds',$user);
        $dientich = dientich::all();
        view()->share('dientich',$dientich);
        view()->share('bds',$dientich);
    }

     public function getDanhsach()
    {
    	$bds = bds::all();
    	return view('admin.bds.danhsach',['bds'=>$bds]);
    }

    public function themBDS(Request $request)
    {


        $bds = new BDS;
        $bds->tenbds=$request->tenbds;
        $bds->diachi=$request->diachi;
        $bds->iddiadiem=$request->diadiem;
        $bds->idloaibds=$request->loaibds;
        $bds->idhinhthuc=$request->hinhthuc;
        $bds->idgia=$request->gia;
        $bds->idhuongnha=$request->huongbds;
        $bds->iddientich=$request->dientich;
        $bds->idusers=$request->user;
        $bds->save();
        return redirect()->route('bds')->with('thongbao','Thêm thành công');
    }
    public function suaBDS(Request $request)
    {
    	$bds = BDS::find($request->id);
        $bds->tenbds=$request->tenbds;
        $bds->diachi=$request->diachi;
        $bds->iddiadiem=$request->diadiem;
        $bds->idloaibds=$request->loaibds;
        $bds->idhinhthuc=$request->hinhthuc;
        $bds->idgia=$request->gia;
        $bds->idhuongnha=$request->huongbds;
        $bds->iddientich=$request->dientich;
        $bds->idusers=$request->user;
        $bds->save();
        return redirect()->route('bds')->with('thongbao','Sửa thành công');
    }
    public function xoaBDS(Request $request)
    {
        BDS::delbds($request->id);
    }
}
