<?php
    $user = auth()->user();
    $SA = $user->hasRole('SUPER-ADMIN');
    $logoAfter = "Códigos QR";
    $navList = [
        [
            'icon' => 'fa-duotone fa-table-rows',
            'title' => 'Dashboard',
            'url' => 'dashboard',
            'access' => 'admin',//'user-admin',
        ],
        [
            'icon' => 'fa-duotone fa-users',
            'title' => 'Usuarios',
            'url' => 'dashboard/users',
            'access' => 'admin',
        ],
        [
            'icon' => 'fa-duotone fa-credit-card',
            'title' => 'Suscripciones',
            'url' => 'dashboard/subscription-history',
            'access' => 'admin',
        ],
        [
            'icon' => 'fa-duotone fa-link-simple',
            'title' => 'Bio Links',
            'url' => 'dashboard/links',
            'access' => 'user-admin',
        ],
        [
            'icon' => 'fa-duotone fa-link-horizontal',
            'title' => 'Short Links',
            'url' => 'dashboard/short-links',
            'access' => 'admin',//'user-admin',
        ],
        [
            'icon' => 'fa-duotone fa-memo',
            'title' => 'Projectos',
            'url' => 'dashboard/project',
            'access' => 'admin',//'user-admin',
        ],
        
        [
            'icon' => 'fa-duotone fa-qrcode',
            'title' => 'Códigos QR',
            'url' => 'dashboard/qrcodes',
            'access' => 'user-admin',
        ],
        
        [
            'icon' => 'fa-duotone fa-tag',
            'title' => $SA ? 'Planes' : 'Plan actual',
            'url' => $SA ? 'dashboard/plans' : 'dashboard/plan',
            'access' => 'admin',//'user-admin',
        ],
        [
            'icon' => 'fa-duotone fa-message-captions',
            'title' => 'Testimonios',
            'url' => 'dashboard/testimonials',
            'access' => 'admin',
        ],
        [
            'icon' => 'fa-duotone fa-palette',
            'title' => 'Administrar temas',
            'url' => 'dashboard/themes',
            'access' => 'admin',
        ],
        [
            'icon' => 'fa-duotone fa-money-check-dollar-pen',
            'title' => 'Pagos',
            'url' => 'dashboard/payment-settings',
            'access' => 'admin',
        ],
        [
            'icon' => 'fa-duotone fa-gear',
            'title' => 'Ajustes',
            'url' => 'dashboard/app-settings',
            'access' => 'admin',
        ],
        [
            'icon' => 'fa-duotone fa-file-user',
            'title' => 'Cuenta',
            'url' => 'dashboard/account/setting',
            'access' => 'user-admin',
        ]
    ];
?>

<div id="mobileScreen">
    <div class="sidebar-header" style="display:none;">
        <a class="d-flex align-items-center text-decoration-none" href="/">
            <img width="36px" height="36px" src="{{asset($app->logo)}}" alt="">
            <h6 class="ms-2">{{$app->title}}</h6>
        </a>
        <button class="btn btn-light" id="closeSidebar">
            <i class="fa-solid fa-angles-left"></i>
        </button>
    </div>
    <div style="height: calc(100% - 58px)" data-simplebar class="scrollbar">
        <div class="sidebar-navlist">
            @foreach($navList as $item)
                @if ($item['access'] == 'admin')
                    @role('SUPER-ADMIN')
                        <a 
                            href="{{url($item["url"])}}"
                            class="{{(request()->is($item["url"])) ? 'active' : '' }}" 
                        >
                            <i class="{{$item["icon"]}}"></i>
                        </a>
                    @endrole
                @else
                    <a 
                        href="{{url($item["url"])}}"
                        class="{{(request()->is($item["url"])) ? 'active' : '' }}" 
                    >
                        <i class="{{$item["icon"]}}"></i>
                    </a>
                @endif
                @if($item["title"] == $logoAfter)
                    <a 
                        class="dropdown-item logo" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                    >
                       <img src="{{asset($app->logo)}}">
                    </a>
                @endif
            @endforeach
            <a 
                class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
            >
                <i class="fa-regular fa-arrow-right-from-bracket"></i>
            </a>
        </div>    
    </div>    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>