<div class="card p-4 mb-4">
    <form method="POST" id="formPicsProfilUpdate"  action="/dashboard/update-link-profile/{{$link->id}}" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="linkProfile">
            <div class="imageContainer">
                <div class="imageBox">
                    
                    <label for="linkProfileInput">
                        <img alt="" id="linkProfileImg" src="{{$link->thumbnail ? asset($link->thumbnail) : asset('assets/user-profile.png')}}">
                    </label>
                    <p style="opacity: 0.8;font-size:13px;">
                    Imagen de perfil  &nbsp;
                    <i class="fa-solid fa-circle-info" data-toggle="tooltip" data-placement="top" title="Dimensiones ideales son: 540px x 540px"></i>
                    </p> 

                    <input hidden type="file" name="thumbnail" id="linkProfileInput">
                    @error('thumbnail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="imageBoxBackground"> 
                    <label for="linkBackgroundInput">
                        <img alt="" id="linkBackgroundImg" src="{{$link->background ? asset($link->background) : asset('assets/background.png')}}">
                    </label>
                    <p style="position: absolute;bottom: -25px;text-align: center;left: 25%;opacity: 0.8;font-size:13px;">
                        Imagen de fondo&nbsp;
                        <i class="fa-solid fa-circle-info" data-toggle="tooltip" data-placement="top" title="Dimensiones ideales son: 780px x 300px"></i>
                    </p>

                  
                    <input hidden type="file" name="background" id="linkBackgroundInput">
                    @error('background')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
 
                <div class="imageBoxCompany">
                    
                    <label for="linkCompanyInput">
                        <img alt="" id="linkCompanyImg" src="{{$link->company_pic ? asset($link->company_pic) : asset('assets/user-profile.png')}}">
                    </label>
                    <p style="opacity: 0.8;font-size:13px;">
                        Logo de la compañía&nbsp;
                        <i class="fa-solid fa-circle-info" data-toggle="tooltip" data-placement="top" title="Dimensiones ideales son: 440px x 440px"></i></p>
                    
                    @if ($link->company_pic)
                    <span class="imageDel" id="DelcompanyPic" data-link="{{ $link->id }}">
                        <i class="fa-regular fa-xmark"></i>
                    </span>
                    @endif
                    
                    <input hidden type="file" name="company_pic" id="linkCompanyInput">
                    @error('company_pic ')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
    
            <div class="inputBox">
                <div class="row mt-3">
                    <div class="col-lg-6 col-md-12">
                        <label for="link_name" style="font-size: 13px;">Nombre</label>
                        <input  
                        type="text" 
                        placeholder="Name"
                        id="link_name" 
                        name="link_name" 
                        value="{{$link->link_name}}" 
                        class="form-control teditable" >
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <label for="link_location" style="font-size: 13px;">Ubicación</label>
                        <input  
                        type="text" 
                        placeholder="Location" 
                        id="link_location"
                        name="link_location" 
                        value="{{$link->link_location}}" 
                        class="form-control teditable" >
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-6 col-md-12">
                        <label for="link_jobtitle" style="font-size: 13px;">Título profesional</label>
                        <input  
                        type="text" 
                        placeholder="Título profesional"
                        id="link_jobtitle" 
                        name="link_jobtitle" 
                        value="{{$link->link_jobtitle}}" 
                        class="form-control teditable" >
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <label for="link_company" style="font-size: 13px;">Compañía</label>
                        <input  
                        type="text" 
                        placeholder="Compañía" 
                        id="link_company"
                        name="link_company" 
                        value="{{$link->link_company}}" 
                        class="form-control teditable" >
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-12">
                        <label for="link_bio" style="font-size: 13px;">Bio</label>
                        <textarea  
                        rows="3" 
                        name="link_bio" 
                        placeholder="Write something about you." 
                        class="form-control teditable @error('link_bio') is-invalid @enderror">{{utf8_decode($link->short_bio)}}</textarea>

                        @error('link_bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary text-white" style="margin-top:25px;float: right;" id="saveProfile" >
            {{__('Save')}}
        </button>
    </form>
</div>