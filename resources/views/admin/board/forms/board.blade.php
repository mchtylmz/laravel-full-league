@props([
    'board' => null
])
<div class="row mb-3">
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="title_tr">{{ __('board.table.title_tr') }}</label>
        <input type="text" class="form-control" id="title_tr" name="title_tr" autocomplete="off" placeholder="{{ __('board.table.title_tr') }}" value="{{ $board->title_tr ?? '' }}" required>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="title_en">{{ __('board.table.title_en') }}</label>
        <input type="text" class="form-control" id="title_en" name="title_en" autocomplete="off" placeholder="{{ __('board.table.title_en') }}" value="{{ $board->title_en ?? '' }}">
    </div>
    <div class="col-lg-12 mb-3">
        @if(!empty($board) && $board->photo)
            <div class="mb-2" id="preview"><x-images.large src="{{ $board->photo->url }}" /></div>
        @endif
        <label class="form-label" for="photo">{{ __('board.table.photo') }}</label>
        <input type="file" class="form-control" id="photo" name="photo" data-toggle="preview" data-target="#preview" accept="image/jpeg,image/png,image/jpg">
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="sort">{{ __('board.table.sort') }}</label>
        <input type="number" min="1" class="form-control" id="sort" name="sort" autocomplete="off" placeholder="{{ __('board.table.sort') }}" value="{{ $board->sort ?? '' }}" required>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="status">{{ __('board.table.status') }}</label>
        <select class="form-select" id="status" name="status" required>
            <option value="">{{ __('enum.choose') }}</option>
            @foreach(cases('status') as $status)
                <option value="{{ $status->value }}" @selected((!empty($board) && $board->status->value == $status->value) || (empty($board) && $status->value == 1))>{{ $status->title() }}</option>
            @endforeach
        </select>
    </div>
</div>
