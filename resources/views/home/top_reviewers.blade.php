<!-- start top-reviewer -->
<div class="top-reviewer">
    <div class="container">
        <h1 class="main-heading">Top Reviewers</h1>
        <div class="cards">
            @foreach ($reviews as $item)
                <div class="card">
                    <img src="{{URL::asset($item->image)}}" alt="">
                    <h2>{{$item->name}}</h2>
                    <p><span>{{$item->reviews}}</span> Reviews</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end top-reviewer -->