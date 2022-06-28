<?php

namespace App\Classes\Profile\Data;

use Illuminate\Http\Request;

class ProfileData
{
    public function getData(Request $request)
    {
        $inputs = $request->all();
        if($request->has("image")&&$inputs["image"]!=null)
        {
            $imageData=(new ProfileImage)->getImage($request->image);
            $inputs["image"]=$imageData[0];
            $inputs["image"]="uploads/customers/".$imageData[1];
        }
        if($request->has("password")&&$inputs["password"]!=null)
        {
            $inputs["password"]=(new ProfilePassword)->getPassword($inputs["password"]);
        }
        return $inputs;
    }
}
