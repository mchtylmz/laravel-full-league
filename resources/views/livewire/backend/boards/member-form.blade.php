<div class="pb-3">
    <x-badge.errors />

    <form wire:submit="save">

        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label" for="board_id">{{ __('Kurul') }}</label>
                    <select id="board_id" class="form-control" wire:model="memberBoardId" required>
                        <option value="" hidden>{{ __('Seçiniz') }}</option>
                        @foreach($this->boards() as $board)
                            <option value="{{ $board->id }}">{{ $board->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="sort">{{ __('Sıra') }}</label>
                    <input type="number" min="1" class="form-control" id="sort" wire:model="memberSort" required>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="mb-3">
                    <label class="form-label" for="name">{{ __('Üye Ad Soyad') }}</label>
                    <input type="text" class="form-control" id="name" wire:model="memberName" placeholder="{{ __('Üye') }}.."
                           required>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    <label class="form-label" for="title">{{ __('Görevi') }}</label>
                    <select id="title" class="form-control" wire:model="memberTitle" required>
                        <option value="" hidden>{{ __('Seçiniz') }}</option>
                        @foreach($this->titles() as $title)
                            <option value="{{ $title->id }}">{{ $title->name_tr }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-12 mb-3">
                <div class="form-group">
                    <label class="form-label" for="photo">{{ __('Fotpğraf') }}</label>
                    <input type="file" class="form-control" id="photo" wire:model="photo" accept=".jpg,.png,.jpeg,.webp">
                </div>
                @if(!empty($member) && $member->photo)
                    <div class="bg-body-light py-1">
                        <a class="text-dark" target="_blank" href="{{ asset($member->photo) }}">
                            <i class="fa fa-fw fa-external-link m-2"></i> {{ __('Fotoğrafı Görüntüle') }}
                        </a>
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="show_type">{{ __('Gösterim') }}</label>
                    <select id="show_type" class="form-control" wire:model="showType" required>
                        <option value="" hidden>{{ __('Seçiniz') }}</option>
                        @foreach($this->showTypes() as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="status">{{ __('Durum') }}</label>
                    <select id="status" class="form-control" wire:model="memberStatus" required>
                        <option value="" hidden>{{ __('Seçiniz') }}</option>
                        @foreach(\App\Enums\StatusEnum::options() as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

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
