@extends('layouts.dashboard.dashboard')
<?php $user = auth()->user();?>

@section('content')
    <div class="container position-relative">
        @error('link_name')
            @include('components.Toast', ['toastType' => 'error', 'message' => $message])
        @enderror
          
        @error('url_name')
            @include('components.Toast', ['toastType' => 'error', 'message' => $message])
        @enderror

        <div class="d-flex justify-content-between py-4">

            <h5 style="text-align: center; width: 100%;font-size: 22px">{{__('Tarjetas NFC')}}</h5>

            @include('components.links.CreateLink')
        </div>

        @if ($limit_over)
            @include('components.common.WarningAlert')
        @endif
        
        <!--
        @if (count($links) > 0)
            <div class="card overflow-auto">
                <table class="table table-borderless styled-table">
                    <thead>
                        <tr>
                            <th scope="col">{{__('Link Name')}}</th>
                            <th scope="col" class="text-center">{{__('Customize Link')}}</th>
                            <th scope="col" class="text-center">{{__('Views Link')}}</th>
                            <th scope="col" class="text-center">{{__('Total Views')}}</th>
                            <th scope="col" class="text-center">{{__('QR Code')}}</th>
                            <th scope="col" class="text-center">{{__('Copy Link')}}</th>
                            <th scope="col" class="text-end">{{__('Action')}}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($links as $link)
                            <tr>
                                <td class="align-middle">
                                    <p class="m-0">{{ $link->link_name }}</p>
                                </td>

                                @if ($link->link_type == 'biolink')
                                    <td class="text-center align-middle visited">
                                        <a href="/dashboard/biolink/{{ $link->url_name }}">
                                            {{__('Customize')}}
                                        </a>
                                    </td>
                                @else
                                    <td class="text-center align-middle visited">
                                        <p>...</p>
                                    </td>
                                @endif

                                <td class="text-center align-middle visited">
                                    <a id="linkUrl{{ $link->id }}" target="_blank" href="/{{ $link->url_name }}">
                                        {{__('Visit Link')}}
                                    </a>
                                </td>

                                <td class="text-center align-middle visited">
                                    <a href="/dashboard/biolink/analytics/{{ $link->id }}/overview">
                                        <span>
                                            <i class="fa-solid fa-chart-line"></i>
                                            {{ count($link->visited) }}
                                        </span>
                                    </a>
                                </td>

                                <td class="text-center align-middle">
                                    @if ($link->qrcode_id)
                                        <img width="40px" src="{{ $link->qrcode->img_data }}" alt="...">
                                    @else
                                        <button 
                                            type="submit" 
                                            class="btn linkQRCode"
                                            style="
                                                font-size: 13px;
                                                background: #ebedef;
                                                padding: 1px 6px;
                                                font-weight: 500;
                                            "
                                            data-link="{{json_encode($link)}}"
                                        >
                                            {{__('Create QR')}}
                                        </button>
                                    @endif
                                </td>

                                <td class="text-center align-middle visited">
                                    <span 
                                        id="linkCopy{{ $link->id }}"
                                        onclick="makeCopy('linkCopy{{ $link->id }}', 'linkUrl{{ $link->id }}')"
                                    >
                                        {{__('Copy')}}
                                    </span>
                                </td>

                                <td class="align-middle d-flex justify-content-end">
                                    <button 
                                        class="btn link-control" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#editLink{{ $link->id }}"
                                    >
                                        <i class="fa-duotone fa-pen-circle"></i>
                                    </button>
                                    <button 
                                        class="btn link-control" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteItem{{$link->id}}"
                                    >
                                        <i class="fa-duotone fa-circle-trash text-danger"></i>
                                    </button>

                                    @include('components.DeletePopup', [
                                        'id' => $link->id, 
                                        'action' => "/dashboard/delete-link/".$link->id
                                    ])

                                    @include('components.links.EditLink')
                                </td>
                            </tr>
                        @endforeach

                        @include('components.links.LinkQRCode')
                    </tbody>
                </table>
                <div class="mt-3 d-flex justify-content-center">
                    {{ $links->links() }}
                </div>
            </div>
        @else
            <div class="card py-4 px-3 shadow-sm border-0 text-center">
                <h5>{{__('No have any project')}}</h5>
            </div>
        @endif
        -->

        <div id="linkCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($links as $key => $link)
                    <div class="carousel-item @if ($loop->index === 0) active @endif" data-bs-interval="999999">
                        <div class="card" style="border: 1px solid rgb(10, 10, 10);">
                            <div class="card-body" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <h5 class="card-title text-center">{{ $link->link_name }}</h5>
                                <img src="{{ asset($link->thumbnail ?? 'assets/user-profile.png') }}" style="width: 110px; border-radius: 9999px; height:110px;">
                                <div style="display: flex; justify-content: space-between; text-align: center; width:100%; margin-top: 15px;">
                                    <p class="card-text">
                                        <a id="linkUrl{{ $link->id }}" target="_blank" href="/{{ $link->url_name }}" class="link link-primary" style="text-decoration: none;">
                                            {{__('Visit Link')}}
                                        </a>
                                    </p>
                                    <p class="card-text">
                                        <a href="/dashboard/biolink/analytics/{{ $link->id }}/overview" class="link link-primary" style="text-decoration: none;">
                                            <span>
                                                <i class="fa-solid fa-chart-line"></i>
                                                {{ count($link->visited) }}
                                            </span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <a 
                                        href="/dashboard/biolink/{{ $link->url_name }}"
                                        class="btn link-control btn-primary" 
                                    >
                                        Editar
                                    </a>
                                    <a 
                                        class="btn link-control btn-primary"    
                                    >
                                        Eliminar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        
                <div class="carousel-item" >
                    <div class="card" style="height:270px; border: 1px dotted #000000;">
                        <div class="card-body" style="display: flex; justify-content: center; align-items:center;">
                            <button 
                                data-bs-toggle="modal" 
                                class="btn btn-primary"
                                data-bs-target="{{ $limit_over ? '#limitWarning' : '#createLink' }}"
                                style="background-color: transparent; color: #000000; border: 0; outline: 0;"
                            >
                               Agregar nueva tarjeta'
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            function makeCopy(linkCopy, linkUrlID) {
                // console.log(linkUrl);
                const result = window.copyAnchorHref(linkUrlID);
                document.getElementById(linkCopy).innerText = result;
                setTimeout(() => {
                    document.getElementById(linkCopy).innerText = "Copy";
                }, 1000)
            }
        </script>
    </div>
@endsection
