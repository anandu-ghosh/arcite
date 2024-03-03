<?php

namespace App\Helpers;

class Helper
{
    public static function lastActivity()
    {
        return session()->get('activity_time');
    }
}