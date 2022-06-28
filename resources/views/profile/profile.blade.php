<!DOCTYPE html>
<html lang="en">
@extends("layouts.head")
@section('title')
    profile
@endsection
@section('main_css')
    @php
        $time=time();
    @endphp
    <link rel="stylesheet" href="{{asset("css/home.css")}}?v={{$time}}">
    <link rel="stylesheet" href="{{asset("profilepage/css/profile.css")}}?v={{$time}}">
@endsection
<body>
    @extends('home.header')
    @section('profile')
        active
    @endsection
    
    <!-- start profile -->
    @include('profile.layouts.profile_form')
    <!-- end profile -->
    @include('home.footer')
    @include('layouts.scripts')
    <link rel="stylesheet" href="{{asset("css/home.css")}}?v={{$time}}">
    <script src="{{asset("profilepage/jquery/profile.js")}}?v={{$time}}"></script>

    @include("check")
</body>
</html>