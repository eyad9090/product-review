<?php

namespace App\Classes\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class CommonHome extends Controller
{
    public function search(Request $request)
    {
        if($request->has("model")&&$request->model!=null)
        {
            $product=Product::where('model', 'LIKE','%'.request()->model.'%')->get();
            return $product;
        }
    }
}
