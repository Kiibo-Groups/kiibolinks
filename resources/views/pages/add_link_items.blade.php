@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="container py-0 linkItemEditor">
        <div class="row">
            <div class="col-lg-7">
                <div class="mb-0 d-flex align-items-center justify-content-between">
                    <div class="add-link">
                        <!---<h4 style="text-align: center; width: 100%; font-size: 24px">{{$link->link_name}}</h4>-->  
                        <!--
                        <p c|lass="link-title">
                            {{__('Your link is :')}}
                            <a 
                                target="_blank" class="px-1" 
                                href="/{{$link->url_name}}" 
                            >
                                {{$link->url_name}}
                            </a>
                        </p>
                        -->
                    </div>
                </div>
                {{-- {{$themes}} --}}
                @include('components.link_items.LinkItemTab')
            </div>

            <div class="d-none d-lg-block col-lg-5">
                <div class="mobileLinkContainer">
                    @include('components.link_items.LinkView')
                </div>
            </div>
        </div>
    </div>
@endsection
