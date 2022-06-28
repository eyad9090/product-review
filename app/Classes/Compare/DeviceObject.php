<?php

namespace App\Classes\Compare;

class DeviceObject 
{
    public function getType($type)
    {
        if($type=="laptop")
        {
            return new LaptopSearch();
        }
        else if($type=="mobile")
        {
            return new MobileSearch();
        }   
        else if($type=="television")
        {
            return new TelevisionSearch();
        }
    }
}
