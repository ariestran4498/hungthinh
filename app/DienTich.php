<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DienTich extends Model
{
    protected $table="dientich";
    protected $fillable = ['dientichbds'];
    public function bds()
    {
    	return $this->hasMany('App\BDS','iddientich','id');
    }
    public static function delDienTich($id)
    {
        dientich::find($id)->delete();
    }
}
