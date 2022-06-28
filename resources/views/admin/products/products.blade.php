<!DOCTYPE html>
<html lang="en">
@extends("layouts.head")
@section('title')
    admin products
@endsection
@section('main_css')
    @php
        $time=time();
    @endphp
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("adminpage/admin.css")}}?v={{$time}}">
    <link rel="stylesheet" href="{{asset("adminpage/products/css/products.css")}}?v={{$time}}">
@endsection
<body>
        @extends('admin.layouts.sidebar')
        @section('products')
            active
        @endsection
        @section('all')
            active
        @endsection
        <div class="main-content">
            @include('admin.layouts.header')
            <main>
                @include('admin.layouts.cards')
                <div class="table-container">
                    <!-- table heaer -->
                    @include('admin.layouts.products.table_products_header')
                    <!-- end table header -->
                    <!-- table -->
                    <h3 class="table-name header"></h3>
                    <div class="responsive-table">
                        @include("admin.layouts.products.table_products")
                    </div>
                    <!-- end table -->
                    <div class="links-pagination">
                        {!! $products->links()!!}
                    </div>
                </div>
            </main>
        </div>
    @include('layouts.scripts')
    <script src="{{asset("adminpage/products.js")}}?v={{$time}}"></script>
    @if (count($errors)>0)
        <script>
                window.addEventListener('load', function () {
                    var type=document.getElementById("product-type").value;
                    chooseFooter(type);
                    var sample = document.getElementById("table-footer");
                    sample.style.display = 'block';
                    document.getElementById("model-container").style.marginTop = "25px";
                    // document.getElementById("types-container").style.marginTop="25px";
                })
        </script>
    @endif
    @if(session()->has('success'))
        <script type="text/javascript">
            swal("Good job!", "You record has been updated", "success");
        </script>
    @endif
</body>
</html>