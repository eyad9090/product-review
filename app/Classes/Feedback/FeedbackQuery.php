<?php

namespace App\Classes\Feedback;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Product;
use Illuminate\Http\Request;
class FeedbackQuery extends Controller
{
    public function create()
    {
        $feedback=Feedback::create(request()->all());
        return $feedback;
    }

    public function edit($id)
    {
        $feedback=Feedback::where("id",$id)->first();
        return $feedback;
    }

    public function delete($id)
    {

        $feedback=Feedback::where("id",$id)->delete();
        return $feedback;
    }

    public function update(Request $request)
    {
        $feedback=Feedback::where("id",$request->id)->first();
        $id=$feedback->product_id;
        $product =Product::where("id",$feedback->product_id)->first();
        $type=$product->type;
        $feedback->update($request->all());
        return array($feedback,$product,$id,$type);
    }
}
