<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gia extends Model
{
    protected $table="gia";
 	protected $fillable = ['mucgia'];
    public function bds()
    {
    	return $this->hasMany('App\BDS','idgia','id');
    }
     public static function delGia($id)
    {
        gia::find($id)->delete();
    }

}
