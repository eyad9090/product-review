<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;


use App\Classes\Admin\Statistics;
use App\Classes\Admin\Products\ProductQuery;
use App\Classes\Admin\Products\Data\ProductData;

class ProductController extends Controller
{
    public Statistics $statistics;
    public ProductQuery $productsQuery;
    public ProductData $productData;
    public function __construct()
    {
        $this->statistics=new Statistics();
        $this->productsQuery=new ProductQuery();
        $this->productData=new ProductData();
        $this->middleware("auth");
        $this->middleware("role");
    }
    public function index()
    {
        $products=$this->productsQuery->index();
        return view("admin.products.products",compact("products"))
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }


    public function search()
    {
        $this->productData->model=data_get(request(),"filter.model");
        $this->productData->rating=data_get(request(),"filter.rating");
        $this->productData->price=data_get(request(),"filter.price");

        $products=$this->productsQuery->search($this->productData)->appends(request()->all());
        return view("admin.products.products",compact("products"))
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }
}
