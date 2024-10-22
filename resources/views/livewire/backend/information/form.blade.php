<div class="pb-3">
    <div class="mt-1">
        <button type="button" class="btn btn-alt-success px-4 mb-4" wire:click="add">
            <i class="fa fa-fw fa-plus me-1 opacity-50"></i> {{ __('Yeni Bilgi Ekle') }}
        </button>
    </div>

    <!-- {{ $this->informationType->form }} -->
    <form wire:submit="save">
        @foreach($informations as $index => $row)
            <div class="border pt-3 mb-1 px-2">
                @if($this->informationType->form == 'board')
                    <div class="row align-items-end px-3">
                        <div class="col-lg-4 mb-3 px-1">
                            <x-badge.error field="informations.{{ $index }}.name_tr" class="ps-0 mt-0 mb-1"/>
                            <label class="form-label" for="name_tr">{{ __('Görev (TR)') }} </label>
                            <input type="text"
                                   class="form-control"
                                   id="name_tr"
                                   wire:model="informations.{{ $index }}.name_tr">
                        </div>
                        <div class="col-lg-4 mb-3 px-1">
                            <x-badge.error field="informations.{{ $index }}.name_en" class="ps-0 mt-0 mb-1"/>
                            <label class="form-label" for="name_en">{{ __('Görev (EN)') }}</label>
                            <input type="text"
                                   class="form-control"
                                   id="name_en"
                                   wire:model="informations.{{ $index }}.name_en"
                                   placeholder="{{ __('Görev') }}..">
                        </div>
                        <div class="col-lg-2 mb-3 px-1">
                            <label class="form-label" for="sort">{{ __('Sıra') }}</label>
                            <input type="number"
                                   min="1"
                                   class="form-control"
                                   id="sort"
                                   wire:model="informations.{{ $index }}.sort">
                        </div>
                        <div class="col-lg-2 mb-3 px-1">
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-alt-primary px-3" wire:loading.attr="disabled">
                                    <div wire:loading.remove>
                                        <i class="fa fa-fw fa-save me-1 opacity-50"></i> {{ __('Kaydet') }}
                                    </div>
                                    <div wire:loading>
                                        <i class="fa fa-fw fa-spinner fa-pulse mx-1"
                                           style="animation-duration: .5s"></i>
                                    </div>
                                </button>
                                <button type="button"
                                        class="btn btn-alt-danger px-3"
                                        wire:confirm="{{ __('İlgili satır silinecektir, işleme devam edilsin mi?') }}"
                                        wire:click="delete({{ $index }})"
                                        wire:loading.attr="disabled">
                                    <i class="fa fa-fw fa-trash-alt me-1 opacity-50"></i> {{ __('Sil') }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                    @if($this->informationType->form == 'goal')
                        <div class="row align-items-end px-3">
                            <div class="col-lg-2 mb-3 px-1">
                                <label class="form-label" for="code">{{ __('Kodu') }}</label>
                                <input type="text"
                                       class="form-control"
                                       id="code"
                                       wire:model="informations.{{ $index }}.code">
                            </div>
                            <div class="col-lg-4 mb-3 px-1">
                                <x-badge.error field="informations.{{ $index }}.name_tr" class="ps-0 mt-0 mb-1"/>
                                <label class="form-label" for="name_tr">{{ __('Açıklama (TR)') }} </label>
                                <input type="text"
                                       class="form-control"
                                       id="name_tr"
                                       wire:model="informations.{{ $index }}.name_tr">
                            </div>
                            <div class="col-lg-4 mb-3 px-1">
                                <x-badge.error field="informations.{{ $index }}.name_en" class="ps-0 mt-0 mb-1"/>
                                <label class="form-label" for="name_en">{{ __('Açıklama (EN)') }}</label>
                                <input type="text"
                                       class="form-control"
                                       id="name_en"
                                       wire:model="informations.{{ $index }}.name_en"
                                       placeholder="{{ __('Açıklama') }}..">
                            </div>
                            <div class="col-lg-2 mb-3 px-1">
                                <div class="btn-group" role="group">
                                    <button type="submit" class="btn btn-alt-primary px-3" wire:loading.attr="disabled">
                                        <div wire:loading.remove>
                                            <i class="fa fa-fw fa-save me-1 opacity-50"></i> {{ __('Kaydet') }}
                                        </div>
                                        <div wire:loading>
                                            <i class="fa fa-fw fa-spinner fa-pulse mx-1"
                                               style="animation-duration: .5s"></i>
                                        </div>
                                    </button>
                                    <button type="button"
                                            class="btn btn-alt-danger px-3"
                                            wire:confirm="{{ __('İlgili satır silinecektir, işleme devam edilsin mi?') }}"
                                            wire:click="delete({{ $index }})"
                                            wire:loading.attr="disabled">
                                        <i class="fa fa-fw fa-trash-alt me-1 opacity-50"></i> {{ __('Sil') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($this->informationType->form == 'match-status')
                        <div class="row align-items-end px-3">
                            <div class="col-lg-2 mb-3 px-1">
                                <label class="form-label" for="code">{{ __('Kodu') }}</label>
                                <input type="text"
                                       class="form-control"
                                       id="code"
                                       wire:model="informations.{{ $index }}.code">
                            </div>
                            <div class="col-lg-4 mb-3 px-1">
                                <x-badge.error field="informations.{{ $index }}.name_tr" class="ps-0 mt-0 mb-1"/>
                                <label class="form-label" for="name_tr">{{ __('Açıklama (TR)') }} </label>
                                <input type="text"
                                       class="form-control"
                                       id="name_tr"
                                       wire:model="informations.{{ $index }}.name_tr">
                            </div>
                            <div class="col-lg-3 mb-3 px-1">
                                <x-badge.error field="informations.{{ $index }}.status" class="ps-0 mt-0 mb-1"/>
                                <label class="form-label" for="status">{{ __('Durum') }}</label>
                                <select id="status" class="form-control" wire:model="informations.{{ $index }}.status">
                                    <option value="" hidden>{{ __('Seçiniz') }}</option>
                                    @foreach(\App\Enums\StatusEnum::options() as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2 mb-3 px-1">
                                <div class="btn-group" role="group">
                                    <button type="submit" class="btn btn-alt-primary px-3" wire:loading.attr="disabled">
                                        <div wire:loading.remove>
                                            <i class="fa fa-fw fa-save me-1 opacity-50"></i> {{ __('Kaydet') }}
                                        </div>
                                        <div wire:loading>
                                            <i class="fa fa-fw fa-spinner fa-pulse mx-1"
                                               style="animation-duration: .5s"></i>
                                        </div>
                                    </button>
                                    <button type="button"
                                            class="btn btn-alt-danger px-3"
                                            wire:confirm="{{ __('İlgili satır silinecektir, işleme devam edilsin mi?') }}"
                                            wire:click="delete({{ $index }})"
                                            wire:loading.attr="disabled">
                                        <i class="fa fa-fw fa-trash-alt me-1 opacity-50"></i> {{ __('Sil') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif

                @if($this->informationType->form == 'club-form')
                    <div class="row align-items-end px-3">
                        <div class="col-lg-5 mb-3 px-1">
                            <x-badge.error field="informations.{{ $index }}.name_tr" class="ps-0 mt-0 mb-1"/>
                            <label class="form-label" for="name_tr">{{ __('Açıklama') }} </label>
                            <input type="text"
                                   class="form-control"
                                   id="name_tr"
                                   wire:model="informations.{{ $index }}.name_tr">
                        </div>
                        <div class="col-lg-3 mb-3 px-1">
                            <x-badge.error field="informations.{{ $index }}.status" class="ps-0 mt-0 mb-1"/>
                            <label class="form-label" for="status">{{ __('Durum') }}</label>
                            <select id="status" class="form-control" wire:model="informations.{{ $index }}.status">
                                <option value="" hidden>{{ __('Seçiniz') }}</option>
                                @foreach(\App\Enums\StatusEnum::options() as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3 px-1">
                            <label class="form-label" for="sort">{{ __('Sıra') }}</label>
                            <input type="number"
                                   min="1"
                                   class="form-control"
                                   id="sort"
                                   wire:model="informations.{{ $index }}.sort">
                        </div>
                        <div class="col-lg-2 mb-3 px-1">
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-alt-primary px-3" wire:loading.attr="disabled">
                                    <div wire:loading.remove>
                                        <i class="fa fa-fw fa-save me-1 opacity-50"></i> {{ __('Kaydet') }}
                                    </div>
                                    <div wire:loading>
                                        <i class="fa fa-fw fa-spinner fa-pulse mx-1"
                                           style="animation-duration: .5s"></i>
                                    </div>
                                </button>
                                <button type="button"
                                        class="btn btn-alt-danger px-3"
                                        wire:confirm="{{ __('İlgili satır silinecektir, işleme devam edilsin mi?') }}"
                                        wire:click="delete({{ $index }})"
                                        wire:loading.attr="disabled">
                                    <i class="fa fa-fw fa-trash-alt me-1 opacity-50"></i> {{ __('Sil') }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </form>
    <!-- /{{ $this->informationType->form }} -->

</div>
