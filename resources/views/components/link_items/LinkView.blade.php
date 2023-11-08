<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Sript --}}
    <script src="{{ asset('js/fontawesome.js') }}" ></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <title>{{ $link->link_name }}</title>
</head>

<?php
$customActive = $link->custom_theme_active;

$buttonStyle = '';
$backgroundStyle = '';
$themeTextColor = '';
$fontFamily = '';

if ($customActive) {
    $buttonStyle = "
            background: {$link->custom_theme->btn_bg_color};
            border-radius: {$link->custom_theme->btn_radius};
        ";
    $backgroundStyle = $link->custom_theme->background;
    $themeTextColor = $link->custom_theme->text_color;
    $fontFamily = $link->custom_theme->font_family;
} else {
    $buttonStyle = $link->theme->button_style;
    $backgroundStyle = $link->theme->background;
    $themeTextColor = $link->theme->text_color;
    $fontFamily = $link->theme->font_family;
}
?>

<style>
    #bioLink .textContent {
        color: {{ $themeTextColor }};
    }
</style>

<body style="font-family: {{ $fontFamily }} !important">
    <div id="bioLink" class="viewBioLink"
        style=" 
            {{ $backgroundStyle }};
            width: 420px;
            height: 800px; 
            padding: 0;
            padding-bottom: 0px;
            position: absolute;
            margin-left: auto;
            margin-right: auto;
            box-shadow: rgb(128 128 128 / 35%) 0px 4px 6.84px;
            -webkit-box-flex: 1;
            -moz-transform: scale(0.6);
            overflow: hidden;
            border-radius: 30px;
            overflow-y: scroll;
            top: -120px;">
        
        <div class="container" style="padding: 0 !important;width: 100% !important;">
            <div class="row mx-auto" style="margin-left: 0 !important;margin-right: 0 !important;padding-left: 0 !important;padding-right: 0 !important;">
                <div class="col-lg-12 mx-auto" style="margin-left: 0 !important;margin-right: 0 !important;padding-left: 0 !important;padding-right: 0 !important;">
                    <div style="height:200px" class="css-1hop7p4">
                        <img src="{{ $link->background ? asset($link->background) : asset('assets/background.png') }}" alt="banner image" 
                        style="object-fit: cover;width: 100%;height: inherit;" id="imageContainer">
                    </div>
                   

                    <div class="linkProfile">
                        <div class="css-ddj3gs">
                            <img  alt="" id="linkProfileImg" src="{{ $link->thumbnail ? asset($link->thumbnail) : asset('assets/user-profile.png') }}">
                        </div>
                        @if($link->company_pic)
                        <div style="opacity: 1; margin-top: -92px; margin-left: 151px; z-index: 2;" class="css-1lj06q0">
                            <img src="{{ $link->company_pic ? asset($link->company_pic) : asset('assets/user-profile.png.png') }}" class="profile-logo" alt="logo">
                        </div>
                        @endif
                        
                        <div style="display: flex; margin-top: 44px;">
                            <h3 class="mt-2 textContent">{{ $link->link_name }}</h3>
                        </div>
                        <div style="display: flex;">
                            <h6 class="mt-2 textContent">{{ $link->link_jobtitle }} at {{ $link->link_company }}</h6>
                        </div>
                        <p class="py-2 textContent" style="opacity: 0.8;">{{ $link->link_location }}</p>
                        
                        <p class="py-2 textContent">{{ $link->short_bio }}</p>
                        <div class="d-flex justify-content-center" style="flex-wrap: wrap">
                            @if ($link->socials)
                                <?php
                                $socials = json_decode($link->socials);
                                ?>
                                @foreach ($socials as $item)
                                    <?php
                                    $encode = json_encode($item);
                                    $Item = json_decode($encode, true);
                                    ?>
                                    @if ($Item['name'] == 'email')
                                        <a class="mt-4 me-0 ms-2 fs-4" _target="_blank" href="mailto:{{ $Item['link'] }}" style="text-decoration: none;color: #000;">
                                            <!--<i style="color: #1d2939" class="{{ $Item['icon'] }}"></i>-->
                                            <img src="{{ asset('assets/icons/socials/' . $Item['name'] . '.jpg') }}" style="width: 100px; height: 100px; border-radius: 15px;" />
                                            <span style="position: relative;display: block;font-size: 14px;text-transform: capitalize;" >{{ $Item['name'] }}</span>
                                        </a>
                                    @elseif($Item['name'] == 'telephone')
                                        <a href="tel:{{ $Item['link'] }}" class="mt-4 me-0 ms-2 fs-4" style="text-decoration: none;color: #000;">
                                            <!--<i style="color: #1d2939" class="{{ $Item['icon'] }}"></i>-->
                                            <img src="{{ asset('assets/icons/socials/' . $Item['name'] . '.jpg') }}" style="width: 100px; height: 100px; border-radius: 15px;" />
                                            <span style="position: relative;display: block;font-size: 14px;text-transform: capitalize;" >{{ $Item['name'] }}</span>
                                        </a>
                                    @elseif($Item['name'] == 'whatsapp')
                                        <a href="https://api.whatsapp.com/send?phone={{ $Item['link'] }}"
                                            target="_blank" class="mt-4 me-0 ms-2 fs-4" style="text-decoration: none;color: #000;">
                                            <!--<i style="color: #1d2939" class="{{ $Item['icon'] }}"></i>-->
                                            <img src="{{ asset('assets/icons/socials/' . $Item['name'] . '.jpg') }}" style="width: 100px; height: 100px; border-radius: 15px;" />
                                            <span style="position: relative;display: block;font-size: 14px;text-transform: capitalize;" >{{ $Item['name'] }}</span>
                                        </a>
                                    @else
                                        <?php
                                        $linkUrl = explode('//', $Item['link'])[0];
                                        $validlLink;
                                        if ($linkUrl == 'https:' || $linkUrl == 'http:') {
                                            $validlLink = $Item['link'];
                                        } else {
                                            $validlLink = 'https://' . $linkUrl;
                                        }
                                        ?>
                                        <a class="mt-4 me-0 ms-2 fs-4" target="_blank" href="{{ $validlLink }}" style="text-decoration: none;color: #000;">
                                            <!--<i style="color: #1d2939" class="{{ $Item['icon'] }}"></i>-->
                                            <img src="{{ asset('assets/icons/socials/' . $Item['name'] . '.jpg') }}" style="width: 100px; height: 100px; border-radius: 15px;" />
                                            <span style="position: relative;display: block;font-size: 14px;text-transform: capitalize;" >{{ $Item['name'] }}</span>
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        
                    </div>

                    <div style="padding-left: 15px;padding-right: 15px;">
                        @foreach ($link->items as $item)
                            <div class="text-center mb-3">
                                <?php
                                $type = $item->item_type;
                                $sub_type = $item->item_sub_type;
                                ?>

                                @if ($type == 'Image' || $type == 'Embed Link')
                                    <div id="mobileViewLinkItem" class="mobileViewLinkItem"
                                        style="{{ $buttonStyle }}">
                                        <div role="button" id="embedButton" aria-expanded="false"
                                            href="#embedLInkItem{{ $item->id }}" data-bs-toggle="collapse"
                                            onclick="embedButton({{ $item->id }})">
                                            <i class="textContent itemIcon {{ $item->item_icon }}"></i>
                                            <h6 class="textContent">
                                                {{ $item->item_title }}
                                            </h6>

                                            <i id="rightArrow{{ $item->id }}"
                                                class="textContent rightArrow fa-solid fa-angle-right"></i>
                                        </div>

                                        <div class="collapse" id="embedLInkItem{{ $item->id }}">
                                            <div class="pt-0" style="padding: 14px; background: transparent;">
                                                <div class="card border-0" style="overflow: hidden;">
                                                    @if ($sub_type == 'TikTok')
                                                        <?php
                                                        $str_arr = explode('/', $item->item_content);
                                                        $videoId = array_pop($str_arr);
                                                        ?>
                                                        <blockquote class="tiktok-embed"
                                                            cite="{{ $item->item_content }}"
                                                            data-video-id="{{ $videoId }}"
                                                            style="width: 100%; height: auto;">
                                                            <script async src="https://www.tiktok.com/embed.js"></script>
                                                        </blockquote>
                                                    @elseif($sub_type == 'Image')
                                                        <img width="100%" src="{{ asset($item->content) }}"
                                                            alt="">
                                                    @else
                                                        <iframe width="100%" height="400" frameborder="0"
                                                            allowfullscreen src="{{ $item->item_link }}"></iframe>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($type == 'Text Content')
                                    @if ($item->item_sub_type == 'paragraph')
                                        <div id="mobileViewLinkItem" class="mobileViewLinkItem"
                                            style="{{ $buttonStyle }}">
                                            <div role="button" id="embedButton" aria-expanded="false"
                                                data-bs-toggle="collapse" href="#embedLInkItem{{ $item->id }}"
                                                onclick="embedButton({{ $item->id }})">
                                                <i class="textContent itemIcon {{ $item->item_icon }}"></i>
                                                <h6 class="textContent">
                                                    {{ $item->item_title }}
                                                </h6>
                                                <i id="rightArrow{{ $item->id }}"
                                                    class="textContent rightArrow fa-solid fa-angle-right"></i>
                                            </div>

                                            <div class="collapse" id="embedLInkItem{{ $item->id }}">
                                                <div class="pt-0" style="padding: 14px; background: transparent;">
                                                    <div class="card border-0" style="overflow: hidden;">
                                                        <p>{{ $item->content }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <{{ $item->item_sub_type }} class="textContent">
                                            {{ $item->item_title }}
                                            </{{ $item->item_sub_type }}>
                                    @endif
                                @elseif($type == 'Link')
                                    <div id="mobileViewLinkItem" class="mobileViewLinkItem">
                                        <div style="padding: 14px; {{ $buttonStyle }}">
                                            <a target="_blank"
                                                class="d-flex justify-content-between align-items-center text-decoration-none"
                                                href="{{ $item->item_link }}">
                                                <i class="itemIcon textContent {{ $item->item_icon }}"></i>
                                                <h6 class="textContent">
                                                    {{ $item->item_title }}
                                                </h6>
                                                <div style="width: 24px"></div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- <div>
            <img width="40px" style="border-radius: 6px" src="{{ asset($link->branding) }}" alt="">
        </div> --}}
    </div>

    <script>
        function embedButton(id) {
            let rightArrow = document.getElementById(`rightArrow${id}`).classList;
            if (rightArrow.contains("active")) {
                rightArrow.add("inactive");
                rightArrow.remove("active");
            } else {
                rightArrow.add("active");
                rightArrow.remove("inactive");
            }
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
