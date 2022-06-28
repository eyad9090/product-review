<div class="table-footer" id="table-footer">
    <div class="header">
        <h4>Edit</h4>
    </div>
    <form action="{{route("admin.laptop.update")}}" method="post" 
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
            <div class="product-ram">
                <label for="product-ram">ram</label>
                <input type="number" list="rams" id="product-ram" name="ram" min="0"placeholder="ram">
                <datalist id="rams">
                    <option value="2">
                    <option value="4">
                    <option value="8">
                    <option value="16">
                    <option value="32">
                    <option value="64">
                </datalist>
            </div>
            <div class="product-processor">
                <label for="product-processor">processor</label>
                <input type="text" placeholder="processor" id="product-processor" name="processor"  required>
            </div>
            <div class="product-gpu">
                <label for="product-gpu">gpu</label>
                <input type="text" placeholder="gpu" id="product-gpu" name="gpu"  required>
            </div>
        </div>
        <div>
            <input type="submit" value="update">
        </div>
    </form>
</div>