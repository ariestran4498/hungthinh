<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiBDS extends Model
{
    protected $table="loaibds";
    protected $fillable = ['tenloaibds'];

    public function bds()
    {
    	return $this->belongsTo('App\BDS','idloaibds','id');
    }
    public static function delHinhThuc($id)
    {
        hinhthuc::find($id)->delete();
    }
}
