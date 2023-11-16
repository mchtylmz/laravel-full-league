@props([
    'post' => null
])

<div class="row">
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="season_id">{{ __('post.table.season') }}</label>
        <select class="js-select2 form-control" id="season_id" name="season_id" required>
            @foreach(repositories('season')->active() as $season)
                <option value="{{ $season->id }}" @selected($post->season_id == $season->id)>{{ $season->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="post_type_id">{{ __('post.table.type') }}</label>
        <select class="js-select2 form-control" id="post_type_id" name="post_type_id" required>
            <option value="">{{ __('enum.choose') }}</option>
            @foreach(repositories('post')->types() as $postType)
                <option value="{{ $postType->id }}" @selected($post && $post->post_type_id == $postType->id)>{{ $postType->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="photo">{{ __('post.table.photo') }}</label>
    <input type="file" class="form-control" id="photo" name="photo" data-toggle="preview" data-target="#preview"
           accept="image/jpeg,image/png,image/jpg">
</div>
<div class="mb-3">
    <label class="form-label" for="title">{{ __('post.table.title') }}</label>
    <input type="text" class="form-control" id="title" name="title" autocomplete="off"
           placeholder="{{ __('post.table.title') }}" value="{{ $post->title ?? '' }}" required>
</div>
<div class="mb-3">
    <label class="form-label" for="brief">{{ __('post.table.brief') }}</label>
    <textarea class="form-control" id="brief" rows="3" name="brief" autocomplete="off"
              placeholder="{{ __('post.table.brief') }}">{{ $post->brief ?? '' }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label" for="content">{{ __('post.table.content') }}</label>
    <textarea class="form-control editor" id="content" rows="3" name="content" autocomplete="off"
              placeholder="{{ __('post.table.content') }}" required>{{ $post->content ?? '' }}</textarea>
</div>

<hr>

<div class="row mb-3">
    <div class="col-lg-3 mb-3">
        <label class="form-label" for="single">{{ __('post.table.single') }}</label>
        <select class="js-select2 form-select" id="single" name="single">
            <option value="0" @selected($post && $post->single == '0')>{{ __('enum.choose') }}</option>
            <option value="1" @selected($post && $post->single == '1')>{{ __('post.table.single-small') }}</option>
            <option value="2" @selected($post && $post->single == '2')>{{ __('post.table.single-big') }}</option>
        </select>
    </div>
    <div class="col-lg-3 mb-3">
        <label class="form-label" for="home">{{ __('post.table.home') }}</label>
        <select class="js-select2 form-select" id="home" name="home">
            <option value="0" @selected($post && $post->home == '0')>{{ __('post.table.home-hide') }}</option>
            <option value="1" @selected($post && $post->home == '1')>{{ __('post.table.home-show') }}</option>
        </select>
    </div>
    <div class="col-lg-3 mb-3">
        <label class="form-label" for="sort">{{ __('post.table.sort') }}</label>
        <input type="number" min="1" max="999" class="form-control" id="sort" name="sort" autocomplete="off"
               placeholder="{{ __('post.table.sort') }}" value="{{ $news->sort ?? '1' }}" required>
    </div>
    <div class="col-lg-3 mb-3">
        <label class="form-label" for="lang">{{ __('post.table.lang') }}</label>
        <select class="js-select2 form-select" id="lang" name="lang">
            @foreach(cases('locale') as $locale)
                <option value="{{ $locale->value }}" @selected($post && $post->lang == $locale->value)>{{ $locale->title() }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="status">{{ __('post.table.status') }}</label>
        <select class="js-select2 form-select" id="status" name="status">
            @foreach(cases('status') as $status)
                <option value="{{ $status->value }}" @selected($post && $post->status == $status->value)>{{ $status->title() }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="published_at">{{ __('post.table.published_at') }}</label>
        <input type="text" class="js-flatpickr form-control" id="published_at" name="published_at"
               data-enable-time="true"
               data-time_24hr="true"
               {{ $attributes->merge(['data-min-date' => $post ? '' : 'today']) }}
               data-locale="tr"
               value="{{ date('Y-m-d H:i', $post ? strtotime($post->published_at) : time()) }}" required>
    </div>
</div>

<x-tinymce selectors="editor"/>
