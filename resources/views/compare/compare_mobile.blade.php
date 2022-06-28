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
    <link rel="stylesheet" href="{{asset("comparepage/css/compare.css")}}?v={{$time}}">
@endsection
<body>
    @extends('home.header')
    @section('home')
        active
    @endsection
    @include('compare.layouts.search-mobile')

    @include('compare.layouts.mobile-table')

    @include('home.footer')
    @include('layouts.scripts')
    @if(session()->has('failed'))
        <script type="text/javascript">
            swal("Not found", "Make sure the category and the model are correct", "error");
        </script>
    @endif
</body>
</html>