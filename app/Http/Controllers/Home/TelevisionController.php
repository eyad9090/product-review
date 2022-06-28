<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Classes\Home\TelevisionQuery;
class TelevisionController extends Controller
{
    public TelevisionQuery $televisionQuery;

    public function __construct()
    {
        $this->televisionQuery = new TelevisionQuery();
        $this->middleware('auth');
    }


    public function index()
    {
        $rating=$this->televisionQuery->productRating();

        $recentReviews=$this->televisionQuery->recentReviews($rating);

        $topRated=$this->televisionQuery->topRated($rating);

        return view('Products.televisions',compact("recentReviews","topRated"));
    }
    public function search(Request $request)
    {
        $product = $this->televisionQuery->search($request);
        return view("search.search",compact("product"));
    }
}
