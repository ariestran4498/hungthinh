<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaDiem extends Model
{
    protected $table="diadiem";
    protected $fillable = ['diadiembds'];

    public function bds()
    {
    	return $this->hasMany('App\BDS','iddiadiem','id');
    }
    public static function delDiaDiem($id)
    {
        diadiem::find($id)->delete();
    }
}
