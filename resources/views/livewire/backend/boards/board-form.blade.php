<div class="pb-3">
    <x-badge.errors />

    <form wire:submit="save">

        <div class="mb-3">
            <label class="form-label" for="sort">{{ __('Sıra') }}</label>
            <input type="number" min="1" class="form-control" id="sort" wire:model="sort" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="name">{{ __('Kurul Adı') }}</label>
            <input type="text" class="form-control" id="name" wire:model="name" placeholder="{{ __('Kurul') }}.."
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="status">{{ __('Durum') }}</label>
            <select id="status" class="form-control" wire:model="status" required>
                <option value="" hidden>{{ __('Seçiniz') }}</option>
                @foreach(\App\Enums\StatusEnum::options() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
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
