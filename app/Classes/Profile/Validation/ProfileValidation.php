<?php

namespace App\Classes\Profile\Validation;

use App\Interfaces\Validation;
use Illuminate\Http\Request;
use Validator;

class ProfileValidation implements Validation
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
}
