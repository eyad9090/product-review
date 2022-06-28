<?php

namespace App\Http\Controllers\Admin\Feedback;
use App\Http\Controllers\Controller;


use App\Classes\Admin\Feedbacks\Data\FeedbackData;
use App\Models\Feedback;
use App\Classes\Admin\Statistics;
use Session;
use App\Classes\Admin\Feedbacks\MobileFeedback;

class FeedbackMobileController extends Controller
{
    public Statistics $statistics;
    public FeedbackData $feedbackData;
    public MobileFeedback $mobileFeedback;
    public function __construct()
    {
        $this->statistics=new Statistics();
        $this->feedbackData=new FeedbackData();
        $this->mobileFeedback=new MobileFeedback();
        $this->middleware("auth");
        $this->middleware("role");
    }
    public function index()
    {
        Session::forget('failed');
        return view("admin.feedbacks.feedbacksMobile")
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }
    public function search()
    {
        $this->feedbackData->model=request()->model;
        $this->feedbackData->id=null;

        $product=$this->mobileFeedback->feedbackQuery($this->feedbackData);
        $check=$product->first();
        if($check==null)
        {
            session()->flash("failed");
            return view("admin.feedbacks.feedbacksMobile")
            ->with("productCount",$this->statistics->productCount)
            ->with("userCount",$this->statistics->userCount)
            ->with("feedbackCount",$this->statistics->feedbackCount)
            ->with("contributors",$this->statistics->contributors);
        }
        $product=$product->first();
        $id=$product->product_id;

        $reviews=$this->mobileFeedback->reviewsUsers();

        $feedbacks=$this->mobileFeedback->feedbackUser($reviews,$id);

        $reviewsCount=$this->mobileFeedback->reviewCount($feedbacks);
        $rating=$this->mobileFeedback->averageRating($product->product_id);
        Session::forget('failed');
        return view("admin.feedbacks.feedbacksMobile",compact("product","feedbacks"))
        ->with("rating",$rating)
        ->with("reviewsCount",$reviewsCount)
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }
}
