<?php

namespace App\Http\Controllers\Admin\Customers;

use App\Classes\Admin\Customers\CustomerQuery;
use App\Classes\Admin\Customers\Data\CustomerData;
use App\Classes\Admin\Customers\Validation\CustomerValidation;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Classes\Admin\Statistics;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
class CustomerController extends Controller
{
    public Statistics $statistics;
    public CustomerQuery $customerQuery;
    public CustomerData $customerData;
    public CustomerValidation $customerValidation;
    public function __construct()
    {
        $this->statistics=new Statistics();
        $this->customerQuery=new CustomerQuery();
        $this->customerData=new CustomerData();
        $this->customerValidation=new CustomerValidation();

        $this->middleware("auth");
        $this->middleware("role");
    }
    public function index()
    {
        $users = $this->customerQuery->index();
        return view("admin.customers.customers",compact("users"))
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }

    public function search()
    {
        $this->customerData->email=request()->email;
        $this->customerData->name=request()->name;
        $users=$this->customerQuery->search($this->customerData)->appends(request()->all());
        return view("admin.customers.customers",compact("users"))
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }
    public function update(Request $request)
    {
        $validated=$this->customerValidation->validate($request);
        if(!$validated)
        {
            session()->flash("fails");
            return redirect()->back()->withInput();
        }
        $inputs = $request->all();
        if($request->has("image"))
        {
            $image=$request->image;
            $inputs["image"]=$this->customerValidation->getImage($image);
        }
        if($request->has("password"))
        {
            $passowrd=$request->password;
            $inputs["password"]=$this->customerValidation->getPassword($passowrd);
        }
       $this->customerQuery->update($inputs);
        session()->flash("success");
        return redirect()->route("admin.customers");
    }
    public function destroy($id)
    {
        $this->customerQuery->delete($id);
        return redirect()->back();
    }
}
