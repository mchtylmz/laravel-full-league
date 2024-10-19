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
                    <label class="form-label" for="cookieStatus">{{ __('Çerez Politikası') }}</label>
                    <select id="cookieStatus" class="form-control" name="settings[cookieStatus]">
                        <option value="0" @selected(0 == settings()->cookieStatus)>{{ __('Kapalı') }}</option>
                        <option value="1" @selected(1 == settings()->cookieStatus)>{{ __('Açık') }}</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="cookieTitle">{{ __('Çerez Politikası Başlığı') }}</label>
                    <input type="text" class="form-control" id="cookieTitle" name="settings[cookieTitle]" placeholder="{{ __('Başlığı') }}.." value="{{ settings()->cookieTitle ?? '' }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="cookieBrief">{{ __('Çerez Politikası Kısa Açıklama') }}</label>
                    <textarea rows="2" class="form-control" id="cookieBrief" name="settings[cookieBrief]" placeholder="{{ __('Kısa Açıklama') }}..">{{ settings()->cookieBrief ?? '' }}</textarea>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="cookieApprove">{{ __('Onayla Metni') }}</label>
                            <input type="text" class="form-control" id="cookieApprove" name="settings[cookieApprove]" placeholder="{{ __('Onayla Metni') }}.." value="{{ settings()->cookieApprove ?? '' }}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="cookieReject">{{ __('Reddet Metni') }}</label>
                            <input type="text" class="form-control" id="cookieReject" name="settings[cookieReject]" placeholder="{{ __('Reddet Metni') }}.." value="{{ settings()->cookieReject ?? '' }}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="cookieConfig">{{ __('Tercihler/Yönet Metni') }}</label>
                            <input type="text" class="form-control" id="cookieConfig" name="settings[cookieConfig]" placeholder="{{ __('Tercihler/Yönet Metni') }}.." value="{{ settings()->cookieConfig ?? '' }}">
                        </div>
                    </div>
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
