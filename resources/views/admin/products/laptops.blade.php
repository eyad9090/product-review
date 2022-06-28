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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("adminpage/admin.css")}}?v={{$time}}">
    <link rel="stylesheet" href="{{asset("adminpage/laptops/css/laptops.css")}}?v={{$time}}">
@endsection
<body>
        @extends('admin.layouts.sidebar')
        @section('products')
            active
        @endsection
        @section('laptops')
            active
        @endsection
        <div class="main-content">
            @include('admin.layouts.header')
            <main>
                @include('admin.layouts.cards')
                <div class="table-container">
                    <!-- table heaer -->
                    @include('admin.layouts.products.table_laptops_header')
                    <!-- end table header -->
                    <!-- table -->
                    <h3 class="table-name header"></h3>
                    <div class="responsive-table">
                        @include("admin.layouts.products.table_laptops")
                    </div>
                    <div class="links-pagination">
                        {!! $products->links()!!}
                    </div>
                    <!-- end table -->
                    {{-- table footer --}}
                    @include("admin.layouts.products.table_laptops_footer")
                    {{-- end table footer --}}
                </div>
            </main>
        </div>
    @include('layouts.scripts')
    @include("admin.products.scripts")
    @include("admin.products.check")
    <script src="{{asset("adminpage/laptops/jquery/laptops.js")}}?v={{$time}}"></script>
</body>
</html>