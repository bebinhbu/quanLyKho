<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public static function showAllEmployee()
    {
        return self::query()->where('active_flg','1')->orderBy('id','desc')->get();
    }
    public static function findEmployeeByID($id){
        return self::query()->where('id',$id)->first();
    }
}
