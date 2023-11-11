@props([
    'member' => null
])
<div class="row mb-3">
    <div class="col-lg-12 mb-3">
        <label class="form-label" for="board_id">{{ __('board.table.board') }}</label>
        <select class="js-select2 form-select" name="board_id" required>
            <option value="">{{ __('enum.choose') }}</option>
            @foreach(repositories('board')->all() as $board)
                <option value="{{ $board->id }}" @selected(!empty($member) && $member->board_id == $board->id)>{{ $board->title_tr }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-12 mb-3">
        @if(!empty($member) && $member->photo)
            <span class="mb-2" id="preview"><x-images.avatar src="{{ $member->photo->url }}" /></span>
        @endif
        <label class="form-label" for="photo">{{ __('board.table.photo') }}</label>
        <input type="file" class="form-control" id="photo" name="photo" data-toggle="preview" data-target="#preview" accept="image/jpeg,image/png,image/jpg">
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="name">{{ __('board.table.name') }}</label>
        <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="{{ __('board.table.name') }}" value="{{ $member->name ?? '' }}" required>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="surname">{{ __('board.table.surname') }}</label>
        <input type="text" class="form-control" id="surname" name="surname" autocomplete="off" placeholder="{{ __('board.table.surname') }}" value="{{ $member->surname ?? '' }}">
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="mission_tr">{{ __('board.table.mission_tr') }}</label>
        <input type="text" class="form-control" id="mission_tr" name="mission_tr" autocomplete="off" placeholder="{{ __('board.table.mission_tr') }}" value="{{ $member->mission_tr ?? '' }}">
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="mission_en">{{ __('board.table.mission_en') }}</label>
        <input type="text" class="form-control" id="mission_en" name="mission_en" autocomplete="off" placeholder="{{ __('board.table.mission_en') }}" value="{{ $member->mission_en ?? '' }}">
    </div>
    <div class="col-lg-4 mb-3">
        <label class="form-label" for="grid">{{ __('board.table.grid') }}</label>
        <select class="form-select" id="grid" name="grid" required>
            <option value="">{{ __('enum.choose') }}</option>
            @foreach(cases('grid') as $grid)
                <option value="{{ $grid->value }}" @selected(!empty($member) && $member->grid->value == $grid->value)>{{ $grid->title() }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4 mb-3">
        <label class="form-label" for="sort">{{ __('board.table.sort') }}</label>
        <input type="number" min="1" class="form-control" id="sort" name="sort" autocomplete="off" placeholder="{{ __('board.table.sort') }}" value="{{ $member->sort ?? '1' }}" required>
    </div>
    <div class="col-lg-4 mb-3">
        <label class="form-label" for="status">{{ __('board.table.status') }}</label>
        <select class="form-select" id="status" name="status" required>
            <option value="">{{ __('enum.choose') }}</option>
            @foreach(cases('status') as $status)
                <option value="{{ $status->value }}" @selected((!empty($member) && $member->status->value == $status->value) || (empty($member) && $status->value == 1))>{{ $status->title() }}</option>
            @endforeach
        </select>
    </div>
</div>
