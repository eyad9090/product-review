<?php

namespace App\Classes\Admin\Products;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductsQueries;

use App\Models\Product;
use App\Models\Television;
use DB;

class TelevisionQuery extends Controller implements ProductsQueries
{
    public function index() {
        $products=Product::select("products.id",
        "products.image","products.type",
        "products.model","products.price",
        DB::raw("round(IFNULL(avg(feedbacks.rating),0)) as rating"),
        "televisions.screen_size")
        ->join("televisions","products.id","=","televisions.product_id")
        ->leftjoin("feedbacks","feedbacks.product_id","products.id")
        ->groupby("products.id","products.image",
            "products.type","products.model","products.price",
            "televisions.screen_size")->paginate(4);
        return $products;
    }
    public function search($productData){
        $products=Product::select("products.id",
        "products.image","products.type",
        "products.model","products.price",
        DB::raw("round(IFNULL(avg(feedbacks.rating),0)) as rating"),
        "televisions.screen_size")
        ->join("televisions","products.id","=","televisions.product_id")
        ->leftjoin("feedbacks","feedbacks.product_id","products.id")
        ->groupby("products.id","products.image",
            "products.type","products.model","products.price",
            "televisions.screen_size");
        
       $products=(new TelevisionFilter)->filter($products,$productData);
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
        $inputs["type"]="television";
        $product=Product::create($inputs);
        $inputs["product_id"]=$product->id;
        $product->television=Television::create($inputs);
    }
    public function delete($id)
    {
        $product=Product::find($id)->delete();
        return $product;
    }
}
