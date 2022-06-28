<?php

namespace App\Classes\Admin\Products;

use App\Http\Controllers\Controller;
use App\Classes\Admin\Data\CheckData;

use App\Interfaces\Filters;

class TelevisionFilter extends Controller implements Filters
{
    public function filter($products,$filter)
    {
        if(!CheckData::isNUll($filter->model))
        {
            $products=$products->where("model","LIKE","%".$filter->model."%");
        }
        if(!CheckData::isNUll($filter->price))
        {
            $products=$products->where("price","<=",$filter->price);
        }
        if(!CheckData::isNUll($filter->rating))
        {
            $products=$products->having("rating",$filter->rating);
        }
        if(!CheckData::isNUll($filter->screenSize))
        {
            $products=$products->where("screen_size",$filter->screenSize);
        }
        return $products;
    }
}
