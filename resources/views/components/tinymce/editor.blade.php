@props([
    'id' => \Illuminate\Support\Str::slug($name ?? 'editor'),
    'name' => $name ?? 'editor',
    'placeholder' => $placeholder ?? __('İstenen içeri bu alana yazılabilir'),
    'value' => $value ?? '',
    'height' => intval($height ?? 500)
])
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/skins/ui/tinymce-5/content.min.css" />
    <style>
        .tox .tox-promotion {
            display: none !important;
        }
    </style>
@endpush

<textarea
    id="editor{{ $id }}"
    class="form-control tinymce"
    name="{{ $name }}"
    placeholder="{{ $placeholder }}"
>{!! $value !!}</textarea>

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/plugins/media/plugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/plugins/image/plugin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/plugins/help/js/i18n/keynav/tr.min.js"></script>
    <script>
        tinymce.init({
            license_key: 'gpl',
            selector: '#editor{{ $id }}',
            width: "100%",
            height: {{ $height }},
            resize: true,
            language_url: '{{ asset('backend/assets/langs/tinymce_tr.js') }}',
            language: '{{ app()->getLocale() }}',
            powerpaste_allow_local_images: true,
            toolbar_sticky: true,
            autosave_restore_when_empty: true,
            autosave_ask_before_unload: true,
            autosave_interval: '1s',
            image_caption: true,
            plugins: [
                'advlist', 'anchor', 'autolink',
                'image', 'lists', 'link', 'media', 'preview',
                'table', 'wordcount', 'quickbars', 'autosave'
            ],
            toolbar: 'restoredraft undo redo | bold italic fontfamily fontsize forecolor backcolor table alignleft aligncenter alignright alignjustify bullist numlist | link image',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            automatic_uploads: true,
            file_picker_types: 'image',
            setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            },
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
        });
    </script>
@endpush
