<div class="px-4 mb-2">
    
    <form method="POST" action="/dashboard/update-link-profile/{{$link->id}}" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="linkProfile">
            <div class="imageContainer">
                <div class="imageBox">
                    <img 
                        alt=""
                        id="linkProfileImg" 
                        src="{{$link->thumbnail ? asset($link->thumbnail) : asset('assets/user-profile.png')}}" 
                    >
                    <label class="imageUploader" for="linkProfileInput">
                        <i class="fa-solid fa-camera"></i>
                    </label>
                    <input 
                        hidden 
                        type="file" 
                        name="thumbnail"
                        id="linkProfileInput"
                    >
                    @error('thumbnail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    
            <div class="inputBox">
                <div class="my-3">
                    <input 
                        onchange="document.querySelector('#saveProfile').click()"
                        type="text" 
                        placeholder="Name" 
                        name="link_name" 
                        value="{{$link->link_name}}" 
                        class="form-control teditable text-center" 
                    >
                </div>
    
                <div>
                    <textarea 
                        onchange="document.querySelector('#saveProfile').click()"
                        rows="3" 
                        name="link_bio" 
                        placeholder="Write something about you." 
                        class="form-control teditable text-center @error('link_bio') is-invalid @enderror"
                    >{{$link->short_bio}}</textarea>

                    @error('link_bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <button class="w-100 btn btn-primary text-white mt-0 d-none" id="saveProfile" >
            {{__('Save')}}
        </button>
    </form>
</div>