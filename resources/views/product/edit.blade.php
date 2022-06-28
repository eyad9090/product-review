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
    <link rel="stylesheet" href="{{asset("postpage/css/post.css")}}?v={{$time}}">
@endsection

<body>
    @extends('home.header')
   <!-- start body -->
   <div class="body">
        <div class="review">
            <form action="{{route("home.product.feedback.update")}}" method="post">
                @csrf
                <h3>Edit review</h3>
                <input type="hidden" name="id" value="{{$feedback->id}}">
                <div class="rate">
                    @for ($i = 5; $i >=1; $i--)
                        <input type="radio" id="{{"star".$i}}" name="rating" value="{{$i}}" 
                        {{($feedback->rating==$i)?"checked":""}}/>
                        <label for="{{"star".$i}}" title="text">
                            <i class="fa-solid fa-star"></i>
                        </label>
                    @endfor
                </div>
                <div>
                    <textarea name="feedback" id="review" placeholder="review" required>{{$feedback->feedback}}</textarea>
                </div>
                <input type="submit" value="update review">
            </form>
        </div>
    </div>
   <!-- end body -->

   @include('home.footer')

   @include('layouts.scripts')
    <script src="{{asset("postpage/jquery/post.js")}}"></script>
</body>
</html>