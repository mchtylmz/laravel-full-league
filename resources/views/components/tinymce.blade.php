@props([
    'selectors' => '.editor' // '.editor', // ['.editor1', '.editor2'],
])
@push('styles')
<style>
    .tox-promotion {display: none !important;}
</style>
@endpush
@push('scripts')
<<script src="{{ assets()->admin('js/plugins/tinymce/tinymce.min.js') }}"></script>
<script>
    const tinyOptions = {
        selector: 'textarea',
        plugins: 'quickbars autosave image anchor autolink link preview table searchreplace fullscreen',
        toolbar: 'undo redo searchreplace blocks bold italic alignleft aligncentre alignright alignjustify indent outdent bullist numlist | table link image | restoredraft fullscreen preview',
        a11y_advanced_options: true,
        file_picker_types: 'file image media',
        automatic_uploads: true,
        image_description: false,
        image_uploadtab: true,
        autosave_ask_before_unload: false,
        allow_unsafe_link_target: true,
        allow_html_in_named_anchor: true,
        allow_conditional_comments: true,
        table_default_attributes: {
            border: '1'
        },
        autosave_interval: '30s',
        link_default_target: '_blank',
        min_width: 500,
        hidden_input: false,
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
    };
</script>
@if(is_array($selectors))
@foreach($selectors as $selector)
<script>
    tinyOptions.selector = 'textarea.{{ $selector }}';
    tinymce.init(tinyOptions);
</script>
@endforeach
@else
<script>
    tinyOptions.selector = 'textarea.{{ $selectors }}';
    tinymce.init(tinyOptions);
</script>
@endif
@endpush
