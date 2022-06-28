<?php

namespace App\Classes\Admin\Feedbacks;
use App\Http\Controllers\Controller;
use App\Classes\Admin\Feedbacks\Data\FeedbackData;
use App\Classes\Admin\Feedbacks\DeviceFeedback;
use App\Classes\Admin\Feedbacks\DeviceObject;
class FeedbackDetails extends Controller
{
    public FeedbackData $feedbackData;
    public DeviceObject $deviceObject;
    public DeviceFeedback $deviceFeedback;
    public function __construct()
    {
        $this->feedbackData=new FeedbackData();
        $this->deviceObject=new DeviceObject();
        $this->deviceFeedback=new DeviceFeedback();
        $this->middleware("auth");
        $this->middleware("role");
    }
    public function feedback($deviceFeedback)
    {
        $this->feedbackData->model=request()->model;
        $this->feedbackData->id=null;
        $product=$deviceFeedback->feedbackQuery($this->feedbackData);
        $check=$product->first();
        if($check==null)
        {
            return null;
        }
        $product=$product->first();
        $id=$product->product_id;

        $reviews=$this->deviceFeedback->reviewsUsers();

        $feedbacks=$this->deviceFeedback->feedbackUser($reviews,$id);

        return array($feedbacks,$product);
    }
    
    public function feedbackUser($deviceFeedback,$id)
    {
        $this->feedbackData->model=null;
        $this->feedbackData->id=$id;
        $product=$deviceFeedback->feedbackQuery($this->feedbackData);
        $check=$product->first();
        if($check==null)
        {
            return null;
        }
        $product=$product->first();
        $id=$product->product_id;

        $reviews=$this->deviceFeedback->reviewsUsers();

        $feedbacks=$this->deviceFeedback->feedbackUser($reviews,$id);

        return array($feedbacks,$product);
    }
}
