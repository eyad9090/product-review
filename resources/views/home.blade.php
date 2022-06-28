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
    <link rel="stylesheet" href="{{asset("css/products.css")}}?v={{$time}}">
    <link rel="stylesheet" href="{{asset("homepage/css/Home.css")}}?v={{$time}}">
@endsection
<body>

    @extends('home.header')
    @section('home')
        active
    @endsection

    @include('home.landing_home')
    
    @include('home.recent_reviews')


    @include('home.top_rated')
    
    @include('home.top_reviewers')
    
    @include('home.footer')
</body>

</html>