<!-- user-info -->
<!-- form -->
<form class="js-validation" action="{{ route('admin.users.update', $user->id) }}" method="POST"
      enctype="multipart/form-data">

    @includeIf('backend.users.form.user', ['action' => 'update', 'user' => $user])

    @can('users:update')
        <div class="mb-3 text-center py-2">
            <button type="submit" class="btn btn-alt-primary px-4" @disabled(auth()->user()->cannot('users:update'))>
                <i class="fa fa-save mx-2 fa-faw"></i> {{ __('Kaydet') }}
            </button>
        </div>
    @endcan
</form>
<!-- form -->

<hr>

<div class="mb-3">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            {{ __('Yetki Grubu') }} :
            @if($user->can(\App\Enums\RoleTypeEnum::ADMIN->value))
                {{ \App\Enums\RoleTypeEnum::ADMIN->name() }}
            @elseif($user->can(\App\Enums\RoleTypeEnum::INSTRUCTOR->value))
                {{ \App\Enums\RoleTypeEnum::INSTRUCTOR->name() }}
            @else
                {{ \App\Enums\RoleTypeEnum::USER->name() }}
            @endif
        </li>
        <li class="list-group-item">{{ __('Son Güncellenme Tarihi') }} : {{ $user->updated_at->format('Y-m-d H:i') }}</li>
        <li class="list-group-item">{{ __('Kayıt Tarihi') }} : {{ $user->created_at->format('Y-m-d H:i') }}</li>
    </ul>
</div>


<!-- /user-info -->
