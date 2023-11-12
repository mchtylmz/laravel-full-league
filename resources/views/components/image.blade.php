@props([
    'src',
    'type' => 'avatar'
])
<img src="{{ $src  }}"
     onerror="this.src='{{ assets()->uploads('no-img.png') }}'"
     @style([
        'max-height: 60px;' => $type == 'full',
    ])
     @class([
        'img-avatar img-avatar48 img-avatar-thumb' => $type == 'avatar',
        'w-full' => $type == 'full',
        'img-avatar img-avatar128 img-avatar-rounded' => $type == 'large',
        'img-avatar img-avatar-thumb' => $type == 'profile',
        'img-avatar img-avatar96 img-avatar-rounded' => $type == 'thumb',
    ]) />
