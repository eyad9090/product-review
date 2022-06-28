<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Home\HomeQuery;
class HomeController extends Controller
{
    public HomeQuery $homeQuery;

    public function __construct()
    {
        $this->homeQuery = new HomeQuery();
        $this->middleware('auth');
    }

    public function index()
    {
        $rating=$this->homeQuery->productRating();

        $recentReviews=$this->homeQuery->recentReviews($rating);

        $topRated=$this->homeQuery->topRated($rating);

        $reviews=$this->homeQuery->topReviewers();
        
        return view('home',compact("recentReviews","topRated","reviews"));
    }
    public function search(Request $request)
    {
        $product = $this->homeQuery->search($request);
        return view("search.search",compact("product"));
    }
}
