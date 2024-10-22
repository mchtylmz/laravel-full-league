<ul class="nav-main">
    <li class="nav-main-item">
        <a @class(['nav-main-link', 'active' => request()->routeIs('admin.home.*')])
           href="{{ route('admin.home.index') }}">
            <i class="nav-main-link-icon fa fa-home"></i>
            <span class="nav-main-link-name">{{ __('Anasayfa') }}</span>
        </a>
    </li>

    @canany(['news:view', 'category:view'])
        <li class="nav-main-heading">{{ __('Haberler') }}</li>
        <li @class(['nav-main-item', 'open' => request()->routeIs('admin.news.*')])>
            <a @class(['nav-main-link nav-main-link-submenu', 'active' => request()->routeIs('admin.news.*')]) data-toggle="submenu"
               aria-haspopup="true" aria-expanded="false" href="javascript:;">
                <i class="nav-main-link-icon fa fa-newspaper"></i>
                <span class="nav-main-link-name">{{ __('Haberler') }}</span>
            </a>

            <ul class="nav-main-submenu">
                @can('category:view')
                    <li class="nav-main-item">
                        <a @class(['nav-main-link', 'active' => request()->routeIs('admin.news.category')])
                           href="{{ route('admin.news.category') }}">
                            <span class="nav-main-link-name">{{ __('Kategoriler') }}</span>
                        </a>
                    </li>
                @endcan
                @can('news:view')
                    <li class="nav-main-item">
                        <a @class(['nav-main-link', 'active' => request()->routeIs('admin.news.index')])
                           href="{{ route('admin.news.index') }}">
                            <span class="nav-main-link-name">{{ __('Haberler') }}</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcanany

    @canany(['information:view'])
        <li class="nav-main-heading">{{ __('Bilgi Girişi') }}</li>
        <li class="nav-main-item">
            <a @class(['nav-main-link', 'active' => request()->routeIs('admin.information.*')])
               href="{{ route('admin.information.index') }}">
                <i class="nav-main-link-icon fa fa-circle-info"></i>
                <span class="nav-main-link-name">{{ __('Bilgi Girişleri') }}</span>
            </a>
        </li>

        <li class="nav-main-item">
            <a @class(['nav-main-link', 'active' => request()->routeIs('admin.boards.*')])
               href="{{ route('admin.boards.index') }}">
                <i class="nav-main-link-icon fa fa-user-friends"></i>
                <span class="nav-main-link-name">{{ __('Kurullar') }}</span>
            </a>
        </li>
    @endcanany

    @canany(['users:view', 'instructor:view', 'admin:view', 'roles:view'])
        <li class="nav-main-heading">{{ __('Kullanıcı İşlemleri') }}</li>
        @can('users:view')
            <li @class(['nav-main-item', 'open' => request()->routeIs('admin.users.*')])>
                <a @class(['nav-main-link nav-main-link-submenu', 'active' => request()->routeIs('admin.users.*')]) data-toggle="submenu"
                   aria-haspopup="true" aria-expanded="false" href="javascript:;">
                    <i class="nav-main-link-icon fa fa-users"></i>
                    <span class="nav-main-link-name">{{ __('Kullanıcılar') }}</span>
                </a>

                <ul class="nav-main-submenu">
                    @can('users:add')
                        <li class="nav-main-item">
                            <a @class(['nav-main-link', 'active' => request()->routeIs('admin.users.create')])
                               href="{{ route('admin.users.create') }}">
                                <span class="nav-main-link-name">{{ __('Yeni Kullancıı Ekle') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('users:view')
                        <li class="nav-main-item">
                            <a @class(['nav-main-link', 'active' => request()->routeIs('admin.users.index')])
                               href="{{ route('admin.users.index') }}">
                                <span class="nav-main-link-name">{{ __('Kullanıcılar') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @can('roles:view')
            <li class="nav-main-item">
                <a @class(['nav-main-link', 'active' => request()->routeIs('admin.roles.*')])
                   href="{{ route('admin.roles.index') }}">
                    <i class="nav-main-link-icon si si-lock"></i>
                    <span class="nav-main-link-name">{{ __('Yetkiler') }}</span>
                </a>
            </li>
        @endcan
    @endcanany

    @can('settings:view')
        <li class="nav-main-heading">{{ __('Ayarlar') }}</li>
        <li @class(['nav-main-item', 'open' => request()->routeIs('admin.settings.*')])>
            <a @class(['nav-main-link nav-main-link-submenu', 'active' => request()->routeIs('admin.settings.*')]) data-toggle="submenu"
               aria-haspopup="true" aria-expanded="false" href="javascript:;">
                <i class="nav-main-link-icon si si-settings"></i>
                <span class="nav-main-link-name">{{ __('Ayarlar') }}</span>
            </a>

            <ul class="nav-main-submenu">
                <li class="nav-main-item">
                    <a @class(['nav-main-link', 'active' => request()->routeIs('admin.settings.index')])
                       href="{{ route('admin.settings.index') }}">
                        <span class="nav-main-link-name">{{ __('Site Ayarları') }}</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a @class(['nav-main-link', 'active' => request()->routeIs('admin.settings.user')])
                       href="{{ route('admin.settings.user') }}">
                        <span class="nav-main-link-name">{{ __('Kullanıcı Ayarları') }}</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a @class(['nav-main-link', 'active' => request()->routeIs('admin.settings.contact')])
                       href="{{ route('admin.settings.contact') }}">
                        <span class="nav-main-link-name">{{ __('İletişim Ayarları') }}</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a @class(['nav-main-link', 'active' => request()->routeIs('admin.settings.cookieConsent')])
                       href="{{ route('admin.settings.cookieConsent') }}">
                        <span class="nav-main-link-name">{{ __('Çerez Politikası') }}</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a @class(['nav-main-link', 'active' => request()->routeIs('admin.settings.maintenance')])
                       href="{{ route('admin.settings.maintenance') }}">
                        <span class="nav-main-link-name">{{ __('Bakım Modu') }}</span>
                    </a>
                </li>
            </ul>
        </li>
    @endcan

</ul>
