@props([
    'id' => rand(1, 100),
    'route' => '',
    'size' => 25
])

<div class="block block-rounded">
    <div class="block-content tab-content">
        <x-bootstrap-table
            id="files-table"
            data-show-custom-view="true"
            data-custom-view="customView"
            data-custom-view-default-view="true"
            refresh="false"
            size="{{ $size }}"
            route="{{ $route }}">
            <x-slot name="columns">
                <th data-field="url">{{ __('tool.files.file') }}</th>
                <th data-field="name">{{ __('tool.files.name') }}</th>
                <th data-field="updated_at">{{ __('tool.files.updated_at') }}</th>
                <th data-field="snippets">{{ __('tool.files.file') }}</th>
            </x-slot>
        </x-bootstrap-table>
        <template id="files-template">
            <div class="col-12 col-sm-4 mb-1 px-1">
                <div class="d-flex justify-content-between align-items-center py-1 my-1 border">
                    <div class="flex-shrink-0 me-3 ms-2 overlay-container overlay-left">
                        <x-image type="thumb" src="%IMAGE%"/>
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-semibold text-dark" style="word-break: break-all">%NAME%</div>
                        <div class="fs-sm text-muted">%UPDATED_AT%</div>
                    </div>
                    <div class="flex-grow-1 text-end">
                        <div class="btn-group me-2 mb-2" role="group">
                            <a type="button" target="_blank" href="%URL%" class="btn btn-sm btn-alt-primary">
                                <i class="fa fa-fw fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>

@push('styles')
    <style>
        button[name=customView] {
            display: none !important;
        }
    </style>
@endpush
@push('scripts')
    <script
        src="{{ assets()->admin('js/plugins/bootstrap-table/dist/extensions/custom-view/bootstrap-table-custom-view.js') }}"></script>
    <script>
        function customView(data) {
            let view = '',
                template = $('#files-template').html();

            $.each(data, function (index, row) {
                view += template
                    .replace('%NAME%', row.name)
                    .replace('%UPDATED_AT%', row.updated_at)
                    .replace('%IMAGE%', row.url)
                    .replace('%URL%', row.url);
            })

            return `<div class="row mx-0">${view}</div>`
        }
    </script>
@endpush
