<?php
$user = Auth::user();
?>
<nav class="dashboard-navbar mb-0 rounded-0">
    <div class="container pb-0 d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            {{-- <button class="btn d-block d-lg-block" id="expandSidebar">
                <img width="20" height="20" src="{{ asset('assets/icons/menu.svg') }}" />
            </button> --}}
           
            <h5 class="d-none d-lg-block">
                @yield('title_header') 
                {{-- {{ ucfirst($user->name) }} --}}
                
            </h5>
        </div>

        <div class="dropdown">
            <a 
                v-pre
                href="#" 
                role="button" 
                id="navbarDropdown" 
                class="me-3 me-lg-0" 
                data-bs-toggle="dropdown"
                aria-haspopup="true" 
                aria-expanded="false" >
                <img 
                    width="40px" 
                    height="40px" 
                    class="rounded-circle" 
                    src="{{ $user->image ? asset($user->image) : asset('assets/user-profile.png') }}"
                >
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <p class="dropdown-item">{{ Auth::user()->name }}</p>
                <a class="dropdown-item" href="/">
                    {{__('Home')}}
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>
