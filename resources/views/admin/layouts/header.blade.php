<header>
    <h2>
        <label for="nav-toggle">
            <i class="fa-solid fa-bars"></i>
        </label>
        Dashboard
    </h2>
    <div class="user-wrapper">
        <div>
            <h4>{{Auth::user()->name}}</h4>
            <small>{{Auth::user()->role}}</small>
        </div>
    </div>
</header>