<?php
$user = auth()->user();
$SA = $user->hasRole('SUPER-ADMIN');

$navList = [
    [
        'icon' => 'fa-duotone fa-table-rows',
        'title' => 'Dashboard',
        'url' => 'dashboard',
        'access' => 'user-admin',
    ],
    [
        'icon' => 'fa-duotone fa-users',
        'title' => 'Usuarios',
        'url' => 'dashboard/users',
        'access' => 'admin',
    ],
    [
        'icon' => 'fa-duotone fa-link-simple',
        'title' => $SA ? 'Bio Links' : 'Mi Cuenta',
        'url' => 'dashboard/links',
        'access' => 'user-admin',
    ],
    [
        'icon' => 'fa-solid fa-qrcode',
        'title' => 'QR Generados',
        'url' => 'dashboard/qrcodes',
        'access' => 'admin',
    ],
    [
        'icon' => 'fa-duotone fa-message-captions',
        'title' => 'Testimonios',
        'url' => 'dashboard/testimonials',
        'access' => 'admin',
    ],
    [
        'icon' => 'fa-duotone fa-palette',
        'title' => 'Temas',
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
        'title' => 'Configuración',
        'url' => 'dashboard/account/setting',
        'access' => 'user-admin',
    ],
];
?>

<div id="sidebarContainer" class="rounded-end">
    <a class="sidebar-header" href="/">
        <img width="36px" height="36px" class="rounded" src="{{ asset($app->logo) }}" alt="">
        <h5 class="ms-3">{{ $app->title }}</h5>
    </a>

    <div style="height: calc(100% - 58px)" data-simplebar class="scrollbar">
        <div class="sidebar-navlist">
            @foreach ($navList as $item)
               
                @if ($item["access"] == "admin")
                    @role('SUPER-ADMIN')
                        <a href="{{ url($item['url']) }}" class="{{ request()->is($item['url']) ? 'active' : '' }}">
                            <i class="{{ $item['icon'] }}"></i>
                            {{ $item['title'] }}
                        </a>
                    @endrole
                @else
                    <a class="{{ request()->is($item['url']) ? 'active' : '' }}" href="{{ url($item['url']) }}">
                        <i class="{{ $item['icon'] }}"></i>
                        {{ $item['title'] }}
                    </a>
                @endif
            @endforeach

            <br /><hr />
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa-duotone fa-right-from-bracket"></i>
                {{ __('Cerrar Sesión') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
