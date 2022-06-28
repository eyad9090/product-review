 <!-- start table -->
 <div class="title">
    <h3 class="table-name header">Laptops</h3>
</div>
<div class="responsive-table">
    @if ($product!=null&& $product2!=null)
        <table class="laptops">
            <thead>
                <tr>
                    <td>image</td>
                    <td>type</td>
                    <td>model</td>
                    <td>ram</td>
                    <td>processor</td>
                    <td>gpu</td>
                    <td>price</td>
                    <td>rating</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="{{URL::asset($product->image)}}" alt=""></td>
                    <td>{{$product->type}}</td>
                    <td>{{$product->model}}</td>
                    <td>{{$product->ram}}gb</td>
                    <td>{{$product->processor}}</td>
                    <td>{{$product->gpu}}</td>
                    <td>{{$product->price}}$</td>
                    <td>{{$product->rating}} <i class="fa-solid fa-star"></i></td>
                </tr>
                <tr>
                    <td><img src="{{URL::asset($product2->image)}}" alt=""></td>
                    <td>{{$product2->type}}</td>
                    <td>{{$product2->model}}</td>
                    <td>{{$product2->ram}}gb</td>
                    <td>{{$product2->processor}}</td>
                    <td>{{$product2->gpu}}</td>
                    <td>{{$product2->price}}$</td>
                    <td>{{$product2->rating}} <i class="fa-solid fa-star"></i></td>
                </tr>
            </tbody>
        </table>
    @endif
</div>
<!-- end table -->