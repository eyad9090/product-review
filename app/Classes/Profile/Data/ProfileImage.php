<?php

namespace App\Classes\Profile\Data;


use App\Interfaces\HomeQueries;
use App\Models\Product;
use App\Models\Feedback;
class ProfileImage
{
    public function getImage($requestImage)
    {
        $image=$requestImage;
        $newImage=time().$image->getClientOriginalName();
        $image->move("uploads/customers",$newImage);
        return array($image,$newImage);
    }
}
