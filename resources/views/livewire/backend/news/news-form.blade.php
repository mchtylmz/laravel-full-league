<div class="pb-3">
    <x-badge.errors />

    <form wire:submit="save">

        <div class="row">
            <div class="col-lg-3 mb-3">
                <label class="form-label" for="season_id">{{ __('Sezon') }}</label>
                <select id="season_id" class="form-control" wire:model="season_id">
                    @foreach($this->seasons() as $season)
                        <option value="{{ $season->id }}">{{ $season->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-12 mb-3">
                <label class="form-label" for="title">{{ __('Haber Başlığı') }}</label>
                <input type="text" class="form-control" id="title" wire:model="title" placeholder="{{ __('Başlığı') }}..">
                <x-badge.error field="title" />
            </div>

            <div class="col-lg-7">
                <div class="mb-3" wire:ignore>
                    <label class="form-label" for="category_id">{{ __('Kategori') }}</label>
                    <select id="category_id"
                            class="form-control selectpicker"
                            data-live-search="true"
                            data-size="5"
                            wire:model="category_id">
                        <option value="" hidden>{{ __('Seçiniz') }}</option>
                        @foreach($this->categories() as $category)
                            <option value="{{ $category->id }}" @selected($category->id == $category_id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="brief">{{ __('Kısa Açıklama') }}</label>
                    <textarea id="brief"
                              rows="4"
                              class="form-control"
                              wire:model="brief"
                              placeholder="{{ __('Kısa Açıklama') }}..."></textarea>
                    <x-badge.error field="brief" />
                </div>
            </div>
            <div class="col-lg-5 mb-3" wire:ignore>
                <label class="form-label" for="image">{{ __('Haber Görseli') }}</label>
                <input type="file" class="dropify" id="image" wire:model="image"
                       data-show-remove="false"
                       data-show-errors="true"
                       data-allowed-file-extensions="jpg png jpeg webp"
                       accept=".jpg,.jpeg,.png,.webp"
                       data-max-file-size="3M"
                       @if(!empty($news->image)) data-default-file="{{ asset($news->image) }}" @endif
                />
            </div>
        </div>

        <x-badge.error field="content" class="bg-danger text-white mt-3 mb-1"/>
        <div class="mb-3" wire:ignore>
            <label class="form-label" for="content">{{ __('Haber İçeriği') }}</label>
            <x-tinymce.editor name="content" height="440" value="{{ $content }}" />
        </div>

        <div class="mb-3">
            <label class="form-label" for="keywords">{{ __('Anahtar Kelimeler') }}</label>
            <textarea id="keywords" rows="2" class="form-control" wire:model="keywords" placeholder="{{ __('Anahtar kelimeleri virgül ile yazabilirsiniz') }}..."></textarea>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-3" wire:ignore>
                <label class="form-label" for="published_at">{{ __('Paylaşım Zamanı') }}</label>
                <input type="text" class="js-flatpickr form-control" id="published_at" wire:model="published_at" data-enable-time="true" data-time_24hr="true" data-locale="{{ app()->getLocale() }}" value="{{ $published_at }}">
            </div>
            <div class="col-lg-2 mb-3">
                <label class="form-label" for="show_homepage">{{ __('Anasayfa Listeleme') }}</label>
                <select id="show_homepage" class="form-control" wire:model="show_homepage">
                    @foreach(\App\Enums\YesNoEnum::options() as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-3 mb-3">
                <label class="form-label" for="lang">{{ __('Haber Dili') }}</label>
                <select id="lang" class="form-control" wire:model="lang" required>
                    <option value="" hidden>{{ __('Seçiniz') }}</option>
                    @foreach(\App\Enums\LocaleEnum::options() as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-3 mb-3">
                <label class="form-label" for="status">{{ __('Durum') }}</label>
                <select id="status" class="form-control" wire:model="status" required>
                    <option value="" hidden>{{ __('Seçiniz') }}</option>
                    @foreach(\App\Enums\StatusEnum::options() as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="source">{{ __('Kaynak') }}</label>
            <input type="text" class="form-control" id="source" wire:model="source" placeholder="{{ __('Haber kaynağı varsa yazılaiblir') }}..">
        </div>

        <div class="text-center mt-3">
            <button type="submit" class="btn btn-alt-primary px-4 mt-3" wire:loading.attr="disabled">
                <div wire:loading.remove>
                    <i class="fa fa-fw fa-save me-1 opacity-50"></i> {{ __('Kaydet') }}
                </div>
                <div wire:loading>
                    <i class="fa fa-fw fa-spinner fa-pulse mx-1" style="animation-duration: .5s"></i>
                </div>
            </button>
        </div>
    </form>
</div>
