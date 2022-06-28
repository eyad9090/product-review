<?php

namespace App\Classes\Admin\Feedbacks;

use App\Http\Controllers\Controller;
use App\Classes\Admin\Data\CheckData;

use App\Classes\Admin\Feedbacks\Filters\ModelFilter;
use App\Classes\Admin\Feedbacks\Filters\IdFilter;
use App\Interfaces\Filters;

class FeedbackFilter extends Controller implements Filters
{
    public function filter($product,$filter)
    {
        if(!CheckData::isNUll($filter->model))
        {
            $product=(new ModelFilter())->filter($product,$filter->model);
        }
        if(!CheckData::isNUll($filter->id))
        {
            $product=(new IdFilter())->filter($product,$filter->id);
        }
        return $product;
    }
}
