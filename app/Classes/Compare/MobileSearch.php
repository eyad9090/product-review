<?php

namespace App\Classes\Compare;
use App\Models\Product;
use DB;
class MobileSearch extends DeviceSearch
{
    public function search($model1,$model2)
    {
        $product=Product::select("products.id","products.image"
            ,"products.type","products.model",
            "products.price"
            ,DB::raw("round(IFNULL(avg(feedbacks.rating),0)) as rating")
            ,"mobiles.ram","mobiles.camera")
            ->join("mobiles","products.id","=","mobiles.product_id")
            ->leftjoin("feedbacks","feedbacks.product_id","products.id")
            ->groupby("products.id",
            "products.image","products.type",
            "products.model","products.price"
            ,"mobiles.ram","mobiles.camera")
            ->where("model","LIKE","%".$model1."%")->first();


        $product2=Product::select("products.id","products.image"
            ,"products.type","products.model",
            "products.price"
            ,DB::raw("round(IFNULL(avg(feedbacks.rating),0)) as rating")
            ,"mobiles.ram","mobiles.camera")
            ->join("mobiles","products.id","=","mobiles.product_id")
            ->leftjoin("feedbacks","feedbacks.product_id","products.id")
            ->groupby("products.id",
            "products.image","products.type",
            "products.model","products.price"
            ,"mobiles.ram","mobiles.camera")
            ->where("model","LIKE","%".$model2."%")->first();
        
        return array($product,$product2);
    }
}
