<?php

namespace App\Http\Controllers\Admin\Feedback;
use App\Http\Controllers\Controller;


use App\Classes\Admin\Feedbacks\Data\FeedbackData;
use App\Models\Feedback;
use App\Classes\Admin\Statistics;
use Session;
use App\Classes\Admin\Feedbacks\LaptopFeedback;

class FeedbackLaptopController extends Controller
{
    public Statistics $statistics;
    public FeedbackData $feedbackData;
    public LaptopFeedback $laptopFeedback;
    public function __construct()
    {
        $this->statistics=new Statistics();
        $this->feedbackData=new FeedbackData();
        $this->laptopFeedback=new LaptopFeedback();
        $this->middleware("auth");
        $this->middleware("role");
    }
    public function index()
    {
        Session::forget('failed');
        return view("admin.feedbacks.feedbacksLaptop")
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }
    public function search()
    {
        $this->feedbackData->model=request()->model;
        $this->feedbackData->id=null;

        $product=$this->laptopFeedback->feedbackQuery($this->feedbackData);
        $check=$product->first();
        if($check==null)
        {
            session()->flash("failed");
            return view("admin.feedbacks.feedbacksLaptop")
            ->with("productCount",$this->statistics->productCount)
            ->with("userCount",$this->statistics->userCount)
            ->with("feedbackCount",$this->statistics->feedbackCount)
            ->with("contributors",$this->statistics->contributors);
        }
        $product=$product->first();
        $id=$product->product_id;

        $reviews=$this->laptopFeedback->reviewsUsers();

        $feedbacks=$this->laptopFeedback->feedbackUser($reviews,$id);

        $reviewsCount=$this->laptopFeedback->reviewCount($feedbacks);
        $rating=$this->laptopFeedback->averageRating($product->product_id);
        Session::forget('failed');
        return view("admin.feedbacks.feedbacksLaptop",compact("product","feedbacks"))
        ->with("rating",$rating)
        ->with("reviewsCount",$reviewsCount)
        ->with("productCount",$this->statistics->productCount)
        ->with("userCount",$this->statistics->userCount)
        ->with("feedbackCount",$this->statistics->feedbackCount)
        ->with("contributors",$this->statistics->contributors);
    }
}
