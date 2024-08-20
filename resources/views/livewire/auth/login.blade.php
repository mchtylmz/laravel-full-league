<div class="login">
    <form class="js-validation-signin my-3 pb-3" wire:submit.prevent="submit" novalidate>
        @csrf

        <div class="py-3">
            <div class="form-group mb-3 position-relative">
                <div class="input-group">
                    <span class="input-group-text border-0">
                        <i class="fa fa-fw fa-user opacity-50"></i>
                    </span>
                    <input type="text"
                           class="form-control form-control-lg form-control-alt"
                           id="username"
                           wire:model.live="username"
                           placeholder="{{ __('Kullanıcı Adı') }}"
                           autocomplete="off"
                           required>
                    @error('username')
                    <div class="invalid-tooltip d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="input-group mb-3" x-data="{ show: false }">
                <span class="input-group-text border-0">
                    <i class="fa fa-fw fa-key opacity-50"></i>
                </span>
                <input :type="show ? 'text' : 'password'"
                       class="form-control form-control-lg form-control-alt"
                       id="password"
                       wire:model.live="password"
                       placeholder="{{ __('Parola') }} ****"
                       autocomplete="off"
                       required>
                <button type="button" class="btn btn-secondary" @click="show = !show">
                    <i :class="{'fa fa-fw fa-eye-slash': !show, 'fa fa-fw fa-eye': show }"></i>
                </button>
                @error('password')
                <div class="invalid-tooltip d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-xxl-5">
                <button type="submit" class="btn w-100 btn-alt-primary mb-3" wire:loading.attr="disabled">
                    <div wire:loading.remove>
                        <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> {{ __('Giriş Yap') }}
                    </div>

                    <div wire:loading>
                        <i class="fa fa-fw fa-spinner fa-pulse" style="animation-duration: 0.6s"></i>
                    </div>
                </button>
            </div>
        </div>
    </form>
</div>
