<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public static function showAllProvider()
    {
        return self::query()->where('active_flg',1)->orderBy('id','asc')->get();
    }
    public static function findProviderByID($id)
    {
        return self::query()->where('id',$id)->first();
    }
}
