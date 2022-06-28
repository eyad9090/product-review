<form action="{{route("admin.customer.update")}}"  method="post"
id="customer"
enctype="multipart/form-data">
    @csrf
    <h4>customer controls</h4>
    <div class="customer-form">
        <input type="hidden" id="customer-id" name="id">
        <div class="customer-image">
            <label for="image">
                <img src="" alt="" id="customer-image">
            </label>
            <input type="file" id="image" name="image" onchange="changePhoto(this)">
        </div>
        <div>
            <label for="customer-name">name</label>
            <input type="text" placeholder="name" id="customer-name" name="name"
             required pattern="[A-Za-z\s]{2,}" 
            maxlength="50" 
             title="only charcaters and at least 2 characters" autocomplete="off" value={{old("name")}}>
        </div>
        <div id="email-container">
            <label for="customer-email">email</label>
            <input type="email" placeholder="email" id="customer-email" name="email" required value={{old("email")}}>
            @error('email')
                    <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password">password</label>
            <input type="text" name="password" placeholder="newpassowrd" minlength="8">
        </div>
    </div>
    <input type="submit">
</form>