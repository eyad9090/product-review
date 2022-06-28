<table class="products">
    <thead>
        <tr>
            <td>id</td>
            <td>image</td>
            <td>type</td>
            <td>model</td>
            <td>description</td>
            <td>price</td>
            <td>rating</td>
        </tr>
    </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td><img src="{{URL::asset($item->image)}}" alt="not exist"></td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->model}}</td>
                    <td>
                        {{$item->description}}
                    </td>
                    <td>{{$item->price}}$</td>
                    <td>{{$item->rating}} <i class="fa-solid fa-star"></i></td>
                </tr>
            @endforeach
        </tbody>
</table>