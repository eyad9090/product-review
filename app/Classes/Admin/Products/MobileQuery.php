<?php

namespace App\Classes\Admin\Products;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductsQueries;

use App\Models\Product;
use App\Models\Mobile;
use DB;

class MobileQuery extends Controller implements ProductsQueries
{
    public function index() {
        $products=Product::select("products.id",
        "products.image","products.type",
        "products.model","products.price",
        DB::raw("round(IFNULL(avg(feedbacks.rating),0)) as rating"),
        "mobiles.ram","mobiles.camera")
        ->join("mobiles","products.id","=","mobiles.product_id")
        ->leftjoin("feedbacks","feedbacks.product_id","products.id")
        ->groupby("products.id","products.image",
            "products.type","products.model","products.price",
            "mobiles.ram","mobiles.camera")->paginate(4);
        return $products;
    }
    public function search($productData){
        $products=Product::select("products.id",
        "products.image","products.type",
        "products.model","products.price",
        DB::raw("round(IFNULL(avg(feedbacks.rating),0)) as rating"),
        "mobiles.ram","mobiles.camera")
        ->join("mobiles","products.id","=","mobiles.product_id")
        ->leftjoin("feedbacks","feedbacks.product_id","products.id")
        ->groupby("products.id","products.image",
            "products.type","products.model","products.price",
            "mobiles.ram","mobiles.camera");
        
       $products=(new MobileFilter)->filter($products,$productData);
       $products=$products->paginate(4);
       return $products;
    }
    public function update($id)
    {
        $product=Product::where("id",$id)->first();
        return $product;
    }
    public function store($inputs)
    {
        $inputs["type"]="mobile";
        $product=Product::create($inputs);
        $inputs["product_id"]=$product->id;
        $product->mobile=Mobile::create($inputs);
    }
    public function delete($id)
    {
        $product=Product::find($id)->delete();
        return $product;
    }
}
