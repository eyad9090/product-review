 <!-- start seach -->
 <div class="search">
    @php
        $types=["laptop","television","mobile"];
    @endphp
    <form action="{{route("home.compare.laptop.search")}}" method="get">
        @csrf
        <div class="model">
            <input type="text" name="model" id="model" placeholder="product model1" required>
        </div>
        <div class="model2">
            <input type="text" name="model2" id="model2" placeholder="product model2" required>
        </div>
        <div class="submit">
            <input type="submit" value="add" required>
        </div>
    </form>
</div>
<!-- end search -->