<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table="loaitin";
    protected $fillable = ['tenloaitin'];

    public function tintuc()
    {
    	return $this->hasMany('App\TinTuc','idloaitin','id');
    }
    public function bds()
    {
        return $this->hasManyThrough('App\BDS','App\TinTuc','idloaitin','idbds','id');
    }
    public static function delLoaiTin($id)
    {
        loaitin::find($id)->delete();
    }
}
