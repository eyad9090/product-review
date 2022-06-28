<h3 class="table-name">Customers</h3>
<div class="responsive-table">
    <table class="customers">
        <thead>
            <tr>
                <td>id</td>
                <td>image</td>
                <td>name</td>
                <td>email</td>
                <td>reveiws</td>
                <td>options</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>
                        @if (Auth::user()->id==$item->id)
                            <span style="color: red">You</span>
                        @endif
                    <img src="{{URL::asset($item->image)}}"alt="not exist">
                    </td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->reviews}}</td>
                    <td>
                        <div>
                            <input type="button" value="edit" onclick="editCustomer(this)">
                            <form action="{{route("admin.customer.destroy",$item->id)}}"
                                data-flag="0" 
                                method="post" id="delete_form" 
                                onsubmit="deleteCustomer(event,this)">
                                 @csrf
                                <input type="submit" value="delete">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if(method_exists($users, 'links'))
        {{ $users->links() }}
    @endif
</div>