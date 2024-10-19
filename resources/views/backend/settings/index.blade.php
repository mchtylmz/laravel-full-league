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
                <!-- row -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="siteFavicon">{{ __('Site Favicon') }}</label>
                            <input type="file" class="dropify" id="siteFavicon" name="images[siteFavicon]"
                                   data-show-remove="false"
                                   data-show-errors="true"
                                   data-allowed-file-extensions="jpg png jpeg webp"
                                   data-max-file-size="3M"
                                   @if(!empty($siteFavicon)) data-default-file="{{ asset($siteFavicon) }}" @endif
                            />
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="siteLogo">{{ __('Site Logo') }}</label>
                            <input type="file" class="dropify" id="siteLogo" name="images[siteLogo]"
                                   data-show-remove="false"
                                   data-show-errors="true"
                                   data-allowed-file-extensions="jpg png jpeg webp"
                                   data-max-file-size="3M"
                                   @if(!empty($siteLogo)) data-default-file="{{ asset($siteLogo) }}" @endif
                            />
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="siteLogoWhite">{{ __('Site Beyaz Logo') }}</label>
                            <input type="file" class="dropify" id="siteLogoWhite" name="images[siteLogoWhite]"
                                   data-show-remove="false"
                                   data-show-errors="true"
                                   data-allowed-file-extensions="jpg png jpeg webp"
                                   data-max-file-size="3M"
                                   style="background: red"
                                   @if(!empty($siteLogoWhite)) data-default-file="{{ asset($siteLogoWhite) }}" @endif
                            />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label" for="siteTitle">{{ __('Site Başlığı') }}</label>
                            <input type="text" class="form-control" id="siteTitle" name="settings[siteTitle]" placeholder="{{ __('Site Başlığı') }}.." value="{{ $siteTitle }}" required>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label" for="siteDescription">{{ __('Site Açıklaması') }}</label>
                            <textarea rows="2" class="form-control" id="siteDescription" name="settings[siteDescription]" placeholder="{{ __('Site Açıklaması') }}..">{{ $siteDescription }}</textarea>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label" for="siteKeywords">{{ __('Site Anahtar Kelimeleri') }}</label>
                            <textarea rows="2" class="form-control" id="siteKeywords" name="settings[siteKeywords]" placeholder="{{ __('Site Anahtar Kelimeleri') }}..">{{ $siteKeywords }}</textarea>
                            <small>{{ __('Anahtar kelimeleri virgül ile ayırarak yazılabilir.') }}</small>
                        </div>
                    </div>

                </div>
                <!-- row -->

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
