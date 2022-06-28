@if ($isReviewed==0)
<div class="review">
    <form action="{{route("home.product.feedback.create")}}" method="get">
        @csrf
        <h3>write a review</h3>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="product_id" value="{{$product->product_id}}">
        <div class="rate">
            <input type="radio" id="star5" name="rating" value="5" />
            <label for="star5" title="text">
                <i class="fa-solid fa-star"></i>
            </label>
            <input type="radio" id="star4" name="rating" value="4" />
            <label for="star4" title="text">
                <i class="fa-solid fa-star"></i>
            </label>
            <input type="radio" id="star3" name="rating" value="3" />
            <label for="star3" title="text">
                <i class="fa-solid fa-star"></i>
            </label>
            <input type="radio" id="star2" name="rating" value="2" />
            <label for="star2" title="text">
                <i class="fa-solid fa-star"></i>
            </label>
            <input type="radio" id="star1" name="rating" value="1" checked />
            <label for="star1" title="text">
                <i class="fa-solid fa-star"></i>
            </label>
        </div>
        <div>
            <textarea name="feedback" id="review" placeholder="review" required></textarea>
        </div>
        <input type="submit" value="post review">
    </form>
</div>
@endif