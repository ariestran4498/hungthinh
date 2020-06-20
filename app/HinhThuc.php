<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhThuc extends Model
{
    protected $table="hinhthuc";
    protected $fillable = ['tenhinhthuc'];

    public function bds()
    {
    	return $this->hasMany('App\BDS','idhinhthuc','id');
    }
    public static function delHinhThuc($id)
    {
        hinhthuc::find($id)->delete();
    }
}
