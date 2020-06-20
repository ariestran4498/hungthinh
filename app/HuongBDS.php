<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HuongBDS extends Model
{
    protected $table="huongbds";
    protected $fillable = ['huongnha'];
    public function bds()
    {
    	return $this->hasMany('App\BDS','idhuongnha','id');
    }
    public static function delHuongBDS($id)
    {
        huongbds::find($id)->delete();
    }
}
