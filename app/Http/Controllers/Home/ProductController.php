<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Classes\Product\ProductQuery;
class ProductController extends Controller
{
    public ProductQuery $productQuery;

    public function __construct()
    {
        $this->productQuery = new ProductQuery();
        $this->middleware('auth');
    }
    public function index($id,$type)
    {
        $Data=$this->productQuery->index($id,$type);
        $product=$Data[0];
        $feedbacks=$Data[1];
        return view("product.product",compact("product","feedbacks"))
        ->with("rating",$Data[2])
        ->with("reviewsCount",$Data[3])
        ->with("isReviewed",$Data[4]);
    }
}
