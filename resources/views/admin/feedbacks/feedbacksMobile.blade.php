<!DOCTYPE html>
<html lang="en">
@extends("layouts.head")
@section('title')
    admin add products
@endsection
@section('main_css')
    @php
        $time=time();
    @endphp
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("adminpage/admin.css")}}?v={{$time}}">
    <link rel="stylesheet" href="{{asset("adminpage/feedbacks/css/feedback.css")}}?v={{$time}}">
@endsection
<body>
    @extends('admin.layouts.sidebar')
        @section('feedback')
            active
        @endsection
        @section('feedback-mobile')
            active
        @endsection
        <div class="main-content">
            @include('admin.layouts.header')
            <main>
                @include('admin.layouts.cards')
                <div class="body">
                    @include('admin.layouts.feedbacks.searchMobile')
                    @include('admin.layouts.feedbacks.product')
                    @include('admin.layouts.feedbacks.reviews')
                </div>
            </main>
        </div>
    @include('layouts.scripts')
    <script src="{{asset("adminpage/feedbacks/jquery/feedback.js")}}?v={{$time}}"></script>
    @if(session()->has('failed'))
        <script type="text/javascript">
            swal("Not found", "Make sure the category and the model are correct", "error");
        </script>
    @endif
</body>
</html>