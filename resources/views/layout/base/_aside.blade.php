{{-- Aside --}}


<div class="aside aside-left {{ Metronic::printClasses('aside', false) }} d-flex flex-column flex-row-auto" id="kt_aside">

    {{-- Brand --}}
    <div class="brand flex-column-auto {{ Metronic::printClasses('brand', false) }}" id="kt_brand">
        <div class="brand-logo">
            <a href="{{ url('/') }}">
                <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/logo-default.png') }}" style="width: 150px"/>
            </a>
        </div>

        @if (config('layout.aside.self.minimize.toggle'))
            <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                {{ Metronic::getSVG("media/svg/icons/Navigation/Angle-double-left.svg", "svg-icon-xl") }}
            </button>
        @endif

    </div>

    {{-- Aside menu --}}
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        @if (config('layout.aside.self.display') === false)
            <div class="header-logo">
                <a href="{{ url('/') }}">
                    <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
                </a>
            </div>
        @endif

        <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
            <!--begin::Menu Container-->
            <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                <!--begin::Menu Nav-->
                <ul class="menu-nav">
                 
                    {{-- <li class="menu-section">
                        <h4 class="menu-text">List Menu</h4>
                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                    </li> --}}
                    @php
                    $routeUrl = explode('/', Route::getCurrentRoute()->uri());

                    $currentUrl = explode('/', Route::getCurrentRoute()->uri());
                   
                    $currentModule = isset($currentUrl) ? $currentUrl[0] : '';
                   
                    // $currentUrl = isset($routeUrl) ? $routeUrl[1] : '';
                    $countEndPoint = count($routeUrl);
                    ($countEndPoint == 2) ? $currentUrl = isset($currentUrl) ? $currentUrl[0].'/'.$currentUrl[1] : '' : $currentUrl = isset($currentUrl) ? '/'.$currentUrl[0] : ''; 
                    // dd($currentUrl);
                    @endphp


                    @foreach($menuList as $key => $r)
                    {{-- menu-item-open --}}
                 
                    @if($r->link == '#')
                        <li id="menu-header-{{$key}}" class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">    
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="svg-icon menu-icon">
                                {{ Metronic::getSVG($r->icon, 'menu-icon')}}
                                </span>
                                <span class="menu-text">{{$r->title}}</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu">
                                <i class="menu-arrow"></i>
                                <ul class="menu-subnav">
                                    <li class="menu-item menu-item-parent" aria-haspopup="true">
                                        <span class="menu-link">
                                            <span class="menu-text">{{$r->title}}</span>
                                        </span>
                                    </li>
                                    @foreach ($r->sub_menu2 as $det)
                                    <li class="menu-item {{$currentUrl == $det->link ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                        <a href="{{url($det->tipe.'/'.$det->link)}}" class="menu-link">
                                            <i class="menu-bullet menu-bullet-dot">
                                                <span></span>
                                            </i>
                                            <span class="menu-text">{{$det->title}}</span>
                                        </a>
                                    </li>
                                    @if($currentModule == $det->tipe)
                                    <script>
                                        document.getElementById("menu-header-{{$key}}").classList.add("menu-item-open")
                                     </script>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="menu-item {{$currentUrl == $r->link ? 'menu-item-active' : ''}}" aria-haspopup="true">
                            <a href="{{url($r->tipe.'/'.$r->link)}}" class="menu-link">
                                <span class="svg-icon menu-icon">
                                    {{ Metronic::getSVG($r->icon, 'menu-icon')}}
                                </span>
                                <span class="menu-text">{{$r->title}}</span>
                            </a>
                        </li>
                    @endif
                    @endforeach
                </ul>
                <!--end::Menu Nav-->
            </div>
            <!--end::Menu Container-->
        </div>
    </div>

</div>
