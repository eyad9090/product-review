<?php

namespace App\Classes\Admin\Feedbacks;
use App\Models\Feedback;
use DB;
use Auth;
class DeviceFeedback
{
    public function reviewsUsers()
    {
        $reviews=Feedback::select("feedbacks.user_id as reviewId",DB::raw('count(feedbacks.user_id) as reviews'))
         ->join("users","feedbacks.user_id","users.id")
         ->groupby("feedbacks.user_id")
         ->toSql();
         return $reviews;
    }
    public function feedbackUser($reviews,$id){
        $feedbacks=Feedback::where("feedbacks.product_id",$id)
         ->select("feedbacks.id","feedbacks.user_id","users.image","users.name","feedbacks.feedback","feedbacks.rating","feedbacks.created_at","newTable.reviews")
         ->join("users","feedbacks.user_id","users.id")
         ->joinSub($reviews,"newTable","newTable.reviewId","feedbacks.user_id")
         ->orderByRaw('FIELD(users.id,'.Auth::user()->id.')DESC')
         ->get();
         return $feedbacks;
    }
    public function reviewCount($feedbacks)
    {
        return $feedbacks->count();
    }

    public function averageRating($id)
    {
        $rating=Feedback::where("feedbacks.product_id",$id)
        ->select("feedbacks.product_id",DB::raw("round(IFNULL(avg(feedbacks.rating),0)) as rating_average"))
        ->groupby("feedbacks.product_id")
        ->first();
        if($rating==null)
         {
             $rating = new Feedback(['product_id' => $id]);
             $rating->rating_average=0;
         }
        return $rating;
    }
    public function reviewCustomer($id)
    {
        $ReviewedCustomer=Feedback::where("user_id",Auth::user()->id)
        ->where("product_id",$id)
        ->get()
        ->count();
        
        return $ReviewedCustomer;
    }
}
