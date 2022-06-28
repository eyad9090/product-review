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
    <link rel="stylesheet" href="{{asset("adminpage/admin.css")}}?v={{$time}}">
    <link rel="stylesheet" href="{{asset("adminpage/createtelevision/css/create.css")}}?v={{$time}}">
@endsection
<body>
        @extends('admin.layouts.sidebar')
        @section('add-products')
            active
        @endsection

        @section('add-televisions')
            active
        @endsection
        <div class="main-content">
            @include('admin.layouts.header')
            <main>
                @include('admin.layouts.cards')
            </main>
             <!-- start Add form -->
             <div class="table-add">
                <div class="header">
                    <h4>Create Television</h4>
                </div>
                <form action="{{route("admin.television.store")}}" method="post"
                enctype="multipart/form-data">
                @csrf
                    <div class="inputs">
                        <div class="product-image">
                            <label for="product-image">image</label>
                            <input type="file" id="product-image" name="image" required>
                        </div>
                        <div class="product-model">
                            <label for="product-model">model</label>
                            <input type="text" placeholder="model" id="product-model" name="model" required>
                        </div>
                        <div class="product-price">
                            <label for="product-price">price</label>
                            <input type="number" placeholder="price" id="product-price" name="price" required min="1000" max="50000" step="500">
                        </div>
                        <div class="product-tv product-input product-input">
                            <label for="product-screen-size">screen size</label>
                            <input type="number" list="screen_sizes" placeholder="screen size" id="product-screen-size" name="screen_size" required>
                            <datalist id="screen_sizes">
                                <option value="32">
                                <option value="40">
                                <option value="43">
                                <option value="50">
                                <option value="55">
                                <option value="60">
                                <option value="65">
                                <option value="70">
                                <option value="75">
                                <option value="80">
                                <option value="85">
                            </datalist>
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="add product">
                    </div>
                </form>
            </div>
            <!-- end Add form -->
        </div>
        @include('layouts.scripts')
        @include("admin.products.check")
</body>
</html>