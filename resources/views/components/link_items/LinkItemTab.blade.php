<?php
    $user = auth()->user();
    $SA = $user->hasRole('SUPER-ADMIN');
    session(["settings" => 1])    
?>

<div class="col-lg-2" style="border-right: 1px solid #e1e1e1;">
    <div id="sidebarContainer" class="rounded-end"> 
        <div style="height: calc(100% - 58px)" data-simplebar class="scrollbar">
            <div class="sidebar-navlist" style="padding: 0 !important;">
                <ul class="nav nav-pills-links" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation" style="width: 100%;padding: 10px 0;">
                        <button role="tab" 
                            style="width: 100%;text-align: left;"
                            type="button" 
                            id="pills-home-tab" 
                            data-bs-toggle="pill" 
                            class="nav-link {{session('settings') ? 'active' : '';}}" 
                            data-bs-target="#pills-home" 
                            aria-controls="pills-home" 
                            aria-selected="true"
                            onclick="tabActiveController('{{session('settings')}}', 'settings')">
                            <i class="fa-duotone fa-users"></i>
                            {{__('About')}}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation" style="width: 100%;padding: 10px 0;">
                        <button role="tab" 
                            style="width: 100%;text-align: left;"
                            type="button" 
                            class="nav-link {{session('sociales') ? 'active' : '';}}" 
                            id="pills-sociales-tab" 
                            data-bs-toggle="pill" 
                            data-bs-target="#pills-sociales" 
                            aria-controls="pills-sociales" 
                            aria-selected="false"
                            onclick="tabActiveController('{{session('sociales')}}', 'sociales')">
                            <i class="fa-duotone fa-link-simple"></i>
                            {{__('Content')}} 
                        </button>
                    </li>
                    <li class="nav-item" role="presentation" style="width: 100%;padding: 10px 0;">
                        <button role="tab" 
                            style="width: 100%;text-align: left;"
                            type="button" 
                            class="nav-link {{session('bloques') ? 'active' : '';}}" 
                            id="pills-bloques-tab" 
                            data-bs-toggle="pill" 
                            data-bs-target="#pills-bloques" 
                            aria-controls="pills-bloques" 
                            aria-selected="false"
                            onclick="tabActiveController('{{session('bloques')}}', 'bloques')">
                            <i class="fa-duotone fa-qrcode"></i>
                            {{__('Blocks')}} 
                        </button>
                    </li>
                    <li class="nav-item" role="presentation" style="width: 100%;padding: 10px 0;">
                        <button role="tab" 
                            style="width: 100%;text-align: left;"
                            type="button" 
                            class="nav-link {{session('themes') ? 'active' : '';}}" 
                            id="pills-themes-tab" 
                            data-bs-toggle="pill" 
                            data-bs-target="#pills-themes" 
                            aria-controls="pills-themes" 
                            aria-selected="false"
                            onclick="tabActiveController('{{session('themes')}}', 'themes')">
                            <i class="fa-duotone fa-palette"></i> 
                            {{__('Theme')}} 
                        </button> 
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-9" style="padding-left: 24px;height: 100vh;overflow: hidden;overflow-y: scroll;"> 
    <div class="tab-content" id="pills-tabContent">
        <div role="tabpanel"
            id="pills-home" 
            class="tab-pane fade {{session('settings') ? 'show active' : '';}}" 
            aria-labelledby="pills-home-tab">
            <!-- Perfil -->
            @include('components.link_items.LinkProfile')
        </div>

        <!-- Redes sociales -->
        <div role="tabpanel" 
            id="pills-sociales" 
            class="tab-pane fade {{session('sociales') ? 'show active' : '';}}" 
            aria-labelledby="pills-sociales-tab">
            
            @include('components.link_items.LinkSocials')
        </div>
 
        <!-- Enlaces & Modals -->
        <div role="tabpanel" 
            id="pills-bloques" 
            class="tab-pane fade {{session('bloques') ? 'show active' : '';}}" 
            aria-labelledby="pills-bloques-tab">
            
            @include('components.link_items.LinkItems')
            @include('components.link_items.AddLinkItem')
        </div>

        <!-- Tehemes -->
        <div role="tabpanel" 
            id="pills-themes" 
            class="tab-pane fade {{session('themes') ? 'show active' : '';}}" 
            aria-labelledby="pills-themes-tab">
            
            @include('components.link_items.LinkThems')
            
        </div>
    </div>
</div>