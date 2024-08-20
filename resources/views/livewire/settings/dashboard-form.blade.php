<div>ss
    <div>
        <!-- İl seçimi -->
        <label for="province">İl Seçin:</label>
        <select id="province" class="selectpicker" wire:model.live="selectedProvince">
            <option value="">Bir il seçin</option>
            @foreach(array_keys($provinces) as $province)
                <option value="{{ $province }}" @selected($selectedProvince == $province)>{{ $province }}</option>
            @endforeach
        </select>

        <!-- İlçe seçimi -->
        <label for="district">İlçe Seçin:</label>
        <select id="district" class="selectpicker" wire:model.live="selectedDistrict" {{ empty($districts) ? 'disabled' : '' }}>
            <option value="">Bir ilçe seçin</option>
            @foreach($districts as $district)
                <option value="{{ $district }}">{{ $district }}</option>
            @endforeach
        </select>

        <!-- Seçim sonuçları -->
        <p>Seçilen İl: {{ $selectedProvince ?? '' }}</p>
        <p>Seçilen İlçe: {{ $selectedDistrict ?? ''}}</p>
    </div>


    <form class="js-validation-signin my-3 pb-3" wire:submit="submit" novalidate>
        @csrf


    <div class="mb-3" wire:ignore>
        <label class="form-label" for="site_favicon">Site Favicon</label>
        <input type="file" class="dropify" id="site_favicon" wire:model.live="settings.site_favicon"
               data-show-remove="false"
               data-show-errors="true"
               data-allowed-file-extensions="jpg png jpeg"
               data-max-file-size="3M"
               data-default-file="{{ !empty($settings['site_favicon']) ? asset($settings['site_favicon']) : '' }}"
        />
    </div>

        {{ $settings['site_favicon'] ?? '' }}





    <div class="mb-3" wire:ignore>
        <label class="form-label" for="site_title">Site Başlığı</label>
        <select class="selectpicker" wire:model.live="settings.test" data-live-search="true">
            <option>Mustard</option>
            <option>Ketchup</option>
            <option>Relish</option>
            <option value="1">1</option>
        </select>

    </div>


    <div class="mb-3">
        <label class="form-label" for="site_title">Site Başlığı</label>
        <input type="text" class="form-control" id="site_title" wire:model.live="settings.site_title" placeholder="Başlığı..">
    </div>

        <div class="mb-3">
            <label class="form-label" for="site_title">Site Başlığı222</label>
            <select class="selectpicker" wire:model.live="settings.test2" data-live-search="true">

                @foreach($secenekler as $value)
                    <option @selected(!empty($settings['test2']) && $settings['test2'] == $value)>{{ $value }}</option>
                @endforeach
            </select>

        </div>

    <div class="mb-3">
        <label class="form-label" for="site_title">Site Başlığı</label>
        <select wire:model.live="settings.site_title2">
            <option>adasds</option>
            <option>adasds2</option>
            <option>adasds23</option>
        </select>
    </div>


        <div class="row justify-content-center">
            <div class="col-lg-6 col-xxl-5">
                <button type="submit" class="btn w-100 btn-alt-primary mb-3">
                    <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> {{ __('Giriş Yap') }}

                    <div wire:loading>
                        <i class="fa fa-fw fa-spinner fa-pulse" style="animation-duration: 0.6s"></i>
                    </div>
                </button>
            </div>
        </div>

    </form>


    {{ json_encode($settings) }}
    {{ json_encode($selectedProvince) }}
    {{ json_encode($districts) }}
</div>
