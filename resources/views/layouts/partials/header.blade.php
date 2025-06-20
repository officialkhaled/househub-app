<header id="page-header">
    <div class="content-header">
        <!-- Left Section -->
        <div class="space-x-1">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Open Search Section -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-alt-secondary" data-toggle="layout" data-action="header_search_on">
                <i class="fa fa-fw opacity-50 fa-search"></i> <span class="ms-1 d-none d-sm-inline-block">Search</span>
            </button>
            <!-- END Open Search Section -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="space-x-1">
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{--                    <i class="fa fa-fw fa-user d-sm-none"></i>--}}
                    <div class="d-flex justify-content-between align-items-center gap-1">
                        <div class="d-flex justify-content-between align-items-center gap-2">
                            <img src="{{ auth()->user()->avatar ? storageAsset(auth()->user()->avatar) : asset('assets/media/avatars/avatar0.jpg') }}"
                                 alt="Logo Image" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%; border: 1px solid #d9d9d9">
                            <span class="d-none d-sm-inline-block">{{ auth()->user()->name }}</span>
                        </div>
                        <i class="fa fa-fw fa-angle-down opacity-50 ms-1 d-none d-sm-inline-block"></i>
                    </div>
                </button>
                <div class="dropdown-menu dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                    <div class="bg-primary-dark rounded-top fw-semibold text-white text-center p-3">
                        {{ auth()->user()->email }}
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            <i class="far fa-fw fa-user me-1"></i> Profile
                        </a>

                        {{--                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="#">--}}
                        {{--                            <span><i class="far fa-fw fa-envelope me-1"></i> Inbox</span>--}}
                        {{--                            <span class="badge bg-primary rounded-pill">3</span>--}}
                        {{--                        </a>--}}
                        {{--                        <a class="dropdown-item" href="#">--}}
                        {{--                            <i class="far fa-fw fa-file-alt me-1"></i> Invoices--}}
                        {{--                        </a>--}}

                        {{--                        <div role="separator" class="dropdown-divider"></div>--}}

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        {{--                        <a class="dropdown-item" href="#">--}}
                        {{--                            <i class="far fa-fw fa-building me-1"></i> Settings--}}
                        {{--                        </a>--}}
                        <!-- END Side Overlay -->

                        <div role="separator" class="dropdown-divider"></div>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button class="dropdown-item text-danger" type="submit">
                                <i class="far fa-fw fa-arrow-alt-circle-left me-1"></i> Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END User Dropdown -->
        </div>
        <!-- END Right Section -->
    </div>

    <div id="page-header-search" class="overlay-header bg-header-dark">
        <div class="bg-white-10">
            <div class="content-header">
                <form class="w-100" action="#" method="POST">
                    <div class="input-group">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-alt-primary" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                        <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-header-dark">
        <div class="bg-white-10">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-sun fa-spin text-white"></i>
                </div>
            </div>
        </div>
    </div>
</header>
