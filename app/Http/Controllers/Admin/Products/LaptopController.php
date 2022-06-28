<?php

namespace App\Http\Controllers\Admin\Products;
use App\Http\Controllers\Controller;

use App\Models\Laptop;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Classes\Admin\Statistics;
use App\Classes\Admin\Products\LaptopQuery;
use App\Classes\Admin\Products\Data\LaptopData;

use App\Classes\Admin\Products\Validation\LaptopValidation;

class LaptopController extends Controller
{
    public Statistics $statistics;
    public LaptopQuery $laptopQuery;
    public LaptopData $productData;
    public LaptopValidation $laptopValidation;
    public function __construct()
    {
        $this->statistics=new Statistics();
        $this->laptopQuery=new LaptopQuery();
        $this->laptopData=new LaptopData();
        $this->laptopValidation=new LaptopValidation();

        $this->middleware("auth");
        $this->middleware("role");
    }
    public function index()
    {
        $products=$this->laptopQuery->index();
        return view("admin.products.laptops",compact("products"))
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }
    public function search()
    {
        $this->laptopData->model=data_get(request(),"filter.model");
        $this->laptopData->rating=data_get(request(),"filter.rating");
        $this->laptopData->price=data_get(request(),"filter.price");
        $this->laptopData->ram=data_get(request(),"filter.ram");
        $this->laptopData->processor=data_get(request(),"filter.processor");
        $this->laptopData->gpu=data_get(request(),"filter.gpu");
        
        $products=$this->laptopQuery->search($this->laptopData)->appends(request()->all());

        return view("admin.products.laptops",compact("products"))
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }

    public function update(Request $request)
    {
        $validated=$this->laptopValidation->validate($request);
        if(!$validated)
        {
            session()->flash("fails");
            return redirect()->back()->withInput();
        }
        $inputs = $request->all();
        if($request->has("image"))
        {
            $image=$request->image;
            $inputs["image"]=$this->laptopValidation->getImage($image);
        }
        $product=$this->laptopQuery->update($inputs["id"]);
        // dd($inputs);
        $product->fill($inputs)->save();
        $product->laptop->fill($inputs)->save();

        session()->flash("success-update");
        return redirect()->back()->withInput();
    }

    public function create()
    {
        return view("admin.products.create-laptops")
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }

    public function store(Request $request)
    {
        $validated=$this->laptopValidation->validate($request);
        if(!$validated)
        {
            session()->flash("fails");
            return redirect()->back();
        }
        $inputs = $request->all();
        if($request->has("image"))
        {
            $image=$request->image;
            $inputs["image"]=$this->laptopValidation->getImage($image);
        }
        // dd($inputs);
        $this->laptopQuery->store($inputs);
        session()->flash("success-add");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $product=$this->laptopQuery->delete($id);
        return redirect()->back();
    }
}