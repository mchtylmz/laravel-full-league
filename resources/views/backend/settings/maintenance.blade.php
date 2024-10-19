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
            <form class="js-validation" action="{{ route('admin.settings.store') }}" method="POST">

                <div class="mb-3">
                    <label class="form-label" for="maintenanceMode">{{ __('Bakım Modu') }}</label>
                    <select id="maintenanceMode" class="form-control" name="settings[maintenanceMode]">
                        <option value="0" @selected(0 == settings()->maintenanceMode)>{{ __('Kapalı') }}</option>
                        <option value="1" @selected(1 == settings()->maintenanceMode)>{{ __('Açık') }}</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="maintenanceModeContent">{{ __('Bakım Metni') }}</label>
                    <x-tinymce.editor
                        height="300"
                        name="settings[maintenanceModeContent]"
                        value="{{ settings()->maintenanceModeContent ?? '' }}" />
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
