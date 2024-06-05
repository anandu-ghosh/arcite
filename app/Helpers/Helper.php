<?php

namespace App\Helpers;
use DB;

class Helper
{
    public static function lastActivity()
    {
        return session()->get('activity_time');
    }

    public static function roles()
    {
       return DB::table('roles')->where('status','active')->whereNotIn('id', [1, 10])->get();
    }
}