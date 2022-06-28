<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Session;
use App\Classes\Compare\DeviceObject;
use App\Classes\Compare\DeviceSearch;
use App\Classes\Compare\ValidateCompare;
use App\Classes\Compare\TelevisionSearch;
class CompareTelevisionController extends Controller
{
    public TelevisionSearch $televisionSearch;
    public ValidateCompare $validateCompare;
    public function __construct()
    {
        $this->televisionSearch = new TelevisionSearch();
        $this->validateCompare= new ValidateCompare();
        $this->middleware('auth');
    }
    
    public function index()
    {
        $product=null;
        $product2=null;
        return view("compare.compare_television",compact("product","product2"))
        ->with("type","");
    }
    public function search()
    {
        $products=$this->televisionSearch->search(request()->model,request()->model2);
        if($this->validateCompare->isNullProducts($products))
        {
            $product=null;
            $product2=null;
            session()->flash("failed");
            return view("compare.compare_television",compact("product","product2"))
            ->with("type","");
        }
        $product=$products[0];
        $product2=$products[1];
        Session::forget('failed');
        return view("compare.compare_television",compact("product","product2"))
        ->with("type",request()->type);
    }

}
