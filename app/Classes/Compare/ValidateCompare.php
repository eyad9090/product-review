<?php

namespace App\Classes\Compare;

class ValidateCompare
{
   public function isNullProducts($result)
   {
        if($result[0]==null||$result[1]==null)
        {
            return true;
        }
        return false;
   }
}
