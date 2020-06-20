<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table="tintuc";
    protected $fillable = [
        'tieude',
        'tomtat',
        'noidung',
        'anh',
        'idloaitin',
        'ngaydang',
        'ngayketthuc',
        'idbds',
        'idusers',
    ];

    public function bds()
    {
    	return $this->belongsto('App\BDS','idbds','id');
    }

    public function users()
    {
    	return $this->belongsto('App\User','idusers','id');
    }

    public function loaitin()
    {
    	return $this->belongsTo('App\LoaiTin','idloaitin','id');
    }
    public static function deltintuc($id){
        tintuc::find($id)->delete();
    }
}
