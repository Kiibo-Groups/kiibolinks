<?php
    $SA = $user->hasRole('SUPER-ADMIN');

    function themeAccess($plan, $theme, $SA)
    {
        if ($SA) {
            return true;
        }
        if ($plan->themes == 'Free') {
            if ($theme->type == 'Free') {
                return true;
            } else {
                return false;
            }
        } else if ($plan->themes == 'Standard') {
            if ($theme->type == 'Free' || $theme->type == 'Standard') {
                return true;
            } else {
                return false;
            }
        } else if ($plan->themes == 'Premium') {
            return true;
        } else {
            return false;
        }
    }
?>

{{-- {{dd($plan->name)}} --}}
<div class="card p-4 mb-4 themes">
    <h4 class="mb-2">{{__('Themes')}}</h4>
    <div class="row" style="padding-bottom: 150px;  ">
        @foreach($themes as $theme)
            <div class="col-6 col-lg-4 p-3">
                <div 
                    style="{{$theme->background}}"
                    data-link="{{json_encode($link)}}"
                    data-theme="{{json_encode($theme)}}"
                    class="themeCard {{$link->theme_id == $theme->id ? 'active' : ''}}{{themeAccess($plan, $theme, $SA) ? 'free' : 'pro'}}" >
                    @for ($i=0; $i<4 ; $i++)
                        <div class="contentButton" style="{{$theme->button_style}}"></div>
                    @endfor

                    <div id="{{themeAccess($plan, $theme, $SA) ? 'freeTheme' : 'proTheme'}}">
                        <span>{{themeAccess($plan, $theme, $SA) ? '' : $theme->type}}</span>
                    </div>
                </div>
                <h6 class="text-center mt-2">
                    {{$theme->name}}
                </h6>
            </div>
        @endforeach
    </div>
</div>