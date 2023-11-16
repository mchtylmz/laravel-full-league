@props([
    'type' => 'default',
    'routeEdit' => '',
    'textEdit' => '',
    'routeDelete' => '',
    'textDelete' => '',
    'messageDelete' => __('enum.delete'),
    'post' => null
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
@if($type == 'post')
    <a href="{{ $routeView ?? '' }}" class="btn btn-sm btn-alt-primary mb-2">
        <i class="fa fa-fw fa-eye mx-1"></i> {{ __('enum.button.view') }}
    </a>
    <div class="dropdown">
        <button type="button" class="btn btn-sm btn-alt-secondary dropdown-toggle mb-2" data-bs-config='{"popperConfig":{"strategy":"fixed"}}' data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-list mx-1"></i> {{ __('enum.button.actions') }}
        </button>
        <div class="dropdown-menu fs-sm" aria-labelledby="dropdown-default-light">
            <a class="dropdown-item text-warning fw-bold" href="{{ route('admin.posts.update', $post->id) }}">
                <i class="fa fa-fw fa-pen mx-1"></i> {{ __('enum.button.edit') }}
            </a>
            <a class="dropdown-item" href="javascript:void(0)">
                <i class="fa fa-fw fa-images mx-1"></i> {{ __('enum.button.images') }}
            </a>
            <a class="dropdown-item" href="javascript:void(0)">
                <i class="fa fa-fw fa-file mx-1"></i> {{ __('enum.button.files') }}
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger fw-bold" href="javascript:void(0)"
               data-toggle="delete"
               data-route="{{ route('admin.posts.delete', $post->id) }}"
               data-message="{{ $messageDelete }}">
                <i class="fa fa-fw fa-times mx-1"></i> {{ __('enum.button.delete') }}
            </a>
        </div>
    </div>
@endif
