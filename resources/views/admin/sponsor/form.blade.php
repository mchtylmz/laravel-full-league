@props([
    'sponsor' => null
])
<div class="row mb-3">
    <div class="col-lg-12 mb-3">
        <label class="form-label" for="description">{{ __('sponsor.table.description') }}</label>
        <input type="text" class="form-control" id="description" name="description" autocomplete="off" placeholder="{{ __('sponsor.table.description') }}" value="{{ $sponsor->description ?? '' }}">
    </div>
    <div class="col-lg-12 mb-3">
        <label class="form-label" for="link">{{ __('sponsor.table.link') }}</label>
        <input type="url" class="form-control" id="link" name="link" autocomplete="off" placeholder="{{ __('sponsor.table.link') }}" value="{{ $sponsor->link ?? '' }}">
    </div>
    <div class="col-lg-12 mb-3">
        @if(!empty($sponsor) && $sponsor->photo)
            <div class="mb-2" id="preview"><x-images.full src="{{ $sponsor->photo->url }}" /></div>
        @endif
        <label class="form-label" for="photo">{{ __('sponsor.table.photo') }}</label>
        <input type="file" class="form-control" id="photo" name="photo" data-toggle="preview" data-target="#preview" accept="image/jpeg,image/png,image/jpg" @required(empty($sponsor))>
    </div>
    <div class="col-lg-4 mb-3">
        <label class="form-label" for="sort">{{ __('sponsor.table.sort') }}</label>
        <input type="number" min="1" class="form-control" id="sort" name="sort" autocomplete="off" placeholder="{{ __('sponsor.table.sort') }}" value="{{ $sponsor->sort ?? '' }}" required>
    </div>
    <div class="col-lg-4 mb-3">
        <label class="form-label" for="type">{{ __('sponsor.table.type') }}</label>
        <select class="form-select" id="type" name="type" required>
            <option value="">{{ __('enum.choose') }}</option>
            <option value="left" @selected(!empty($sponsor) && $sponsor->type == 'left')>{{ __('enum.left') }}</option>
            <option value="right" @selected(!empty($sponsor) && $sponsor->type == 'right')>{{ __('enum.right') }}</option>
        </select>
    </div>
    <div class="col-lg-4 mb-3">
        <label class="form-label" for="status">{{ __('sponsor.table.status') }}</label>
        <select class="form-select" id="status" name="status" required>
            <option value="">{{ __('enum.choose') }}</option>
            @foreach(cases('status') as $status)
                <option value="{{ $status->value }}" @selected((!empty($sponsor) && $sponsor->status->value == $status->value) || (empty($board) && $status->value == 1))>{{ $status->title() }}</option>
            @endforeach
        </select>
    </div>
</div>
