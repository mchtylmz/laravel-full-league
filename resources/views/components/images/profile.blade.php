@props([
    'src'
])
<img src="{{ $src  }}" onerror="this.src='{{ assets()->uploads('no-img.png') }}'" class="img-avatar img-avatar-thumb"/>
