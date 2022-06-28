<?php

namespace App\Classes\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Feedback;
use App\Models\Product;
use App\Models\User;

class Statistics extends Controller
{
    public int $productCount;
    public int $userCount;
    public int $feedbackCount;
    public int $contributors;
    public function __construct()
    {
        $this->productCount=Product::count();
        $this->userCount=User::count();
        $this->feedbackCount=Feedback::count();
        $this->contributors=User::where("feedbacks.rating",">=",4)
        ->select("feedbacks.user_id")
        ->join("feedbacks","users.id","feedbacks.user_id")
        ->count();
    }
}
