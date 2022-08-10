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
                    <a href="{{ URL::to('addSlider') }}"><i class="ik ik-user"></i><span>{{ __('Sliders')}}</span></a>
                </div>
            
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('users') }}"><i class="ik ik-user"></i><span>{{ __('Users')}}</span></a>
                </div>
                
                
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('vendors') }}"><i class="ik ik-user"></i><span>{{ __('Vendors')}}</span></a>
                </div>
                {{--<div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('all-orders') }}"><i class="ik ik-user"></i><span>{{ __('Orders')}}</span></a>
                </div>--}}
                
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('deliveryusers') }}"><i class="ik ik-user"></i><span>{{ __('Delivery Partners')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('addCategory') }}"><i class="ik ik-user"></i><span>{{ __('Shop Categories')}}</span></a>
                </div>
                
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('products') }}"><i class="ik ik-archive"></i><span>{{ __('products')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('addProductCategory') }}"><i class="ik ik-user"></i><span>{{ __('Add Product Categories')}}</span></a>
                </div>
                
                {{--<div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('addProduct') }}"><i class="ik ik-user"></i><span>{{ __('Add Product')}}</span></a>
                </div>--}}
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('addMarketProduct') }}"><i class="ik ik-user"></i><span>{{ __('Add Market Product')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('getAllMarketProducts') }}"><i class="ik ik-user"></i><span>{{ __('Market Products')}}</span></a>
                </div>
                
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('marketProductsOrders') }}"><i class="ik ik-user"></i><span>{{ __('Market Products Orders')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('orders') }}"><i class="ik ik-user"></i><span>{{ __('Pickupe and Drop Orders')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('addVehicle') }}"><i class="ik ik-user"></i><span>{{ __('Add Vehicle')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('all-orders/1') }}"><i class="ik ik-user"></i><span>{{ __('Placed Order')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('all-orders/2') }}"><i class="ik ik-user"></i><span>{{ __('Ongoing Order')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('all-orders/3') }}"><i class="ik ik-user"></i><span>{{ __('Cancelled Order')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} ">
                    <a href="{{ URL::to('all-orders/4') }}"><i class="ik ik-user"></i><span>{{ __('Delivered Order')}}</span></a>
                </div>
                
        </div>
    </div>
</div>