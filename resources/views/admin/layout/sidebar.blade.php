<nav id="sidebar">
    <!-- Side Header -->
    <div class="content-header">
        <!-- Logo -->
        <a class="fw-semibold text-dual" href="{{ config('admin.prefix') }}">
            <span class="smini-visible">
              <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">
                    <img src="{{ assets()->admin(config('admin.logo')) }}" class="admin-logo"/>
                    <span class="mx-2">{{ config('app.name') }}</span>
                </span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close"
               href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ request()->routeIs('admin.home') ? 'active' : '' }}"
                       href="{{ config('admin.prefix') }}">
                        <i class="nav-main-link-icon fa fw-bold fa-home"></i>
                        <span class="nav-main-link-name">{{ __('menu.sidebar.home') }}</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon si si-energy"></i>
                        <span class="nav-main-link-name">Blocks</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="be_blocks_styles.html">
                                <span class="nav-main-link-name">Styles</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="be_blocks_options.html">
                                <span class="nav-main-link-name">Options</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="be_blocks_forms.html">
                                <span class="nav-main-link-name">Forms</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="be_blocks_themed.html">
                                <span class="nav-main-link-name">Themed</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="be_blocks_api.html">
                                <span class="nav-main-link-name">API</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
