<?php
    $user = auth()->user();
    $SA = $user->hasRole('SUPER-ADMIN');
?>

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


@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="container py-3 linkItemEditor">
        <div class="row">
            <div class="col-lg-7">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <div class="add-link">
                        <h4 style="font-size: 24px">{{$link->link_name}}</h4>
                    
                        <p class="link-title">
                            {{__('Your link is :')}}
                            <a 
                                target="_blank" class="px-1" 
                                href="/{{$link->url_name}}" 
                            >
                                {{$link->url_name}}
                            </a>
                        </p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button 
                                role="tab" 
                                type="button" 
                                id="pills-home-tab" 
                                data-bs-toggle="pill" 
                                class="nav-link {{session('settings') ? 'active' : '';}}" 
                                data-bs-target="#pills-home" 
                                aria-controls="pills-home" 
                                aria-selected="true"
                                onclick="tabActiveController('{{session('settings')}}', 'settings')"
                            >
                                {{__('Settings')}}
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button 
                                role="tab" 
                                type="button" 
                                class="nav-link {{session('blocks') ? 'active' : '';}}" 
                                d="pills-profile-tab" 
                                data-bs-toggle="pill" 
                                data-bs-target="#pills-profile" 
                                aria-controls="pills-profile" 
                                aria-selected="false"
                                onclick="tabActiveController('{{session('blocks')}}', 'blocks')"
                            >
                                {{__('Blocks')}}
                            </button>
                        </li>
                    </ul>
                
                    <button 
                        class="btn btn-primary text-white"
                        data-bs-toggle="modal" 
                        data-bs-target="#addLinkItemsModal"
                    >
                        <i class="fa-solid fa-plus"></i>
                        {{__('Add Block')}}
                    </button>
                    @include('components.link_items.AddLinkItem')
                </div>
                
                <div class="tab-content" id="pills-tabContent">
                    <div 
                        id="pills-home" 
                        role="tabpanel" 
                        class="tab-pane fade {{session('settings') ? 'show active' : '';}}" 
                        aria-labelledby="pills-home-tab"
                    >
                        @include('components.link_items.LinkProfile')
                        <div class="card mb-4 p-4">
                            <div class="d-flex align-items-center justify-content-center" style="flex-wrap: wrap" >
                               @if($link->socials)
                                  <?php
                                     $socials = json_decode($link->socials);
                                  ?>
                                  @foreach($socials as $item)
                                     <?php
                                        $encode = json_encode($item);
                                        $Item = json_decode($encode, true);
                                     ?>
                                     @if($Item['name'] == 'email')
                                        <a class="mx-2 fs-3" _target="_blank" href="mailto:{{$Item['link']}}">
                                           <i style="color: #1d2939" class="{{$Item['icon']}}"></i>
                                        </a>
                         
                                     @elseif($Item['name'] == 'telephone')
                                        <a href="tel:{{$Item['link']}}" class="mx-2 fs-3">
                                           <i style="color: #1d2939" class="{{$Item['icon']}}"></i>
                                        </a>
                         
                                     @elseif($Item['name'] == 'whatsapp')
                                        <a href="https://api.whatsapp.com/send?phone={{$Item['link']}}" target="_blank" class="mx-2 fs-3">
                                           <i style="color: #1d2939" class="{{$Item['icon']}}"></i>
                                        </a>
                         
                                     @else
                                        <?php
                                           $linkUrl = explode("//", $Item['link'])[0];
                                           $validlLink;
                                           if ($linkUrl == 'https:' || $linkUrl == 'http:') {
                                              $validlLink = $Item['link'];
                                           } else {
                                              $validlLink = 'https://'.$linkUrl;
                                           }
                                        ?>
                                        <a class="mx-2 fs-3" target="_blank" href="{{$validlLink}}">
                                           <i style="color: #1d2939" class="{{$Item['icon']}}"></i>
                                        </a>
                                     @endif
                                  @endforeach
                               @else 
                                 <add-link-items-button
                                    :link-id="'{{ $link->id }}'"
                                 ></add-link-items-button>
                                  {{-- <button class="border border-gray-800 bg-white px-5 py-1 rounded-full flex items-center justify-center gap-2"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#exampleModal"
                                  >
                                    <span>{{__('Social Links')}}</span>
                                    <i style="font-size: 20px" class="fa-regular fa-plus"></i>
                                  </button> --}}
                               @endif
                            </div>
                         </div>
                        @include('components.link_items.LinkThems')
                        
                        @if($SA || $user->pricing_plan->name != "BASIC")
                            @include('components.link_items.LinkCustomTheme')
                        @endif
                
                    </div>
                    <div 
                        role="tabpanel" 
                        id="pills-profile" 
                        class="tab-pane fade {{session('blocks') ? 'show active' : '';}}" 
                        aria-labelledby="pills-profile-tab"
                    >
                        @include('components.link_items.LinkItems')
                    </div>
                </div>
            </div>

            <div class="d-none d-lg-block col-lg-5">
                <div class="mobileLinkContainer">
                    @include('components.link_items.LinkView')
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
           <div class="modal-content p-2">
              <div class="modal-header border-0">
                 <h5 class="modal-title">{{__('Social Links')}}</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              
              <div class="modal-body">
                 <form name="socialLinksForm">
                    @csrf
     
                    @foreach($socialLinks as $social)
                       <div class="mb-3">
                          <div class="input-group mb-3">
                             <span class="input-group-text" id="prefix" style="width: 44px" >
                                <i class="{{$social['icon']}}"></i>
                             </span>
                             <input 
                                type="text" 
                                id="{{$social['linkType']}}Input" 
                                class="form-control px-2 border-start-0" 
                                placeholder="{{$social['placeholder']}}"
                                value="{{$social['link']}}"
                             >
                          </div>
                       </div>
                    @endforeach
     
                    <button 
                       type="submit" 
                       onclick="submitSocials({{$link->id}})"
                       class="mt-3 text-white form-control btn btn-primary"
                    >
                       {{__('Create')}}
                    </button>
                 </form>
              </div>
           </div>
        </div>
    </div>
@endsection


@push('scripts')
    @vite('resources/js/scripts/pages/links/edit-links.js')
@endpush