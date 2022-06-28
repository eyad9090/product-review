<?php

namespace App\Classes\Admin\Feedbacks;

use App\Models\Product;

class TelevisionFeedback extends DeviceFeedback
{
    public function feedbackQuery($productData)
    {
        $product=Product::join("televisions","products.id","=","televisions.product_id");
        $product=(new FeedbackFilter)->filter($product,$productData);
        return $product;
    }
}
