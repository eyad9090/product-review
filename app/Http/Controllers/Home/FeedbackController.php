<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Feedback\FeedbackQuery;
class FeedbackController extends Controller
{
    public FeedbackQuery $feedbackQuery;

    public function __construct()
    {
        $this->feedbackQuery = new FeedbackQuery();
        $this->middleware('auth');
    }
    public function create()
    {
        $feedback=$this->feedbackQuery->create();
        return redirect()->back();
    }

    public function edit($id)
    {
        $feedback=$this->feedbackQuery->edit($id);
        return view("product.edit",compact("feedback"));
    }

    public function delete($id)
    {

        $feedback=$this->feedbackQuery->delete($id);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $Data=$this->feedbackQuery->update($request);
        $feedback=$Data[0];
        $product =$Data[1];
        return redirect()->route("home.product",["id"=>$Data[2],"type"=>$Data[3]]);
    }
}
