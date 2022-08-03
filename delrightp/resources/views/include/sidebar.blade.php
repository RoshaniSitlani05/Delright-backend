<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('home')}}">
            <div class="logo-img">
                <span>Delright</span>
               <!--<img height="30" src="" class="header-brand-img" title="Delright"> -->
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="{{route('home')}}"><i class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard')}}</span></a>
                </div>

            <div class="nav-lavel">{{ __('Delright')}} </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('users') }}"><i class="ik ik-user"></i><span>{{ __('Users')}}</span></a>
                </div>
                
                
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('vendors') }}"><i class="ik ik-user"></i><span>{{ __('Vendors')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('deliveryusers') }}"><i class="ik ik-user"></i><span>{{ __('Delivery Partners')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('products') }}"><i class="ik ik-archive"></i><span>{{ __('products')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('addCategory') }}"><i class="ik ik-user"></i><span>{{ __('Add Categories')}}</span></a>
                </div>
                {{--<div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('addProduct') }}"><i class="ik ik-user"></i><span>{{ __('Add Product')}}</span></a>
                </div>--}}
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('addMarketProduct') }}"><i class="ik ik-user"></i><span>{{ __('Add Market Product')}}</span></a>
                </div>
                
        </div>
    </div>
</div>