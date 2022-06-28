<table class="laptops">
    <thead>
        <tr>
            <td>id</td>
            <td>image</td>
            <td>type</td>
            <td>model</td>
            <td>ram</td>
            <td>processor</td>
            <td>gpu</td>
            <td>price</td>
            <td>rating</td>
            <td>options</td>
        </tr>
    </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td><img src="{{URL::asset($item->image)}}" alt="not exist"></td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->model}}</td>
                    <td>{{$item->ram}} GB</td>
                    <td>{{$item->processor}}</td>
                    <td>{{$item->gpu}}</td>
                    <td>{{$item->price}}$</td>
                    <td>{{$item->rating}} <i class="fa-solid fa-star"></i></td>
                    <td>
                        <div>
                            <input type="button" value="edit" onclick="editProduct(this)">
                            <form action="{{route("admin.laptop.destroy",$item->id)}}"
                                data-flag="0" 
                                method="post" id="delete_form" 
                                onsubmit="deleteProduct(event,this)">
                                 @csrf
                                <input type="submit" value="delete">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>