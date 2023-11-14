@props([
    'news' => null
])
<div class="row">
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="season_id">{{ __('post.table.season') }}</label>
        <select class="js-select2 form-control" id="season_id" name="season_id" required>

            <option value="1">{{ __('enum.choose') }}</option>
        </select>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="post_type_id">{{ __('post.table.type') }}</label>
        <select class="js-select2 form-control" id="post_type_id" name="post_type_id" required>
            <option value="1">{{ __('enum.choose') }}</option>

        </select>
    </div>
</div>
<div class="mb-3">
    <label class="form-label" for="photo">{{ __('post.table.photo') }}</label>
    <input type="file" class="form-control" id="photo" name="photo" data-toggle="preview" data-target="#preview" accept="image/jpeg,image/png,image/jpg">
</div>
<div class="mb-3">
    <label class="form-label" for="title">{{ __('post.table.title') }}</label>
    <input type="text" class="form-control" id="title" name="title" autocomplete="off" placeholder="{{ __('post.table.title') }}" value="{{ $news->title ?? '' }}" required>
</div>
<div class="mb-3">
    <label class="form-label" for="brief">{{ __('post.table.brief') }}</label>
    <textarea class="form-control" id="brief" rows="3" name="brief" autocomplete="off" placeholder="{{ __('post.table.brief') }}">{{ $news->brief ?? '' }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label" for="content">{{ __('post.table.content') }}</label>
    <textarea class="form-control editor" id="content" rows="3" name="content" autocomplete="off" placeholder="{{ __('post.table.content') }}">{{ $news->brief ?? '' }}</textarea>
</div>

<hr>

<div class="row mb-3">
    <div class="col-lg-3 mb-3">
        <label class="form-label" for="single">{{ __('post.table.single') }}</label>
        <select class="js-select2 form-select" id="single" name="single">
            <option value="0">{{ __('enum.choose') }}</option>
            <option value="1">{{ __('post.table.single-small') }}</option>
            <option value="2">{{ __('post.table.single-big') }}</option>
        </select>
    </div>
    <div class="col-lg-3 mb-3">
        <label class="form-label" for="home">{{ __('post.table.home') }}</label>
        <select class="js-select2 form-select" id="home" name="home">
            <option value="1">{{ __('post.table.home-show') }}</option>
            <option value="0" selected>{{ __('post.table.home-hide') }}</option>
        </select>
    </div>
    <div class="col-lg-3 mb-3">
        <label class="form-label" for="sort">{{ __('post.table.sort') }}</label>
        <input type="number" min="1" max="999" class="form-control" id="sort" name="sort" autocomplete="off" placeholder="{{ __('post.table.sort') }}" value="{{ $news->sort ?? '1' }}" required>
    </div>
    <div class="col-lg-3 mb-3">
        <label class="form-label" for="lang">{{ __('post.table.lang') }}</label>
        <select class="js-select2 form-select" id="lang" name="lang">
            @foreach(cases('locale') as $locale)
                <option value="{{ $locale->value }}">{{ $locale->title() }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="status">{{ __('post.table.status') }}</label>
        <select class="js-select2 form-select" id="status" name="status">
            @foreach(cases('status') as $status)
                <option value="{{ $status->value }}">{{ $status->title() }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6 mb-3">
        <label class="form-label" for="published_at">{{ __('post.table.published_at') }}</label>
        <input type="text" class="js-flatpickr form-control" id="published_at" name="published_at" data-enable-time="true" data-time_24hr="true" data-min-date="today" data-locale="tr" value="{{ date('Y-m-d H:i', $news ? strtotime($news->published_at) : time()) }}" required>
    </div>
</div>

@push('styles')
<style>
    .tox .tox-promotion {
        display: none !important;
    }
</style>
@endpush
@push('scripts')
<script src="{{ assets()->admin('js/plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea.editor',  // change this value according to your HTML
            plugins: 'quickbars image anchor autolink link preview table searchreplace fullscreen',
            toolbar: 'undo redo searchreplace blocks bold italic alignleft aligncentre alignright alignjustify indent outdent bullist numlist | table link image | fullscreen preview',
            a11y_advanced_options: true,
            file_picker_types: 'file image media',
            automatic_uploads: true,
            image_description: false,
            image_uploadtab: true,
            link_default_target: '_blank',
            height: 540,
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.addEventListener('change', (e) => {
                    const file = e.target.files[0];
                    const reader = new FileReader();
                    reader.addEventListener('load', () => {
                        const id = 'blobid' + (new Date()).getTime();
                        const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(',')[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    });
                    reader.readAsDataURL(file);
                });
                input.click();
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
</script>
@endpush
