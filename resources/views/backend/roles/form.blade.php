@props([
    'action' => $action ?? 'insert',
    'permissions' => \Spatie\Permission\Models\Permission::whereNotIn('name', \App\Enums\RoleTypeEnum::values())->get(),
])

<!-- row -->
<div class="row mb-3">

    <div class="col-lg-12">
        <div class="mb-3">
            <label class="form-label" for="name">{{ __('Yetki Adı') }}</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Yetki Adı') }}.."
                   value="{{ $role->name ?? '' }}" required>
        </div>
    </div>

    <div class="col-lg-12">
        <label class="form-label" for="permission">{{ __('Yetki Grubu') }}</label>
    </div>
    <!-- role type -->
    @foreach(\App\Enums\RoleTypeEnum::cases() as $name => $value)
        <div class="col-lg-3 mb-3">
            <div class="form-check form-block">
                <input class="form-check-input"
                       type="radio"
                       value="{{ $value }}"
                       id="role-type_{{ $name }}"
                       name="permissions[]"
                    @checked(!empty($role) && $role->hasPermissionTo($value)) required>
                <label class="form-check-label" for="role-type_{{ $name }}">
                    <i class="{{ $value->icon() }} opacity-75 mx-2"></i>
                    <span class="fw-bold">{{ $value->name() }}</span>
                </label>
            </div>
        </div>
    @endforeach
    <!-- role type -->

    <div class="col-lg-12">
        <label class="form-label mb-3" for="permission">{{ __('İşlem İzinleri') }}</label>
    </div>

    @foreach($permissions as $permission)
        <div class="col-lg-3 mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" value="{{ $permission->name }}"
                       id="permission_{{ $permission->name }}"
                       name="permissions[]"
                    @checked(!empty($role) && $role->hasPermissionTo($permission->name))>
                <label class="form-check-label" for="permission_{{ $permission->name }}">
                    {{ $permission->name }}
                </label>
            </div>
        </div>
    @endforeach

</div>
<!-- row -->
