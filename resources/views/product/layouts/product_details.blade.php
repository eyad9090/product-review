<div class="product">
    <div class="image">
        <img src="{{URL::asset($product->image)}}" alt="">
    </div>
    <div class="description">
        <h3>{{$product->model}}</h3>
        @if ($product->type=="laptop")
        <p class="product-description">GPU:{{$product->gpu}}
        -Processor:{{$product->processor}}-
        Ram:{{$product->ram}}GB</p>
        @elseif($product->type=="mobile")
        <p class="product-description">Camera:{{$product->camera}}mega pixel-
            Ram:{{$product->ram}}GB</p>
        @else
        <p class="product-description">{{$product->screen_size}} inch</p>
        @endif
        <p class="product-description">price:{{$product->price}}$</p>
        <div class="rate">
            <div class="stars">
                @for ($i = 1; $i <= $rating->rating_average; $i++)
                    <i class="fa-solid fa-star"></i>
                @endfor
                @if ($rating->rating_average!=ceil($rating->rating_average))
                    <i class="fa-solid fa-star-half-stroke"></i>
                    @php
                        $i+=1;
                    @endphp
                @endif
                @if ($rating->rating_average==0)
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
            <div>
                <p>{{$reviewsCount}} reviews</p>
            </div>
        </div>
    </div>
</div>