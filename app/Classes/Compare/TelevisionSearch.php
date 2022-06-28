<?php

namespace App\Classes\Compare;
use App\Models\Product;
use DB;
class TelevisionSearch extends DeviceSearch
{
    public function search($model1,$model2)
    {
        $product=Product::select("products.id","products.image"
            ,"products.type","products.model",
            "products.price"
            ,DB::raw("round(IFNULL(avg(feedbacks.rating),0)) as rating")
            ,"televisions.screen_size")
            ->join("televisions","products.id","=","televisions.product_id")
            ->leftjoin("feedbacks","feedbacks.product_id","products.id")
            ->groupby("products.id",
            "products.image","products.type",
            "products.model","products.price"
            ,"televisions.screen_size")
            ->where("model","LIKE","%".$model1."%")->first();


        $product2=Product::select("products.id","products.image"
            ,"products.type","products.model",
            "products.price"
            ,DB::raw("round(IFNULL(avg(feedbacks.rating),0)) as rating")
            ,"televisions.screen_size")
            ->join("televisions","products.id","=","televisions.product_id")
            ->leftjoin("feedbacks","feedbacks.product_id","products.id")
            ->groupby("products.id",
            "products.image","products.type",
            "products.model","products.price"
            ,"televisions.screen_size")
            ->where("model","LIKE","%".$model2."%")->first();
        return array($product,$product2);
    }
}
