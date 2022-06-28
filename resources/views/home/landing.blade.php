<!-- start landing -->
<div class="landing">
    <div class="container">
        <div class="text">
            <h1>five-star the largest Review platform</h1>
            <p>Millions of unbiased reviews. Trusted by 700 Million+ users.</p>
            <form action="@yield("search")" method="get">
                @csrf
                <div class="search_text">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="search for products model" name="model"
                        id="search">
                </div>
                <input type="submit" value="search">
            </form>
            <div class="compares">
                <a href="{{route("home.compare.laptops")}}">Compare Laptops</a>
                <a href="{{route("home.compare.televisions")}}">Compare Televisions</a>
                <a href="{{route("home.compare.mobiles")}}">Compare Mobiles</a>
            </div>
        </div>
        <div class="image">
            <img src="{{asset("homepage/images/landing.png")}}" alt="">
        </div>
    </div>
</div>
<!-- end landing -->