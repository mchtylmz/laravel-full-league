@props([
    'routeEdit' => '',
    'textEdit' => '',
    'routeDelete' => '',
    'textDelete' => '',
    'messageDelete' => __('enum.delete')
])
<div class="btn-group">
    <a href="{{ $routeEdit }}" class="btn btn-sm btn-alt-warning">
        <i class="fa fa-fw fa-pencil-alt"></i> {{ $textEdit }}
    </a>
    <button type="button" class="btn btn-sm btn-alt-danger" data-toggle="delete" data-route="{{ $routeDelete }}" data-message="{{ $messageDelete }}">
        <i class="fa fa-fw fa-times"></i> {{ $textDelete }}
    </button>
</div>
