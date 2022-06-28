<div class="body">
    <div class="profile">
        <form action="{{route("home.profile.update")}}"  method="post"
            id="customer"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{Auth::user()->id}}">
            <div class="profile-header">
                <div class="image">
                    @if (Auth::user()->name!=null)
                        <img src="{{URL::asset(Auth::user()->image)}}" alt="" id="profile-image">
                    @else
                        <img src="{{asset("profilepage/images/nouser.png")}}" alt="" id="profile-image">
                    @endif
                    <label for="image"><i class="fa-solid fa-camera"></i></label>
                    <input type="file" id="image" name="image" onchange="changePhoto(this)">
                </div>
                <div class="title">
                    <h2>{{Auth::user()->name}}</h2>
                    <p>{{$reviewsCount->reviews}} reviews</p>
                </div>
            </div>
            <div class="profile-body">
                <h2>account <span>(press update to save)</span></h2>
                <div class="name">
                    <div>
                        full name
                    </div>
                    <div>
                        <input type="text" name="name" id="name" 
                        placeholder="full name" required 
                        pattern="[a-zA-z\s]{2,}" 
                        title="only characters and more than two"
                        value="{{Auth::user()->name}}"> 
                    </div>
                </div>
                <div class="email">
                    <div>
                        email
                    </div>
                    <div>
                        <input type="email"
                        name="email" 
                        id="email" 
                        placeholder="email" 
                        required
                        value="{{Auth::user()->email}}"> 
                        @error('email')
                                <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="password">
                    <div>
                        password
                    </div>
                    <div>
                        <input type="text" name="password" id="password" placeholder="new password" minlength="8"> 
                    </div>
                </div>
                <div>
                    <input type="submit" value="update">
                </div>
            </div>
        </form>
    </div>
</div>