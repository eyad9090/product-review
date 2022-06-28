<?php

namespace App\Classes\Home;

use App\Interfaces\HomeQueries;
use App\Models\Feedback;
use App\Models\Product;
use DB;
class MobileQuery extends CommonHome implements HomeQueries
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
        ->where("type","mobile")
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
        ->where("type","mobile")
        ->joinSub($rating,"rating","products.id","rating.rating_id")
        ->take(8)
        ->where("rating_average",">=",3)
        ->get();
        return $topRated;
    }
}
