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
@endsection
<body>

    @extends('home.header')
    
    @include('search.layouts.search_result')
    
    @include('home.footer')
</body>

</html>