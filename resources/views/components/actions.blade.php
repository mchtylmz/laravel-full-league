@props([
    'type' => 'default',
    'routeEdit' => '',
    'textEdit' => '',
    'routeDelete' => '',
    'textDelete' => '',
    'messageDelete' => __('enum.delete')
])
@if($type == 'default')
    <div class="btn-group">
        @if($routeEdit)
            <a href="{{ $routeEdit }}" class="btn btn-sm btn-alt-warning">
                <i class="fa fa-fw fa-pencil-alt"></i> {{ $textEdit }}
            </a>
        @endif
        @if($routeDelete)
            <button type="button" class="btn btn-sm btn-alt-danger" data-toggle="delete" data-route="{{ $routeDelete }}"
                    data-message="{{ $messageDelete }}">
                <i class="fa fa-fw fa-times"></i> {{ $textDelete }}
            </button>
        @endif
    </div>
@endif
