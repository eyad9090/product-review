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
    <link rel="stylesheet" href="{{asset("adminpage/customers/css/customers.css")}}?v={{$time}}">
@endsection
<body>
    @extends('admin.layouts.sidebar')
        @section('customers')
            active
        @endsection
        <div class="main-content">
            @include('admin.layouts.header')
            <main>
                @include('admin.layouts.cards')
                <div class="table-container">
                    @include("admin.layouts.customers.search")
                    <!-- table -->
                    @include("admin.layouts.customers.customers_table")
                    <!-- end table -->
                    @include("admin.layouts.customers.edit")
                </div>
            </main>
        </div>
    @include('layouts.scripts')
    <script src="{{asset("adminpage/customers/jquery/customers.js")}}?v={{$time}}"></script>
    @include("admin.customers.check")
</body>
</html>