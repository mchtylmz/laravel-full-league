<div class="alert alert-warning fw-bold">
    <small>Parola en az 6 karakter olmalı. En az 1 harf ve rakam içermelidir.</small>
</div>

<div class="mb-3">
    <label class="form-label" for="password">{{ __('Yeni Parola') }}</label>
    <div class="input-group">
        <input type="text" class="form-control" id="password" placeholder="*******" name="password" minlength="6" autocomplete="off" required>
        <button type="button" class="btn btn-dark" data-toggle="password"><i class="fa fa-eye-slash mx-2"></i></button>
    </div>
</div>

<div class="mb-3">
    <label class="form-label" for="password_confirmation">{{ __('Yeni Parola (Tekrar)') }}</label>
    <div class="input-group">
        <input type="text" class="form-control" id="password_confirmation" placeholder="*******" name="password_confirmation" minlength="6" autocomplete="off" required>
        <button type="button" class="btn btn-dark" data-toggle="password"><i class="fa fa-eye-slash mx-2"></i></button>
    </div>
</div>
