<!--
      Sidebar Mini Mode - Display Helper classes

      Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
      Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
        If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

      Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
      Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
      Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
<nav id="sidebar" aria-label="Main Navigation">
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
            <a class="fw-semibold text-white tracking-wide" href="#">
                <span class="smini-visible">H<span class="opacity-75">H</span></span>
                <span class="smini-hidden">
                    <span class="d-flex justify-content-between align-items-center gap-1">
                        <img src="{{ asset('assets/media/Logo.png') }}" alt="Logo Image" style="width: 20px; height: 20px; object-fit: cover;">
                        <div>
                            House<span class="opacity-75">Hub</span>
                        </div>
                    </span>
                </span>
            </a>

            <div class="d-flex align-items-center gap-1">
                <!-- Dark Mode -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <div class="dropdown">
                    <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-dark-mode-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-fw fa-moon" data-dark-mode-icon></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end smini-hide border-0" aria-labelledby="sidebar-dark-mode-dropdown">
                        <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout" data-action="dark_mode_off" data-dark-mode="off">
                            <i class="far fa-sun fa-fw opacity-50"></i>
                            <span class="fs-sm fw-medium">Light</span>
                        </button>
                        <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout" data-action="dark_mode_on" data-dark-mode="on">
                            <i class="far fa-moon fa-fw opacity-50"></i>
                            <span class="fs-sm fw-medium">Dark</span>
                        </button>
                        <button type="button" class="dropdown-item d-flex align-items-center gap-2" data-toggle="layout" data-action="dark_mode_system" data-dark-mode="system">
                            <i class="fa fa-desktop fa-fw opacity-50"></i>
                            <span class="fs-sm fw-medium">System</span>
                        </button>
                    </div>
                </div>
                <!-- END Dark Mode -->

                <!-- Options -->
                <div class="dropdown">
                    <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-paint-brush"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end fs-sm border-0" aria-labelledby="sidebar-themes-dropdown">
                        <!-- Color Themes -->
                        <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                        <div class="row g-sm text-center">
                            <div class="col-4 mb-1">
                                <a class="d-block py-3 text-white fs-xs fw-semibold bg-default rounded-1" data-toggle="theme" data-theme="default" href="#">
                                    Default
                                </a>
                            </div>
                            <div class="col-4 mb-1">
                                <a class="d-block py-3 text-white fs-xs fw-semibold bg-xwork rounded-1" data-toggle="theme" data-theme="{{ asset('assets/css/themes/xwork.min.css') }}" href="#">
                                    xWork
                                </a>
                            </div>
                            <div class="col-4 mb-1">
                                <a class="d-block py-3 text-white fs-xs fw-semibold bg-xmodern rounded-1" data-toggle="theme" data-theme="{{ asset('assets/css/themes/xmodern.min.css') }}" href="#">
                                    xModern
                                </a>
                            </div>
                            <div class="col-4 mb-1">
                                <a class="d-block py-3 text-white fs-xs fw-semibold bg-xeco rounded-1" data-toggle="theme" data-theme="{{ asset('assets/css/themes/xeco.min.css') }}" href="#">
                                    xEco
                                </a>
                            </div>
                            <div class="col-4 mb-1">
                                <a class="d-block py-3 text-white fs-xs fw-semibold bg-xsmooth rounded-1" data-toggle="theme" data-theme="{{ asset('assets/css/themes/xsmooth.min.css') }}" href="#">
                                    xSmooth
                                </a>
                            </div>
                            <div class="col-4 mb-1">
                                <a class="d-block py-3 text-white fs-xs fw-semibold bg-xinspire rounded-1" data-toggle="theme" data-theme="{{ asset('assets/css/themes/xinspire.min.css') }}" href="#">
                                    xInspire
                                </a>
                            </div>
                            <div class="col-4 mb-1">
                                <a class="d-block py-3 text-white fs-xs fw-semibold bg-xdream rounded-1" data-toggle="theme" data-theme="{{ asset('assets/css/themes/xdream.min.css') }}" href="#">
                                    xDream
                                </a>
                            </div>
                            <div class="col-4 mb-1">
                                <a class="d-block py-3 text-white fs-xs fw-semibold bg-xpro rounded-1" data-toggle="theme" data-theme="{{ asset('assets/css/themes/xpro.min.css') }}" href="#">
                                    xPro
                                </a>
                            </div>
                            <div class="col-4 mb-1">
                                <a class="d-block py-3 text-white fs-xs fw-semibold bg-xplay rounded-1" data-toggle="theme" data-theme="{{ asset('assets/css/themes/xplay.min.css') }}" href="#">
                                    xPlay
                                </a>
                            </div>
                        </div>
                        <!-- END Color Themes -->
                    </div>
                </div>
                <!-- END Options -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times-circle"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
        </div>
    </div>

    <div class="js-sidebar-scroll">
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item {{ request()->routeIs('dashboard*') ? 'open' : '' }}">
                    <a class="nav-main-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="nav-main-link-icon fa fa-location-arrow"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                        {{--                        <span class="nav-main-link-badge badge rounded-pill bg-primary">8</span>--}}
                    </a>
                </li>

                @canany([
                            'view building', 'create building', 'update building', 'delete building',
                            'view floor', 'create floor', 'update floor', 'delete floor',
                            'view flat', 'create flat', 'update flat', 'delete flat',
                            'view utility', 'create utility', 'update utility', 'delete utility',
                        ])
                    <li class="nav-main-heading">Building Management</li>
                @endcanany

                @canany(['view building', 'create building', 'update building', 'delete building'])
                    <li class="nav-main-item {{ request()->routeIs('buildings*') ? 'open' : '' }}">
                        <a class="nav-main-link {{ request()->routeIs('buildings*') ? 'active' : '' }}" href="{{ route('buildings.index') }}">
                            <i class="nav-main-link-icon fa fa-building"></i>
                            <span class="nav-main-link-name">Buildings</span>
                        </a>
                    </li>
                @endcanany
                @canany(['view floor', 'create floor', 'update floor', 'delete floor'])
                    <li class="nav-main-item {{ request()->routeIs('floors*') ? 'open' : '' }}">
                        <a class="nav-main-link {{ request()->routeIs('floors*') ? 'active' : '' }}" href="{{ route('floors.index') }}">
                            <i class="nav-main-link-icon fa fa-layer-group"></i>
                            <span class="nav-main-link-name">Floors</span>
                        </a>
                    </li>
                @endcanany
                @canany(['view flat', 'create flat', 'update flat', 'delete flat'])
                    <li class="nav-main-item {{ request()->routeIs('flats*') ? 'open' : '' }}">
                        <a class="nav-main-link {{ request()->routeIs('flats*') ? 'active' : '' }}" href="{{ route('flats.index') }}">
                            <i class="nav-main-link-icon fa fa-door-closed"></i>
                            <span class="nav-main-link-name">Flats</span>
                        </a>
                    </li>
                @endcanany
                @canany(['view utility', 'create utility', 'update utility', 'delete utility'])
                    <li class="nav-main-item {{ request()->routeIs('utilities*') ? 'open' : '' }}">
                        <a class="nav-main-link {{ request()->routeIs('utilities*') ? 'active' : '' }}" href="{{ route('utilities.index') }}">
                            <i class="nav-main-link-icon fa fa-money-bills"></i>
                            <span class="nav-main-link-name">Utilities</span>
                        </a>
                    </li>
                @endcanany
                @canany(['view renter', 'create renter', 'update renter', 'delete renter'])
                    <li class="nav-main-item {{ request()->routeIs('renters*') ? 'open' : '' }}">
                        <a class="nav-main-link {{ request()->routeIs('renters*') ? 'active' : '' }}" href="{{ route('renters.index') }}">
                            <i class="nav-main-link-icon fa fa-person-walking-luggage"></i>
                            <span class="nav-main-link-name">Renters</span>
                        </a>
                    </li>
                @endcanany

                @canany([
                            'view renter-flat-assign', 'create renter-flat-assign', 'update renter-flat-assign', 'delete renter-flat-assign',
                        ])
                    <li class="nav-main-heading">Configurations</li>
                @endcanany

                @canany(['view renter-flat-assign', 'create renter-flat-assign', 'update renter-flat-assign', 'delete renter-flat-assign'])
                    <li class="nav-main-item {{ request()->routeIs('renter-flat-assign*') ? 'open' : '' }}">
                        <a class="nav-main-link {{ request()->routeIs('renter-flat-assign*') ? 'active' : '' }}" href="{{ route('renter-flat-assign.index') }}">
                            <i class="nav-main-link-icon fa fa-check-to-slot"></i>
                            <span class="nav-main-link-name">Assign Renter-Flat</span>
                        </a>
                    </li>
                @endcanany

                @canany([
                            'view month-wise-report', 'create month-wise-report', 'update month-wise-report', 'delete month-wise-report',
                            'view invoice', 'generate invoice', 'delete invoice',
                        ])
                    <li class="nav-main-heading">Reports</li>
                @endcanany

                @canany(['view invoice', 'generate invoice', 'delete invoice'])
                    <li class="nav-main-item {{ request()->routeIs('invoices*') ? 'open' : '' }}">
                        <a class="nav-main-link {{ request()->routeIs('invoices*') ? 'active' : '' }}" href="{{ route('invoices.index') }}">
                            <i class="nav-main-link-icon fa fa-receipt"></i>
                            <span class="nav-main-link-name">Invoices</span>
                        </a>
                    </li>
                @endcanany
                @canany(['view month-wise-report', 'create month-wise-report', 'update month-wise-report', 'delete month-wise-report'])
                    <li class="nav-main-item {{ request()->routeIs('month-wise-report*') ? 'open' : '' }}">
                        <a class="nav-main-link {{ request()->routeIs('month-wise-report*') ? 'active' : '' }}" href="#">
                            <i class="nav-main-link-icon fa fa-calendar-week"></i>
                            <span class="nav-main-link-name">Monthly Reports</span>
                        </a>
                    </li>
                @endcanany

                @canany([
                            'view permission', 'create permission', 'update permission', 'delete permission',
                            'view role', 'create role', 'update role', 'delete role',
                            'view user', 'create user', 'update user', 'delete user',
                        ])
                    <li class="nav-main-heading">Administration</li>
                @endcanany

                @canany(['view permission', 'create permission', 'update permission', 'delete permission'])
                    <li class="nav-main-item {{ request()->routeIs('permissions*') ? 'open' : '' }}">
                        <a class="nav-main-link {{ request()->routeIs('permissions*') ? 'active' : '' }}" href="{{ route('permissions.index') }}">
                            <i class="nav-main-link-icon fa fa-key"></i>
                            <span class="nav-main-link-name">Permissions</span>
                        </a>
                    </li>
                @endcanany
                @canany(['view role', 'create role', 'update role', 'delete role'])
                    <li class="nav-main-item {{ request()->routeIs('roles*') ? 'open' : '' }}">
                        <a class="nav-main-link {{ request()->routeIs('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                            <i class="nav-main-link-icon fa fa-user-lock"></i>
                            <span class="nav-main-link-name">Roles</span>
                        </a>
                    </li>
                @endcanany
                @canany(['view user', 'create user', 'update user', 'delete user'])
                    <li class="nav-main-item {{ request()->routeIs('users*') ? 'open' : '' }}">
                        <a class="nav-main-link {{ request()->routeIs('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                            <i class="nav-main-link-icon fa fa-users"></i>
                            <span class="nav-main-link-name">Users</span>
                        </a>
                    </li>
                @endcanany
            </ul>
        </div>
    </div>
</nav>
