<?php

namespace App\Classes\Profile;

use App\Classes\Profile\Data\ProfileData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Auth;
use DB;

class ProfileQuery extends Controller
{
    public function index($id)
    {
        $user_id = $id;
        $reviewsCount=DB::table('users')
            ->where("users.id",$user_id)
            ->leftjoin('feedbacks', 'users.id', '=', 'feedbacks.user_id')
            ->select("users.id",DB::raw('count(feedbacks.user_id) as reviews'))
            ->groupby("users.id")
            ->first();
        return $reviewsCount;
    }
    public function update(Request $request)
    {
        $inputs=(new ProfileData)->getData($request);
        $user=User::find($inputs["id"]);
        $result=array_filter($inputs);
        $user->update($result);
    }
}
