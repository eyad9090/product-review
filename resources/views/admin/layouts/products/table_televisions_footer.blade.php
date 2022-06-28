<div class="table-footer" id="table-footer">
    <div class="header">
        <h4>Edit</h4>
    </div>
    <form action="{{route("admin.television.update")}}" method="post" 
    id="productsTable" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="product-id" value="{{old("id")}}">
        <div class="inputs">
            <div class="product-image">
                <label for="image">
                    <p>upload image</p>
                    <img src="{{URL::asset("uploads/products/upload.png")}}" alt="" id="product-image">
                </label>
                <input type="file" id="image" name="image" onchange="changePhoto(this)">
            </div>
            <div class="product-model" id="model-container">
                <label for="product-model">model</label>
                <input type="text" placeholder="model" id="product-model" name="model" required>
            </div>
            
            <div class="product-price">
                <label for="product-price">price</label>
                <input type="number" placeholder="price" id="product-price" name="price"  required min="1000" max="50000">
            </div>
            <div class="product-tv">
                <label for="product-screen-size">screen size</label>
                <input type="text" list="screen_sizes" name="screen_size" id="product-screen-size" placeholder="screen size">
                <datalist id="screen_sizes">
                    <option value="32">
                    <option value="40">
                    <option value="43">
                    <option value="50">
                    <option value="55">
                    <option value="60">
                    <option value="65">
                    <option value="70">
                    <option value="75">
                    <option value="80">
                    <option value="85">
                </datalist>
            </div>
        </div>
        <div>
            <input type="submit" value="update">
        </div>
    </form>
</div>