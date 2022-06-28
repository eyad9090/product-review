<h3>Search Television</h3>
<form action="{{route("admin.feedback.television.search")}}" method="get">
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