<!DOCTYPE html>
<html lang="en">

@extends("layouts.head")
@section('title')
    sign up
@endsection

@section('main_css')
    @php
        $time=time();
    @endphp
    <link rel="stylesheet" href="{{asset("registerpage/css/signup.css")}}?v={{$time}}">
@endsection
<body>
    <!-- start logo -->
    <div class="logo">
        <img src="{{asset("logo/logo.png")}}" alt="doesn’t exist">
    </div>
    <!-- end logo -->
    <!-- start forms -->
    <div class="forms">
        <div class="container">
            <div class="image">
                <img src="{{asset("registerpage/images/nouser.png")}}" alt="">
            </div>
            <div class="title">
                <h3>sign up</h3>
                <p>Already a member? <a href="{{route("login")}}">login</a></p>
            </div>
            <form method="POST" action="{{ route('register') }}" class="signup" onsubmit="check(event)" data-flag="0">
                @csrf
                <div class="name">
                    <input type="text" name="name" id="name" pattern="[a-zA-Z\s]{1,}" 
                    title="only characters" required placeholder="name"
                    @error('name') is-invalid @enderror
                    onfocus="hideErrors()">
                </div>
                <div class="error">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="email">
                    <input type="email" name="email" id="email"  required
                    onfocus="hideErrors()" placeholder="email"
                    @error('email') is-invalid @enderror>
                </div>
                <div class="error">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="password">
                    <input type="password" name="password" id="password" onfocus="hideErrors()" required
                    @error('password') is-invalid @enderror
                    placeholder="password">
                    <i class="fa-solid fa-eye-slash eye1" onclick="showPassword()"></i>
                    <i class="fa-solid fa-eye eye2" onclick="showPassword()"></i>
                </div>
                <div class="error">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="password_confirmation">
                    <input type="password" name="password_confirmation" 
                    id="password_confirmation" onfocus="hideErrors()" 
                    required placeholder="confirm password">
                    <i class="fa-solid fa-eye-slash eye1 eye4" onclick="showPassword()"></i>
                    <i class="fa-solid fa-eye eye2 eye4" onclick="showPassword()"></i>
                    <p id="wrong">does not match</p>
                </div>
                <div class="submit">
                    <input type="submit" value="sign up">
                </div>
            </form>
        </div>
    </div>
    <!-- end forms -->
    @include('layouts.scripts')
    <script src="{{asset("registerpage/jquery/signup.js")}}?v={{$time}}"></script>
</body>
</html>




{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <input type="hidden" class="form-control" name="role"  value="user">

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
