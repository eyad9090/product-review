<!DOCTYPE html>
<html lang="en">
@extends("layouts.head")
@section('title')
    Home
@endsection
@section('main_css')
    @php
        $time=time();
    @endphp
    <link rel="stylesheet" href="{{asset("css/home.css")}}?v={{$time}}">
    <link rel="stylesheet" href="{{asset("productpage/css/product.css")}}?v={{$time}}">
@endsection

<body>
    @extends('home.header')
   <!-- start body -->
   <div class="body">
        @include('product.layouts.product_details')
        @include('product.layouts.feedbacks')
        @include('product.layouts.create_review')
    </div>
   <!-- end body -->

   @include('home.footer')

   @include('layouts.scripts')
    <script src="{{asset("productpage/jquery/product.js")}}?v={{$time}}"></script>
</body>
</html>