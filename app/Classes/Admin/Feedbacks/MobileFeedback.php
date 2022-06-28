<?php

namespace App\Classes\Admin\Feedbacks;
use App\Models\Product;
class MobileFeedback extends DeviceFeedback
{
    public function feedbackQuery($productData)
    {
        $product=Product::join("mobiles","products.id","=","mobiles.product_id");
        $product=(new FeedbackFilter)->filter($product,$productData);
        return $product;
    }
}
