<?php

namespace App\Classes\Admin\Feedbacks;

use App\Models\Product;
class LaptopFeedback extends DeviceFeedback
{
    public function feedbackQuery($productData)
    {
        $product=Product::join("laptops","products.id","=","laptops.product_id");
        $product=(new FeedbackFilter)->filter($product,$productData);
        return $product;
    }
}
