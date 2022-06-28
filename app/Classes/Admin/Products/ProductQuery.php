<?php

namespace App\Classes\Admin\Products;

use App\Http\Controllers\Controller;
use App\Interfaces\GeneralQueries;

use App\Models\Product;
use DB;

class ProductQuery extends Controller implements GeneralQueries
{
    public function index() {
        $products=Product::select("products.id","products.image",
        "products.type","products.model",
        "products.price",
        DB::raw("concat(
            IFNULL(concat(televisions.screen_size,'inch '),''),
            IFNULL(concat(laptops.ram,'GB '),''),
            IFNULL(concat(laptops.processor,'-'),''),
            IFNULL(concat(laptops.gpu,'-'),''),
            IFNULL(concat(mobiles.camera,'megapixel '),''),
            IFNULL(concat(mobiles.ram,'GB'),'')
        ) as description"),
        DB::raw("round(IFNULL(avg(feedbacks.rating),0)) as rating"))
        ->leftjoin("laptops","laptops.product_id","products.id")
        ->leftjoin("mobiles","mobiles.product_id","products.id")
        ->leftjoin("televisions","televisions.product_id","products.id")
        ->leftjoin("feedbacks","feedbacks.product_id","products.id")
        ->groupby("products.id","products.image",
        "products.type",
        "products.model","products.price",
        "laptops.ram","laptops.processor","laptops.gpu",
        "mobiles.ram","mobiles.camera",
        "televisions.screen_size")
        // ->get();
        ->paginate(4);
        // ->toSql();
        return $products;
    }
    public function search($productData){
    $products=Product::select("products.id","products.image",
        "products.type","products.model",
        "products.price",
        DB::raw("concat(
            IFNULL(concat(televisions.screen_size,'inch '),''),
            IFNULL(concat(laptops.ram,'GB '),''),
            IFNULL(concat(laptops.processor,'-'),''),
            IFNULL(concat(laptops.gpu,'-'),''),
            IFNULL(concat(mobiles.camera,'megapixel '),''),
            IFNULL(concat(mobiles.ram,'GB'),'')
        ) as description"),
        DB::raw("round(IFNULL(avg(feedbacks.rating),0)) as rating"))
        ->leftjoin("laptops","laptops.product_id","products.id")
        ->leftjoin("mobiles","mobiles.product_id","products.id")
        ->leftjoin("televisions","televisions.product_id","products.id")
        ->leftjoin("feedbacks","feedbacks.product_id","products.id")
        ->groupby("products.id","products.image",
        "products.type",
        "products.model","products.price",
        "laptops.ram","laptops.processor","laptops.gpu",
        "mobiles.ram","mobiles.camera",
        "televisions.screen_size");
       
       $products=(new ProductFilter)->filter($products,$productData);
       $products=$products->paginate(4);
       return $products;
    }
}
