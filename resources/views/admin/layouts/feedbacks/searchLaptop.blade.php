<h3>Search Laptop</h3>
<form action="{{route("admin.feedback.laptop.search")}}" method="get">
    @csrf
    <div class="inputs">
        <div>
            <input type="text" placeholder="model" name="model" id="model" required>
        </div>
    </div>
    <button type="submit">
        <i class="fa-solid fa-magnifying-glass"></i>
        search
    </button>
</form>