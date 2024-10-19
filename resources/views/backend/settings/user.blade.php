@extends('backend.layouts.app')

@section('content')
    <!-- block -->
    <div class="block block-rounded">
        <!-- block-header -->
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ $title }}</h3>
        </div>
        <!-- block-content -->
        <div class="block-content fs-sm">
            <!-- form -->
            <form class="js-validation" action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label" for="defaultRole">{{ __('Varsayılan Kullanıcı Yetkisi') }}</label>
                    <select id="defaultRole" class="form-control" name="settings[defaultRole]" required>
                        @foreach(\App\Models\Role::all() as $role)
                            <option value="{{ $role->id }}" @selected($role->id == settings()->get('defaultRole')?->value)>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                @can('settings:update')
                    <div class="mb-3 text-center py-2">
                        <button type="submit" class="btn btn-alt-primary px-4">
                            <i class="fa fa-save mx-2 fa-faw"></i> {{ __('Kaydet') }}
                        </button>
                    </div>
                @endcan
            </form>
            <!-- form -->

        </div>
        <!-- block-content -->
    </div>
    <!-- block -->
@endsection
