<?php

namespace App\Classes\Admin\Feedbacks\Filters;

use App\Http\Controllers\Controller;
use App\Interfaces\Filters;


class IdFilter extends Controller implements Filters
{
    public function filter($product,$filter)
    {
        return $product->where("products.id",$filter);
    }
}
