<?php

namespace App\Classes\Admin\Customers\Validation;

use App\Interfaces\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class CustomerValidation implements Validation
{
    public function validate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "email"=>"required|unique:users,email,".$request->id
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
        $image->move("uploads/customers",$newImage);
        return "uploads/customers/".$newImage;
    }
    public function getPassword($password)
    {
        $password=Hash::make($password);
        return $password;
    }
}
