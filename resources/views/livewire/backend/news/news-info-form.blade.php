@php $metas = $this->getMetas(); @endphp
<div class="pb-3">
    <x-badge.errors/>

    <div class="row">
        <div class="col-lg-{{ count($metas) ? 6:12 }}">
            <form wire:submit="save">
                <div class="col-lg-12 mb-3">
                    <label class="form-label" for="infoTitle">{{ __('Dosya İsmi') }}</label>
                    <input type="text"
                           class="form-control"
                           id="infoTitle"
                           wire:model="infoTitle"
                           placeholder="{{ __('İsim') }}..">
                </div>
                <div class="mb-3" wire:ignore>
                    <label class="form-label" for="files">{{ $infoType->name() }}</label>
                    <input class="form-control"
                           type="file"
                           id="files"
                           wire:model="files"
                           accept="{{ $infoType->extensions() }}"
                           multiple>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-alt-primary px-4 mt-3" wire:loading.attr="disabled">
                        <div wire:loading.remove>
                            <i class="fa fa-fw fa-save me-1 opacity-50"></i> {{ __('Yükle') }}
                        </div>
                        <div wire:loading>
                            <i class="fa fa-fw fa-spinner fa-pulse mx-1" style="animation-duration: .5s"></i>
                        </div>
                    </button>
                </div>
            </form>
        </div>
        @if(count($metas))
            <div class="col-lg-6 mb-3">
                <h5 class="bg-body-light px-3 mb-1 py-2 fw-medium">{{ $this->infoType->name() }}</h5>
                <ul class="list-group">
                    @foreach($metas as $meta)
                        <a class="list-group-item list-group-item-action p-2" target="_blank" href="{{ asset($meta['file']) }}">
                            <i class="fa fa-fw fa-external-link mx-2"></i>
                            <span>{{ $meta['title'] }}</span>
                        </a>
                    @endforeach
                </ul>

            </div>
        @endif
    </div>

</div>
