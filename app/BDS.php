<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BDS extends Model
{
    protected $table="bds";
    protected $fillable = [
        'tenbds',
        'diachi',
        'iddiadiem',
        'idloaibds',
        'idhinhthuc',
        'idgia',
        'idhuongnha',
        'iddientich',
        'idusers',
    ];

    public function diadiem()
    {
    	return $this->belongsTo('App\DiaDiem','iddiadiem','id');
    }

    public function loaibds()
    {
    	return $this->belongsTo('App\LoaiBDS','idloaibds','id');
    }

    public function hinhthuc()
    {
    	return $this->belongsTo('App\HinhThuc','idhinhthuc','id');
    }

    public function gia()
    {
    	return $this->belongsTo('App\Gia','idgia','id');
    }

    public function huongbds()
    {
    	return $this->belongsTo('App\HuongBDS','idhuongnha','id');
    }

    public function dientich()
    {
    	return $this->belongsTo('App\DienTich','iddientich','id');
    }

    public function tintuc()
    {
    	return $this->hasMany('App\TinTuc','idtintuc','id');
    }

    public function users()
    {
    	return $this->belongsTo('App\User','iduser','id');
    }

    public static function delbds($id){
        bds::find($id)->delete();
    }
}