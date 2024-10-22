<div class="pb-3">
    <x-badge.errors />

    <form wire:submit="save">

        <div class="mb-3">
            <label class="form-label" for="name">{{ __('Kategori Adı') }}</label>
            <input type="text" class="form-control" id="name" wire:model.live="name" placeholder="{{ __('Kategori') }}..">
            <p class="bg-body-light py-1 px-3 mt-2">
                {{ __('Slug') }}: {{ $slug }}
            </p>
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">{{ __('Kategori Açıklama') }}</label>
            <textarea id="keywords" rows="5" class="form-control" wire:model="description" placeholder="{{ __('Açıklama') }}..."></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="keywords">{{ __('Anahtar Kelimeler') }}</label>
            <textarea id="keywords" rows="2" class="form-control" wire:model="keywords" placeholder="{{ __('Anahtar kelimeleri virgül ile yazabilirsiniz') }}..."></textarea>
        </div>

        <div class="text-center">
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
