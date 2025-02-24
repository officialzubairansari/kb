<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard.index') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('logo') }}/{{ $company_details->logo_dark }}" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="{{ asset('logo') }}/{{ $company_details->logo_dark }}" alt="" height="40">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard.index') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('logo') }}/{{ $company_details->logo_light }}" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="{{ asset('logo') }}/{{ $company_details->logo_light }}" alt="" height="40">
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::currentRouteName() == 'dashboard.index' ? 'active' : '' }}"
                       href="{{ route('dashboard.index') }}">
                        <i class="mdi mdi-speedometer"></i>
                        <span class=" font-18 font-bold">Dashboard</span>
                    </a>
                </li>
                @foreach(MENU_ITEMS as $item)
                    <x-backend.menu-item :item="$item" />
                @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
