<!DOCTYPE html>
<html lang="en">

@extends("layouts.head")
@section('title')
    Login
@endsection

@section('main_css')
    @php
        $time=time();
    @endphp
    <link rel="stylesheet" href="{{asset("loginpage/css/login.css")}}?v={{$time}}">
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
                <img src="{{asset("loginpage/images/nouser.png")}}" alt="">
            </div>
            <div class="title">
                <h3>login</h3>
                <p>You will be able to write reviews</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="login">
                @csrf
                <div class="email">
                    <input type="email" @error('email') is-invalid
                     @enderror name="email" value="{{ old('email') }}" 
                     id="email" required placeholder="email"
                     onfocus="hideErrors()">
                </div>
                <div class="error">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="password">
                    <input type="password" name="password" 
                    @error('password') is-invalid @enderror id="password"
                    required placeholder="password" onfocus="hideErrors()">
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
                <div class="submit">
                    <input type="submit" value="login">
                </div>
            </form>
            <div class="footer">
                <p>new user <a href="{{route("register")}}">Signup</a></p>
            </div>
        </div>
    </div>
    <!-- end forms -->
    @include('layouts.scripts')
    <script src="{{asset("loginpage/jquery/login.js")}}?v={{$time}}"></script>
</body>
</html>

