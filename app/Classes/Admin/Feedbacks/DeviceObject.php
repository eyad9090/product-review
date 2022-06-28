<?php

namespace App\Classes\Admin\Feedbacks;

class DeviceObject
{
    public function getType($type)
    {
        if($type=="laptop")
        {
            return new LaptopFeedback();
        }
        else if($type=="television")
        {
            return new TelevisionFeedback();
        }
        else if($type=="mobile")
        {
            return new MobileFeedback();
        }
    }
}
