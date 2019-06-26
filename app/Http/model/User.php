<?php

namespace App\Http\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //链接数据库
    protected $connection = 'myshop';
    //链接表
     protected $table = 'user';
     public $timestamps = false;
}
