@isset($feedbacks)
    <div class="feedbacks">
    <h3>reviews</h3>
    @foreach ($feedbacks as $item)
        <div class="feedback">
            <div class="person-header">
                <div class="details">
                    <div>
                        <img src="{{URL::asset($item->image)}}" alt="">
                    </div>
                    <div>
                        <h2>{{$item->name}}</h2>
                        <p>{{$item->reviews}} reviews</p>
                    </div>
                </div>
                <form action="{{route("admin.feedback.destroy",$item->id)}}"
                    data-flag="0" 
                    method="post" id="delete_form" 
                    onsubmit="deleteReview(event,this)">
                     @csrf
                    <input type="submit" value="delete">
                </form>
            </div>
            <div class="person-body">
                <div class="stars">
                    @for ($i = 1; $i <= $item->rating; $i++)
                        <i class="fa-solid fa-star"></i>
                    @endfor
                    @if ($item->rating!=ceil($item->rating))
                        <i class="fa-solid fa-star-half-stroke"></i>
                        @php
                            $i+=1;
                        @endphp
                    @endif
                    @if ($item->rating==0)
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
                <p>{{$item->created_at->diffForHumans()}}</p>
            </div>
            <div class="person-footer">
                <p>{{$item->feedback}}</p>
            </div>
        </div>
    @endforeach
</div>
@endisset