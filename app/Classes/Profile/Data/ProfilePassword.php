<?php

namespace App\Classes\Profile\Data;
use Hash;
class ProfilePassword
{
    public function getPassword($password)
    {
        return Hash::make($password);
    }
}
