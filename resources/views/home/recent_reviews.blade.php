<!-- Start recent-reviews -->
<div class="recent-reviews">
    <div class="container">
        @if ($recentReviews->count()>0)
            <h1 class="main-heading">recent reviews</h1>
        @endif
        <div class="cards">
            @foreach ($recentReviews as $item)
                <div class="card">
                    <div class="head">
                        <img src="{{URL::asset($item->image)}}" alt="">
                    </div>
                    <div class="body">
                        <h2>{{$item->type}}:{{$item->model}}</h2>
                        <div class="stars">
                            @for ($i = 1; $i <= $item->rating_average; $i++)
                                <i class="fa-solid fa-star"></i>
                            @endfor
                            @if ($item->rating_average!=ceil($item->rating_average))
                                <i class="fa-solid fa-star-half-stroke"></i>
                                @php
                                    $i+=1;
                                @endphp
                            @endif
                            @if ($item->rating_average==0)
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa-regular fa-star"></i>
                                @endfor
                            @endif
                            @if ($i<=5)
                                @for ($i2 = $i; $i2 <= 5; $i2++)
                                    <i class="fa-regular fa-star"></i>
                                @endfor
                            @endif
                        </div>
                        <p>
                            Price:{{$item->price}}$
                        </p>
                    </div>
                    <div class="foot">
                        <a href="{{route("home.product",["id"=>$item->id,"type"=>$item->type])}}">read more</a>
                        <div class="arrow-right">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end recent-reviews -->