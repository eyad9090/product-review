<?php

namespace App\Classes\Admin\Customers;

use App\Http\Controllers\Controller;
use App\Classes\Admin\Data\CheckData;

use App\Classes\Admin\Customers\Filters\EmailFilter;
use App\Classes\Admin\Customers\Filters\NameFilter;

use App\Interfaces\Filters;

class CustomerFilter extends Controller implements Filters
{

    public function filter($users,$filter)
    {
        if(!CheckData::isNUll($filter->email))
        {
            $users=(new EmailFilter())->filter($users,$filter->email);
        }
        if(!CheckData::isNUll($filter->name))
        {
            $users=(new nameFilter())->filter($users,$filter->name);
        }
        return $users;
    }
}
