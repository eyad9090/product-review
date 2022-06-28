<?php
namespace App\Http\Controllers\Admin\Products;
use App\Http\Controllers\Controller;

use App\Models\Laptop;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Classes\Admin\Statistics;
use App\Classes\Admin\Products\TelevisionQuery;
use App\Classes\Admin\Products\Data\TelevisionData;

use App\Classes\Admin\Products\Validation\TelevisionValidation;

class TelevisionController extends Controller
{
    public Statistics $statistics;
    public TelevisionQuery $televisionQuery;
    public TelevisionData $televisionData;
    public TelevisionValidation $televisionValidation;
    public function __construct()
    {
        $this->statistics=new Statistics();
        $this->televisionQuery=new TelevisionQuery();
        $this->televisionData=new TelevisionData();
        $this->televisionValidation=new TelevisionValidation();

        $this->middleware("auth");
        $this->middleware("role");
    }

    public function index()
    {
        $products=$this->televisionQuery->index();
        return view("admin.products.televisions",compact("products"))
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }

    public function search()
    {
        $this->televisionData->model=data_get(request(),"filter.model");
        $this->televisionData->rating=data_get(request(),"filter.rating");
        $this->televisionData->price=data_get(request(),"filter.price");
        $this->televisionData->screenSize=data_get(request(),"filter.screen-size");
        
        $products=$this->televisionQuery->search($this->televisionData)->appends(request()->all());

        return view("admin.products.televisions",compact("products"))
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }

    public function update(Request $request)
    {
        $validated=$this->televisionValidation->validate($request);
        if(!$validated)
        {
            session()->flash("fails");
            return redirect()->back()->withInput();
        }
        $inputs = $request->all();
        if($request->has("image"))
        {
            $image=$request->image;
            $inputs["image"]=$this->televisionValidation->getImage($image);
        }

        $product=$this->televisionQuery->update($inputs["id"]);
        $product->fill($inputs)->save();
        $product->television->fill($inputs)->save();

        session()->flash("success-update");
        return redirect()->back()->withInput();
    }

    public function create()
    {
        return view("admin.products.create-televisions")
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }

    public function store(Request $request)
    {
        $validated=$this->televisionValidation->validate($request);
        if(!$validated)
        {
            session()->flash("fails");
            return redirect()->back();
        }
        $inputs = $request->all();
        if($request->has("image"))
        {
            $image=$request->image;
            $inputs["image"]=$this->televisionValidation->getImage($image);
        }
        $this->televisionQuery->store($inputs);
        session()->flash("success-add");
        return redirect()->back();
    }

    public function destroy($id)
    {
        $product=$this->televisionQuery->delete($id);
        return redirect()->back();
    }
}
