@props([
    'route',
    'columns',
    'size' => 25,
    'search' => true,
    'pagination' => 'server',
    'refresh' => true,
    'id' => 'bootstrap-table'
])

<div class="table-responsive pb-3">
    <table
        id="{{ $id }}"
        data-toggle="table"
        data-side-pagination="{{ $pagination }}"
        data-pagination="true"
        data-pagination-info="false"
        data-show-refresh="{{ $refresh }}"
        data-page-size="{{ $size }}"
        data-search="{{ $search }}"
        data-url="{{ $route }}"
        data-mobile-responsive="true">
        <thead>
        <tr>
            {{ $columns }}
        </tr>
        </thead>
    </table>
</div>

@push('styles')
<link href="{{ assets()->admin('js/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ assets()->admin('js/plugins/bootstrap-table/dist/bootstrap-table.js') }}"></script>
<script src="{{ assets()->admin('js/plugins/bootstrap-table/dist/extensions/mobile/bootstrap-table-mobile.min.js') }}"></script>
<script src="{{ assets()->admin('js/plugins/bootstrap-table/dist/locale/bootstrap-table-tr-TR.min.js') }}"></script>
<script>
    function setHtml(value, row) {
        eval('var html = row.' + this.field + '_html;');
        return html;
    }
    function setActions(value, row) {
        return row.actions;
    }
</script>
@endpush
