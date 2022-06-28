<?php

namespace App\Classes\Admin\Customers\Filters;

use App\Http\Controllers\Controller;
use App\Interfaces\Filters;


class NameFilter extends Controller implements Filters
{
    public function filter($users,$filter)
    {
        return $users->where("name","LIKE","%".$filter."%");
    }
}
