<?php

namespace App\Classes\Product;

use App\Http\Controllers\Controller;
use App\Classes\Admin\Feedbacks\DeviceObject;
use App\Classes\Admin\Feedbacks\DeviceFeedback;
use App\Classes\Admin\Feedbacks\FeedbackDetails;
class ProductQuery extends Controller
{
    public DeviceObject $deviceObject;
    public DeviceFeedback $deviceFeedback;
    public function __construct()
    {
        $this->deviceObject=new DeviceObject();
        $this->deviceFeedback=new DeviceFeedback();
        $this->middleware("auth");
        $this->middleware("role");
    }
    public function index($id,$type)
    {
        $this->deviceFeedback=$this->deviceObject->getType($type);
        $Data=(new FeedbackDetails)->feedbackUser($this->deviceFeedback,$id);
        if($Data==null)
        {
            session()->flash("failed");
            return view("admin.feedbacks.feedbacks")
            ->with("productCount",$this->statistics->productCount)
            ->with("userCount",$this->statistics->userCount)
            ->with("feedbackCount",$this->statistics->feedbackCount)
            ->with("contributors",$this->statistics->contributors);
        }
        $feedbacks=$Data[0];
        $product=$Data[1];
        $reviewsCount=$this->deviceFeedback->reviewCount($feedbacks);
        $rating=$this->deviceFeedback->averageRating($product->product_id);
        $isReviewed=$this->deviceFeedback->reviewCustomer($product->product_id);
        return array($product,$feedbacks,$rating,$reviewsCount,$isReviewed);
    }
}
