<?php

namespace App\Classes\Admin\Data;


class CheckData
{
    public static function isNUll($data)
    {
        if($data===null)
        {
            return true;
        }
        return false;
    }
}