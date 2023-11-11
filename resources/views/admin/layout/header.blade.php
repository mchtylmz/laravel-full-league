<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Search Form (visible on larger screens) -->
            <div class="d-none d-md-inline-block">
                @yield('title')
            </div>
            <!-- END Search Form -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center">
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block ms-2">
                <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-user mx-1"></i>
                    <span class="d-inline-block ms-2">{{ admin()->name }}</span>
                    <i class="fa fa-fw fa-angle-down d-inline-block opacity-50 ms-1 mt-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                    <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                        <p class="mt-2 mb-0 fw-medium">{{ admin()->name }}</p>
                        <p class="mb-0 text-muted fs-sm fw-medium">{{ admin()->role()?->name }}</p>
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('admin.profile') }}">
                            <span class="fs-sm fw-medium">{{ __('menu.user.profile') }}</span>
                        </a>
                    </div>
                    <div role="separator" class="dropdown-divider m-0"></div>
                    <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('admin.logout') }}">
                                <span class="fs-sm fw-medium">
                                    <i class="fa fa-fw fa-sign-out-alt me-2"></i>
                                    {{ __('auth.logout.title') }}
                                </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END User Dropdown -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->
</header>
