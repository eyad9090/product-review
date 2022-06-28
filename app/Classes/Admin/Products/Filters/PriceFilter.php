<?php

namespace App\Classes\Admin\Products\Filters;

use App\Http\Controllers\Controller;
use App\Interfaces\Filters;



class PriceFilter extends Controller implements Filters
{
    public function filter($products,$filter)
    {
        return $products->where("price",">=",$filter);
    }
}
