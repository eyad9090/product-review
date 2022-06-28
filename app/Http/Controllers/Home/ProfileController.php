<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Classes\Profile\ProfileQuery;
use App\Classes\Profile\Validation\ProfileValidation;
class ProfileController extends Controller
{
    public ProfileQuery $profileQuery;
    public ProfileValidation $profileValidation;
    public function __construct()
    {
        $this->profileQuery = new ProfileQuery();
        $this->profileValidation= new ProfileValidation();
        $this->middleware('auth');
    }
    public function index()
    {
        $reviewsCount=$this->profileQuery->index(Auth::user()->id);
        return view("profile.profile",compact("reviewsCount"));
    }
    public function update(Request $request)
    {
        $validated=$this->profileValidation->validate($request);
        if(!$validated)
        {
            session()->flash("fails-update");
            return redirect()->back()->withInput();
        }
        $this->profileQuery->update($request);
        session()->flash("success-update");
        return redirect()->back()
        ->withInput();
    }
}
