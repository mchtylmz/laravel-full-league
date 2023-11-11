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
                       href="{{ route('admin.home') }}">
                        <i class="nav-main-link-icon fa fw-bold fa-home"></i>
                        <span class="nav-main-link-name">{{ __('menu.sidebar.home') }}</span>
                    </a>
                </li>

                @foreach(menus()->role(admin()->role()->slug) as $menu)
                    @if(!empty($menu->childs))
                        @php $childRoutes = collect($menu->childs)->pluck('route'); @endphp
                        <li class="nav-main-item {{ request()->routeIs($childRoutes) ? 'open' : ''}}">
                            <a class="nav-main-link nav-main-link-submenu {{ request()->routeIs($childRoutes) ? 'active' : '' }}" data-toggle="submenu" href="#{{ $menu->name }}">
                                <i @class(['nav-main-link-icon fw-bold', $menu->icon])></i>
                                <span class="nav-main-link-name">{{ __($menu->title) }}</span>
                            </a>
                            <ul class="nav-main-submenu">
                                @foreach($menu->childs as $child)
                                    <li class="nav-main-item">
                                        <a class="nav-main-link {{ request()->routeIs($child->route) ? 'active' : '' }}"
                                           href="{{ route($child->route) }}">
                                            <span class="nav-main-link-name">{{ __($child->title) }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ request()->routeIs($menu->route) ? 'active' : '' }}"
                               href="{{ route($menu->route) }}">
                                <i @class(['nav-main-link-icon fw-bold', $menu->icon])></i>
                                <span class="nav-main-link-name">{{ __($menu->title) }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
