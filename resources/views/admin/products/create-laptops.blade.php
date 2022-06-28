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
    <link rel="stylesheet" href="{{asset("adminpage/createlaptops/css/create.css")}}?v={{$time}}">
@endsection
<body>
        @extends('admin.layouts.sidebar')
        @section('add-products')
            active
        @endsection
        @section('add-laptops')
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
                    <h4>Create Laptop</h4>
                </div>
                <form action="{{route("admin.laptop.store")}}" method="post"
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
                        <div class="product-device product-ram product-input">
                            <label for="product-ram">ram</label>
                            <input type="number" list="rams" placeholder="ram" id="ram" name="ram" >
                            <datalist id="rams">
                                <option value="2">
                                <option value="4">
                                <option value="8">
                                <option value="16">
                                <option value="32">
                                <option value="64">
                            </datalist>
                        </div>
                        <div class="product-device product-processor product-input">
                            <label for="product-processor">processor</label>
                            <input type="text" placeholder="processor" id="product-processor" name="processor" required>
                        </div>
                        <div class="product-device product-gpu product-input">
                            <label for="product-gpu">gpu</label>
                            <input type="text" placeholder="gpu" id="product-gpu" name="gpu" required>
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