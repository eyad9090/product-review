<div class="table-header">
    <h3 class="header">filter</h3>
    <form action="{{route("admin.product.search")}}" method="get">
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
        <div class="submit">
            <button type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
                search
            </button>
        </div>
    </form>
</div>