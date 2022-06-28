<?php

namespace App\Classes\Admin\Customers\Filters;

use App\Http\Controllers\Controller;
use App\Interfaces\Filters;


class EmailFilter extends Controller implements Filters
{
    public function filter($users,$filter)
    {
        return $users->where("email","LIKE","%".$filter."%");
    }
}
