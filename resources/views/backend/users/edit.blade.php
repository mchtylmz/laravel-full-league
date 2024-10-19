@extends('backend.layouts.app')

@section('content')
    <div class="block block-rounded">
        <ul class="nav nav-tabs nav-tabs-alt" role="tablist">
            <li class="nav-item" role="presentation">
                <a @class(['nav-link py-3', 'active' => $activeTab == 'user']) type="button" href="?tab=user">
                    <i class="fa fa-user-edit mx-1"></i> {{ __('Kullanıcı Bilgileri') }}
                </a>
            </li>
            @can('users:update-password')
                <li class="nav-item" role="presentation">
                    <a @class(['nav-link py-3', 'active' => $activeTab == 'password']) type="button" href="?tab=password">
                        <i class="fa fa-key mx-1"></i> {{ __('Parola Güncelle') }}
                    </a>
                </li>
            @endcan
            <li class="nav-item" role="presentation">
                <a @class(['nav-link py-3', 'active' => $activeTab == 'mailing']) type="button" href="?tab=mailing">
                    <i class="fa fa-info-circle mx-1"></i> {{ __('Bilgilendirme') }}
                </a>
            </li>
        </ul>

        <div class="block-content tab-content">
            <div class="tab-pane active show" tabindex="0">
                @includeIf(sprintf('backend.users.tab.%s', $activeTab), ['user' => $user])
            </div>
        </div>

    </div>

@endsection
