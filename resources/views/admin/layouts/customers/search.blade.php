

<form action="{{route("admin.customers.search")}}" method="get" 
id="search">
    @csrf
    <h4>search</h4>
    <div class="search">
        <div>
            <input type="name" placeholder="name" name="name" id="name">
            <input type="email" placeholder="email" name="email" id="email">
        </div>
        <button type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
            search
        </button>
    </div>
</form>