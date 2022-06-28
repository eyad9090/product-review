<div class="table-header">
    <h3 class="header">filter</h3>
    <form action="{{route("admin.television.search")}}" method="get">
        @csrf
        <div class="rate">
            <i class="fa-solid fa-star"></i>
            <input type="number" name="filter[rating]" id="rate" placeholder="rate" min="0" max="5">
        </div>
        <div class="model">
            <input type="text" name="filter[model]" id="model" placeholder="model">
        </div>
        <div class="price">
            <output>1000$</output>
            <input type="range" name="filter[price]" id="price" placeholder="rating" min="1000" max="50000" step="500" oninput="priceOutput(this.value)" value="50000">
            <output id="max-range">50000</output><span>$</span>
        </div>
        <div class="screen-size tv">
            <input type="text" list="screen_sizes" name="filter[screen-size]" id="screen-size" placeholder="screen size">
            <datalist id="screen_sizes">
                <option value="32">
                <option value="40">
                <option value="43">
                <option value="50">
                <option value="55">
                <option value="60">
                <option value="65">
                <option value="70">
                <option value="75">
                <option value="80">
                <option value="85">
            </datalist>
        </div>
        <div class="submit">
            <button type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
                search
            </button>
        </div>
    </form>
</div>