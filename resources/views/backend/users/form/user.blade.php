@props([
    'action' => $action ?? 'insert',
    'roles' => \Spatie\Permission\Models\Role::all()
])
<div class="mb-3">
    <label class="form-label" for="name">{{ __('Ad Soyad') }}</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Ad Soyad') }}.."
           value="{{ $user->name ?? '' }}" @disabled(auth()->user()->cannot('users:update')) required>
</div>
<div class="mb-3">
    <label class="form-label" for="email">{{ __('E-posta Adresi') }}</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('E-posta Adresi') }}.."
           value="{{ $user->email ?? '' }}" @disabled(auth()->user()->cannot('users:update')) required>
</div>
<div class="mb-3">
    <label class="form-label" for="phone">{{ __('Telefon Numarası') }}</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('Telefon Numarası') }}.."
           value="{{ $user->phone ?? '' }}" @disabled(auth()->user()->cannot('users:update'))>
</div>

<div class="mb-3">
    <label class="form-label" for="role">{{ __('Kullanıcı Yetkisi') }}</label>
    <select id="role" class="form-control" name="role" @disabled(auth()->user()->cannot('users:update')) required>
        <option value="" hidden>{{ __('Kullanıcı Yetkisi Seçiniz') }}</option>
        @foreach($roles as $role)
            <option value="{{ $role->id }}" @selected(!empty($user) && $user->hasRole($role))>{{ $role->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Durum') }}</label>
    <div class="space-x-2">
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="radio" value="{{ \App\Enums\StatusEnum::ACTIVE }}" id="active" name="status" @checked(\App\Enums\StatusEnum::ACTIVE->is($user->status ?? \App\Enums\StatusEnum::ACTIVE)) @disabled(auth()->user()->cannot('users:update')) required>
            <label class="form-check-label" for="active">{{ __('Aktif') }}</label>
        </div>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="radio" value="{{ \App\Enums\StatusEnum::PASSIVE }}" id="passive" name="status" @checked(\App\Enums\StatusEnum::PASSIVE->is($user->status ?? '')) @disabled(auth()->user()->cannot('users:update')) required>
            <label class="form-check-label" for="passive">{{ __('Pasif') }}</label>
        </div>
    </div>
</div>
