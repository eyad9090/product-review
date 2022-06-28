<?php

namespace App\Classes\Admin\Products;

use App\Http\Controllers\Controller;
use App\Classes\Admin\Data\CheckData;
use App\Interfaces\Filters;

class LaptopFilter extends Controller implements Filters
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
        if(!CheckData::isNUll($filter->ram))
        {
            $products=$products->where("ram","LIKE","%".$filter->ram."%");
        }
        if(!CheckData::isNUll($filter->processor))
        {
            $products=$products->where("processor","LIKE","%".$filter->processor."%");
        }
        if(!CheckData::isNUll($filter->gpu))
        {
            $products=$products->where("gpu","LIKE","%".$filter->gpu."%");
        }
        return $products;
    }
}
