<!-- user-password -->
@can('users:update-password')
<!-- form -->
<form class="js-validation" action="{{ route('admin.users.updatePassword', $user->id) }}" method="POST">

    @includeIf('backend.users.form.password', ['action' => 'update'])


    <div class="mb-3 text-center py-2">
        <button type="submit" class="btn btn-alt-primary px-4">
            <i class="fa fa-save mx-2 fa-faw"></i> {{ __('Parola Güncelle') }}
        </button>
    </div>
</form>
<!-- form -->
@endcan
<!-- /user-password -->
