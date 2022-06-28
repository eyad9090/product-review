 <!-- start header -->
 <header id="header">
    <div class="container">
        <a class="logo">
            <img src="{{asset("logo/logo.png")}}" alt="">
        </a>
        <ul class="main-links">
            <li>
                <a href="{{route("home")}}" class="@yield("home")">
                    home
                </a>
            </li>
            <li>
                <a href="{{route("home.televisions")}}" class="@yield("televisions")">televisions</a>
            </li>
            <li>
                <a href="{{route("home.laptops")}}" class="@yield("laptops")">laptops</a>
            </li>
            <li>
                <a href="{{route("home.mobiles")}}" class="@yield("mobiles")">mobiles</a>
            </li>
            <li title="Profile">
                <a href="{{route("home.profile")}}" class="@yield("profile")">
                    <i class="fa-regular fa-user"></i>
                </a>
            </li>
            @if (Auth::user()->role=="admin")
                <li>
                    <a href="{{route("admin.products")}}">
                        <i class="fa-solid fa-gear"></i>
                        dashboard
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                logout
                {{-- <i class="fa-solid fa-arrow-right-from-bracket"></i> --}}
            </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</header>
<!-- end header -->