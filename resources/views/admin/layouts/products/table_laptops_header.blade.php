<div class="table-header">
    <h3 class="header">filter</h3>
    <form action="{{route("admin.laptop.search")}}" method="get">
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
        <div class="ram device">
            <input type="number" list="rams" id="ram" name="filter[ram]" min="0"placeholder="ram">
            <datalist id="rams">
                 <option value="2">
                 <option value="4">
                 <option value="8">
                 <option value="16">
                 <option value="32">
                 <option value="64">
             </datalist>
         </div>
         <div class="processor device">
             <input type="text" name="filter[processor]" id="processor" placeholder="processor">
         </div>
         <div class="gpu device">
             <input type="text" name="filter[gpu]" id="gpu" placeholder="gpu">
         </div>
        <div class="submit">
            <button type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
                search
            </button>
        </div>
    </form>
</div>