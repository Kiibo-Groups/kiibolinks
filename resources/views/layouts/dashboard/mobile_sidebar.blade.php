<?php
    $user = auth()->user();
    $SA = $user->hasRole('SUPER-ADMIN');

    $navList = [
        [
            'icon' => 'fa-duotone fa-users',
            'title' => 'Usuarios',
            'url' => 'users',
            'access' => 'admin',
        ],
        [
            'icon' => 'fa-duotone fa-credit-card',
            'title' => 'Suscripciones',
            'url' => 'subscription-history',
            'access' => 'admin',
        ],
        [
            'icon' => 'fa-duotone fa-link-horizontal',
            'title' => 'Short Links',
            'url' => 'short-links',
            'access' => 'user-admin',
        ],
        [
            'icon' => 'fa-duotone fa-message-captions',
            'title' => 'Testimonios',
            'url' => 'testimonials',
            'access' => 'admin',
        ],
        [
            'icon' => 'fa-duotone fa-palette',
            'title' => 'Administrar temas',
            'url' => 'themes',
            'access' => 'admin',
        ],
        [
            'icon' => 'fa-duotone fa-money-check-dollar-pen',
            'title' => 'Pagos',
            'url' => 'payment-settings',
            'access' => 'admin',
        ],
        [
            'icon' => 'fa-duotone fa-gear',
            'title' => 'Ajustes',
            'url' => 'app-settings',
            'access' => 'admin',
        ],
        [
            'icon' => 'fa-duotone fa-file-user',
            'title' => 'Cuenta',
            'url' => 'account/setting',
            'access' => 'user-admin',
        ]
    ];
?>

<div id="mobileScreen">
    <div class="sidebar-header">
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
                @if ($item['title'] == 'Usuarios' ||
                    $item['title'] == 'Suscripciones' ||
                    $item['title'] == 'Pagos' ||
                    $item['title'] == 'Ajustes' || 
                    $item['title'] == 'Administrar temas' ||
                    $item['title'] == 'Testimonios')
                    @role('SUPER-ADMIN')
                        <a 
                            href="{{url($item["url"])}}"
                            class="{{(request()->is($item["url"])) ? 'active' : '' }}" 
                        >
                            <i class="{{$item["icon"]}}"></i>
                            {{$item["title"]}}
                        </a>
                    @endrole
                @else
                    <a 
                        href="{{url($item["url"])}}"
                        class="{{(request()->is($item["url"])) ? 'active' : '' }}" 
                    >
                        <i class="{{$item["icon"]}}"></i>
                        {{$item["title"]}}
                    </a>
                @endif
            @endforeach
            <br /><hr />
            <a 
                class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
            >
                <i class="fa-regular fa-arrow-right-from-bracket"></i>
                {{ __('Log Out') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>    
    </div>    
</div>