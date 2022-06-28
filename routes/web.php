<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::group(["namespace"=>"Home"],function(){
    //------home and search
    Route::get('/home', "HomeController@index")
    ->name('home');

    Route::get("home/search","HomeController@search")
    ->name("home.search");

    Route::get("home/laptops","LaptopController@index")
    ->name("home.laptops");

    Route::get("home/laptop/search","LaptopController@search")
    ->name("laptop.search");

    Route::get("home/televisions","TelevisionController@index")
    ->name("home.televisions");

    Route::get("home/television/search","TelevisionController@search")
    ->name("television.search");

    Route::get("home/mobiles","MobileController@index")
    ->name("home.mobiles");

    Route::get("home/mobile/search","MobileController@search")
    ->name("mobile.search");

    //----profile
    Route::get("home/profile","ProfileController@index")
    ->name("home.profile");

    Route::post("home/profile/update","ProfileController@update")
    ->name("home.profile.update");

    //--product
    Route::get("home/product/{id}/{type}","ProductController@index")
    ->name("home.product");

    //--product feedback
    Route::get("home/product/feedback","FeedbackController@create")
    ->name("home.product.feedback.create");

    Route::get("home/product/feedback/edit/{id}","FeedbackController@edit")
    ->name("home.product.feedback.edit");

    Route::post("home/product/feedback/delete/{id}","FeedbackController@delete")
    ->name("home.product.feedback.delete");

    Route::post("home/product/feedback/update","FeedbackController@update")
    ->name("home.product.feedback.update");


    //-----compare-laptop
    Route::get("home/compare/laptops","CompareLaptopController@index")
    ->name("home.compare.laptops");

    Route::get("home/compare/laptops/search","CompareLaptopController@search")
    ->name("home.compare.laptop.search");
     //-----compare-television
     Route::get("home/compare/televisions","CompareTelevisionController@index")
     ->name("home.compare.televisions");
 
     Route::get("home/compare/televisions/search","CompareTelevisionController@search")
     ->name("home.compare.television.search");
      //-----compare-television
    Route::get("home/compare/mobiles","CompareMobileController@index")
    ->name("home.compare.mobiles");

    Route::get("home/compare/mobiles/search","CompareMobileController@search")
    ->name("home.compare.mobile.search");
});




//--admin--producst-----------------


Route::group(["namespace"=>"Admin\Products"],function(){
    //--all
    Route::get("admin/products","ProductController@index")
    ->name("admin.products");

    Route::get("admin/product/search","ProductController@search")
    ->name("admin.product.search");

    //--laptops
    Route::get("admin/laptops","LaptopController@index")
    ->name("admin.laptops");
    
    Route::get("admin/laptops/search","LaptopController@search")
    ->name("admin.laptop.search");

    Route::post("admin/laptops/update","LaptopController@update")
    ->name("admin.laptop.update");

    Route::post("admin/laptops/delete/{id}","LaptopController@destroy")
    ->name("admin.laptop.destroy");

    Route::get("admin/laptops/create","LaptopController@create")
    ->name("admin.laptop.create");

    Route::post("admin/laptops/store","LaptopController@store")
    ->name("admin.laptop.store");

    //--televisions
    Route::get("admin/televisions","TelevisionController@index")
    ->name("admin.televisions");
    
    Route::get("admin/televisions/search","TelevisionController@search")
    ->name("admin.television.search");

    Route::post("admin/televisions/update","TelevisionController@update")
    ->name("admin.television.update");

    Route::post("admin/televisions/delete/{id}","TelevisionController@destroy")
    ->name("admin.television.destroy");

    Route::get("admin/televisions/create","TelevisionController@create")
    ->name("admin.television.create");

    Route::post("admin/televisions/store","TelevisionController@store")
    ->name("admin.television.store");

    //--mobiles
    Route::get("admin/mobiles","MobileController@index")
    ->name("admin.mobiles");
    
    Route::get("admin/mobiles/search","MobileController@search")
    ->name("admin.mobile.search");

    Route::post("admin/mobiles/update","MobileController@update")
    ->name("admin.mobile.update");

    Route::post("admin/mobiles/delete/{id}","MobileController@destroy")
    ->name("admin.mobile.destroy");

    Route::get("admin/mobiles/create","MobileController@create")
    ->name("admin.mobile.create");

    Route::post("admin/mobiles/store","MobileController@store")
    ->name("admin.mobile.store");
});




//----admin-customers
Route::group(["namespace"=>"Admin\Customers"],function(){
    Route::get("admin/customers/index","CustomerController@index")
    ->name("admin.customers");

    Route::get("admin/customers/search","CustomerController@search")
    ->name("admin.customers.search");

    Route::post("admin/customers/update","CustomerController@update")
    ->name("admin.customer.update");

    Route::post("admin/customer/destroy/{id}","CustomerController@destroy")
    ->name("admin.customer.destroy");
});


//----admin-feedbacks
Route::group(["namespace"=>"Admin\Feedback"],function() {

    //------feedback-laptop----------------
    Route::get("admin/laptop/feedbacks","FeedbackLaptopController@index")
    ->name("admin.feedbacks.laptop");

    Route::get("admin/feedbacks/laptop/search","FeedbackLaptopController@search")
    ->name("admin.feedback.laptop.search");

    //-----feedback-mobile---------------
    Route::get("admin/mobile/feedbacks","FeedbackMobileController@index")
    ->name("admin.feedbacks.mobile");

    Route::get("admin/mobile/feedbacks/search","FeedbackMobileController@search")
    ->name("admin.feedback.mobile.search");

    //-----feedback television
    Route::get("admin/television/feedbacks","FeedbackTelevisionController@index")
    ->name("admin.feedbacks.television");

    Route::get("admin/television/feedbacks/search","FeedbackTelevisionController@search")
    ->name("admin.feedback.television.search");

    //------destroy
    Route::post("admin/feedback/destroy/{id}","FeedbackController@destroy")
    ->name("admin.feedback.destroy");

});

