<?php

namespace App\Classes\Admin\Products\Validation;

use App\Interfaces\Validation;
use Illuminate\Http\Request;
use Validator;

class TelevisionValidation implements Validation
{
    public function validate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "model"=>"required|unique:products,model,".$request->id
        ]);
        if($validate->fails())
        {
            return false;
        }
        return true;
    }
    public function getImage($image)
    {
        $newImage=time().$image->getClientOriginalName();
        $image->move("uploads/products",$newImage);
        return "uploads/products/".$newImage;
    }
}
