<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Home\LaptopQuery;
class LaptopController extends Controller
{
    public LaptopQuery $laptopQuery;

    public function __construct()
    {
        $this->laptopQuery = new LaptopQuery();
        $this->middleware('auth');
    }


    public function index()
    {
        $rating=$this->laptopQuery->productRating();

        $recentReviews=$this->laptopQuery->recentReviews($rating);

        $topRated=$this->laptopQuery->topRated($rating);

        return view('Products.laptops',compact("recentReviews","topRated"));
    }
    public function search(Request $request)
    {
        $product = $this->laptopQuery->search($request);
        return view("search.search",compact("product"));
    }
}
