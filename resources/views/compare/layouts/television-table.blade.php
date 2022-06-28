 <!-- start table -->
 <div class="title">
    <h3 class="table-name header">Televisions</h3>
</div>
<div class="responsive-table">
    @if ($product!=null&& $product2!=null)
        <table class="tvs">
            <thead>
                <tr>
                    <td>image</td>
                    <td>type</td>
                    <td>model</td>
                    <td>screen size</td>
                    <td>price</td>
                    <td>rating</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="{{URL::asset($product->image)}}" alt=""></td>
                    <td>{{$product->type}}</td>
                    <td>{{$product->model}}</td>
                    <td>{{$product->screen_size}}inch</td>
                    <td>{{$product->price}}$</td>
                    <td>{{$product->rating}} <i class="fa-solid fa-star"></i></td>
                </tr>
                <tr>
                    <td><img src="{{URL::asset($product2->image)}}" alt=""></td>
                    <td>{{$product2->type}}</td>
                    <td>{{$product2->model}}</td>
                    <td>{{$product2->screen_size}} inch</td>
                    <td>{{$product2->price}}$</td>
                    <td>{{$product2->rating}} <i class="fa-solid fa-star"></i></td>
                </tr>
            </tbody>
        </table>
    @endif
</div>
<!-- end table -->