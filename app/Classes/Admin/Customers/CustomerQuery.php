<?php

namespace App\Classes\Admin\Customers;

use App\Http\Controllers\Controller;
use App\Interfaces\CustomerQueries;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

use Illuminate\Support\Facades\Hash;
class CustomerQuery extends Controller implements CustomerQueries
{
    public function index() {
        $users = DB::table('users')
        ->leftJoin('feedbacks', 'users.id', '=', 'feedbacks.user_id')
        ->select("users.id","users.image","users.name","users.email",DB::raw('count(feedbacks.user_id) as reviews'))
        ->groupby("users.id","users.image","users.name","users.email")
        ->paginate(4);
        return  $users;
    }
    public function search($customerData){

        $users=DB::table('users')
        ->leftJoin('feedbacks', 'users.id', '=', 'feedbacks.user_id')
        ->select("users.id","users.image","users.name","users.email",DB::raw('count(feedbacks.user_id) as reviews'))
        ->groupby("users.id","users.image","users.name","users.email");
        $users=(new CustomerFilter)->filter($users,$customerData);
        $users=$users->paginate(4);
        return $users;
    }
    public function update($inputs)
    {
        $user=User::find($inputs["id"]);
        $result=array_filter($inputs);
        $user->update($result);
    }
    public function delete($id)
    {
        $user=User::find($id)->delete();
    }
}
