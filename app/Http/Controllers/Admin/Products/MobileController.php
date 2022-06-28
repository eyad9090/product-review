<?php
namespace App\Http\Controllers\Admin\Products;
use App\Http\Controllers\Controller;

use App\Models\Laptop;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Classes\Admin\Statistics;
use App\Classes\Admin\Products\MobileQuery;
use App\Classes\Admin\Products\Data\MobileData;

use App\Classes\Admin\Products\Validation\MobileValidation;

class MobileController extends Controller
{
    public Statistics $statistics;
    public MobileQuery $mobileQuery;
    public MobileData $mobileData;
    public MobileValidation $mobileValidation;
    public function __construct()
    {
        $this->statistics=new Statistics();
        $this->mobileQuery=new MobileQuery();
        $this->mobileData=new MobileData();
        $this->mobileValidation=new MobileValidation();

        $this->middleware("auth");
        $this->middleware("role");
    }

    public function index()
    {
        $products=$this->mobileQuery->index();
        return view("admin.products.mobiles",compact("products"))
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }

    public function search()
    {
        $this->mobileData->model=data_get(request(),"filter.model");
        $this->mobileData->rating=data_get(request(),"filter.rating");
        $this->mobileData->price=data_get(request(),"filter.price");
        $this->mobileData->ram=data_get(request(),"filter.ram");
        $this->mobileData->camera=data_get(request(),"filter.camera");
        
        $products=$this->mobileQuery->search($this->mobileData)->appends(request()->all());

        return view("admin.products.mobiles",compact("products"))
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }

    public function update(Request $request)
    {
        $validated=$this->mobileValidation->validate($request);
        if(!$validated)
        {
            session()->flash("fails");
            return redirect()->back()->withInput();
        }
        $inputs = $request->all();
        if($request->has("image"))
        {
            $image=$request->image;
            $inputs["image"]=$this->mobileValidation->getImage($image);
        }
        $product=$this->mobileQuery->update($inputs["id"]);
        $product->fill($inputs)->save();
        $product->mobile->fill($inputs)->save();

        session()->flash("success-update");
        return redirect()->back()->withInput();
    }

    public function create()
    {
        return view("admin.products.create-mobiles")
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }

    public function store(Request $request)
    {
        $validated=$this->mobileValidation->validate($request);
        if(!$validated)
        {
            session()->flash("fails");
            return redirect()->back();
        }
        $inputs = $request->all();
        if($request->has("image"))
        {
            $image=$request->image;
            $inputs["image"]=$this->mobileValidation->getImage($image);
        }
        $this->mobileQuery->store($inputs);
        session()->flash("success-add");
        return redirect()->back();
    }
    public function destroy($id)
    {
        $product=$this->mobileQuery->delete($id);
        return redirect()->back();
    }
}
