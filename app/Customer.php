<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public static function showAllCustomer()
    {
        return self::query()->where('active_flg',1)->orderBy('id','asc')->get();
    }
}
