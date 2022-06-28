<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Home\MobileQuery;
class MobileController extends Controller
{
    public MobileQuery $mobileQuery;

    public function __construct()
    {
        $this->mobileQuery = new MobileQuery();
        $this->middleware('auth');
    }


    public function index()
    {
        $rating=$this->mobileQuery->productRating();

        $recentReviews=$this->mobileQuery->recentReviews($rating);

        $topRated=$this->mobileQuery->topRated($rating);

        return view('Products.mobiles',compact("recentReviews","topRated"));
    }
    public function search(Request $request)
    {
        $product = $this->mobileQuery->search($request);
        return view("search.search",compact("product"));
    }
}
