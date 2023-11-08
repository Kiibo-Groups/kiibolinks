@php
   foreach($socialLinks as $social){
      $social->link = NULL;
   }
   if($link->socials) {
      $socials = json_decode($link->socials);
      foreach($socials as $item){
         $encode = json_encode($item);
         $Item = json_decode($encode, true);

         foreach($socialLinks as $social){
            if ($Item["name"] == strtolower($social["name"])) {
               $social->link = $Item['link'];
               break;
            }
         }
      }
   }  
@endphp


<div class="mb-4 p-4">
   <div style="padding-bottom: 250px;">
      <form name="socialLinksForm">
         @csrf

         <div style="width: 100%; display: flex; justify-content: space-between;" class="px-2 my-4">
            <h4>{{ __('Social Links') }} <br />
            <small style="font-size: 12px;">Deja en blanco el link a eliminar</small></h4> 
            <button  type="submit" onclick="submitSocials({{$link->id}})" class="btn btn-primary text-white"> 
               <i style="font-size: 20px" class="fa-regular fa-save"></i>
               {{__('Save')}}
            </button> 
         </div>
         @foreach($socialLinks as $social)
            <div class="mb-3">
               <div class="input-group mb-3">
                  <img style="width: 50px; height: 50px;" style="color: #1d2939" src="{{ asset('assets/icons/socials/' . strtolower($social['name']) . '.jpg') }}">
                  <input 
                     type="text" 
                     id="{{$social['linkType']}}Input" 
                     class="form-control" 
                     placeholder="{{$social['placeholder']}}"
                     style="margin: 0 0 0 25px;border: 1px solid #e1e1e1;border-radius: 15px;"  
                     value="{{$social['link']}}">
               </div>
            </div>
         @endforeach

         <div style="width: 100%; display: flex; justify-content: end;" class="px-4 my-4">
            <button  type="submit" onclick="submitSocials({{$link->id}})" class="btn btn-primary text-white">
               <i style="font-size: 20px" class="fa-regular fa-save"></i>
               {{__('Save')}}
            </button> 
         </div>
      </form>
   </div>
</div>
 