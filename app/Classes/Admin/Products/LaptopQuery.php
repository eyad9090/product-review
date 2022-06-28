<?php

namespace App\Classes\Admin\Products;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductsQueries;

use App\Models\Product;
use App\Models\Laptop;
use DB;

class LaptopQuery extends Controller implements ProductsQueries
{
    public function index() {
        $products=Product::select("products.id",
        "products.image","products.type",
        "products.model","products.price",
        DB::raw("round(IFNULL(avg(feedbacks.rating),0)) as rating"),
        "laptops.ram","laptops.processor","laptops.gpu")
        ->join("laptops","products.id","=","laptops.product_id")
        ->leftjoin("feedbacks","feedbacks.product_id","products.id")
        ->groupby("products.id","products.image",
        "products.type","products.model",
        "products.price","laptops.ram",
        "laptops.processor","laptops.gpu")->paginate(4);
        return $products;
    }
    public function search($productData){
        $products=Product::select("products.id",
        "products.image","products.type",
        "products.model","products.price",
        DB::raw("round(IFNULL(avg(feedbacks.rating),0)) as rating"),
        "laptops.ram","laptops.processor","laptops.gpu")
        ->join("laptops","products.id","=","laptops.product_id")
       ->leftjoin("feedbacks","feedbacks.product_id","products.id")
       ->groupby("products.id","products.image",
        "products.type","products.model",
        "products.price","laptops.ram",
        "laptops.processor","laptops.gpu");
        
       $products=(new LaptopFilter)->filter($products,$productData);
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
        $inputs["type"]="laptop";
        $product=Product::create($inputs);
        $inputs["product_id"]=$product->id;
        $product->laptop=Laptop::create($inputs);
    }
    public function delete($id)
    {
        $product=Product::find($id)->delete();
        return $product;
    }
}
