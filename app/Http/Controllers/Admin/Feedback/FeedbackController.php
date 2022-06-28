<?php

namespace App\Http\Controllers\Admin\Feedback;
use App\Http\Controllers\Controller;


use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function destroy($id)
    {
        $feedback=Feedback::find($id)->delete();
        return redirect()->back();
    }
}
