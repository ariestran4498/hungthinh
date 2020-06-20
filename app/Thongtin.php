<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thongtin extends Model
{
    protected $table="thongtin";
    protected $fillable = ['diachi','gioithieu','sdt','email'];
}
