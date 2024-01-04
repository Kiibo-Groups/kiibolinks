@extends('layouts.dashboard.dashboard')
@section('title_header')
{{$link->link_name}}
@endsection

@section('content')
    <div class="container py-0 linkItemEditor">
        <div class="row" style="background: #fff !important;padding: 15px;border-radius: 25px;box-shadow: 0px 10px 12px -6px rgba(0, 0, 0, 0.08);max-height: calc(100vh - 175px);overflow: hidden;">
            <div class="col-lg-8">
                <div class="row">
                    <div style="flex-direction: row;display: flex;">
                        @include('components.link_items.LinkItemTab')
                    </div>
                </div>
            </div>

            <div class="col-lg-4 d-none d-lg-block">
                <div class="mobileLinkContainer" id="mobileLinkContainer" style="height:550px;">
                    @include('components.link_items.LinkView')
                </div>
                
                <div style="justify-content: center;flex-direction: column;text-align: center;">
                    <p style="font-size: 14px;opacity: 0.8;">{{ __('Card live preview') }}</p>

                    <a href="/{{ $link->url_name }}" target="_blank" style="margin: 20px 0 0 0;text-decoration: none;font-size: 13px;">
                        <span class="mt-2 textContent">
                            View Card&nbsp;
                            <i class="fa-regular fa-share-from-square"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection