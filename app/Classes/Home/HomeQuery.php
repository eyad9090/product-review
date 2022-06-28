<?php

namespace App\Classes\Home;

use App\Interfaces\HomeQueries;
use App\Models\Product;
use App\Models\Feedback;
use DB;
class HomeQuery extends CommonHome implements HomeQueries
{
    public function productRating()
    {
        $rating=Feedback::select("feedbacks.product_id as rating_id",
        DB::raw('avg(feedbacks.rating) as rating_average'))
        ->groupby("feedbacks.product_id")
        ->toSql();
        return $rating;
    }
    public function recentReviews($rating)
    {
        $recentReviews=Product::latest()
        ->leftjoinSub($rating,"rating","products.id","rating.rating_id")
        ->take(8)
        ->get();
        foreach($recentReviews as $item)
        {
            if($item->rating_average==null)
            {
                $item->rating_average=0;
            }
        }
        return $recentReviews;
    }
    public function topRated($rating)
    {
        $topRated=Product::latest()
        ->joinSub($rating,"rating","products.id","rating.rating_id")
        ->take(8)
        ->where("rating_average",">=",3)
        ->get();
        return $topRated;
    }
    public function topReviewers()
    {
        $reviews=Feedback::select("users.id","users.name","users.image",DB::raw('count(feedbacks.user_id) as reviews'))
        ->join("users","feedbacks.user_id","users.id")
        ->groupby("users.id","users.name","users.image")
        ->orderby("reviews","DESC")
        ->take(6)
        ->get();
        return $reviews;
    }
}
