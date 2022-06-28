<?php

namespace App\Classes\Admin\Products\Filters;

use App\Http\Controllers\Controller;
use App\Interfaces\Filters;


class ModelFilter extends Controller implements Filters
{
    public function filter($products,$filter)
    {
        return $products->where("model","LIKE","%".$filter."%");
    }
}
