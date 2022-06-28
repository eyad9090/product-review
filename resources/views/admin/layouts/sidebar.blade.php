<input type="checkbox" id="nav-toggle">
<div class="sidebar">
    <div class="sidebar-brand">
        <h2><i class="fa-solid fa-star"></i><span>five-star</span></h2>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <span class="@yield("products")"><i class="fa-solid fa-user-plus"></i>
                    products</span>
                <div class="mega-menu">
                    <a href="{{route("admin.products")}}" class="@yield("all")">all</a>
                    <a href="{{route("admin.laptops")}}" class="@yield("laptops")">laptops</a>
                   <a href="{{route("admin.televisions")}}" class="@yield("televisions")">television</a>
                   <a href="{{route("admin.mobiles")}}" class="@yield("mobiles")">mobile</a>
                </div>
            </li>
            <li>
                <span class="@yield("add-products")"><i class="fa-solid fa-user-plus"></i>
                    Create Products</span>
                <div class="mega-menu">
                    <a href="{{route("admin.laptop.create")}}" class="@yield("add-laptops")">laptops</a>
                   <a href="{{route("admin.television.create")}}" class="@yield("add-televisions")">television</a>
                   <a href="{{route("admin.mobile.create")}}" class="@yield("add-mobiles")">mobile</a>
                </div>
            </li>

            <li>
                <a href="{{route("admin.customers")}}" class="@yield("customers")"><i class="fa-solid fa-users"></i>
                    <span>Customers</span></a>
            </li>
            <li>
                <span class="@yield("feedback")"><i class="fa-solid fa-user-plus"></i>
                    feedback</span>
                <div class="mega-menu">
                    <a href="{{route("admin.feedbacks.laptop")}}" class="@yield("feedback-laptop")">laptops</a>
                    <a href="{{route("admin.feedbacks.mobile")}}" class="@yield("feedback-mobile")">mobiles</a>
                    <a href="{{route("admin.feedbacks.television")}}" class="@yield("feedback-television")">television</a>
                </div>
            </li>
            <li>
                <a href="{{route("home")}}"><i class="fa-solid fa-clipboard"></i>
                    <span>homepage</span></a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span>Logout</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>