<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Auth;
use App\LoaiTin;
use App\TinTuc;
use App\User;

class UsersController extends Controller
{
    function __construct()
    {
        $user = user::all();
        view()->share('user',$user);
        $tintuc = tintuc::all();
        view()->share('tintuc',$tintuc);
        view()->share('user',$tintuc);
    }

    public function getDanhsach()
    {
    	$user=user::orderBy('id','DESC')->get();
    	return view('admin.users.danhsach',['user'=>$user]);
    }

    public function themUsers(Request $request)
    {


        $user = new User;
        $user->hoten=$request->hoten;
        $user->sdt=$request->sdt;
        $user->level=$request->level;
        $user->email=$request->email;
        $user->password=$request->password;

        if($request->hasFile('anh'))
        {

            $file=$request->file('anh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('users')->with('loi','Ban chon sai file');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhusers",$anh_ten_moi);
            $user->anh=$anh_ten_moi;

        }
        else
        {
            $user->anh="";
        }
        $user->save();
        return redirect()->route('users')->with('thongbao','Thêm thành công');
    }
    public function xoaUsers(Request $request)
    {
        user::delusers($request->id);
    }
    
    public function suaUsers(Request $request)
    {
        
        $user = user::find($request->id);
       	$user->hoten = $request->hoten;
        $user->sdt = $request->sdt;
        $user->level = $request->level;
        $user->email = $request->email;
        $user->password = $request->password;
        if($request->hasFile('anh'))
        {

            $file=$request->file('anh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect()->route('users')->with('loi','Ban chon sai file');

            }

            $anh_ten=$file->getClientOriginalName();
            $anh_ten_moi= rand(123,999)."_". $anh_ten;
            $file->move("anhusers",$anh_ten_moi);
            $user->anh=$anh_ten_moi;

        }
        else
        {
            $user->anh="";
        }
        $user->save();
        return redirect()->route('users')->with('thongbao','Sửa thành công');
    }

    public function getLoginAdmin()
    {
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:40'
            ],[
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu không được ít hơn 3 ký tự',
            'password.max'=>'Mật khẩu không được nhiều hơn 40 ký tự'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/tintuc/danhsach');
        }
        else
        {
            return redirect('admin/login')->with('thongbao','Bạn đã nhập sai thông tin');
        }
    }
}
