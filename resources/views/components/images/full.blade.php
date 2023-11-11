@props([
    'src'
])
<img src="{{ $src  }}" onerror="this.src='{{ assets()->uploads('no-img.png') }}'" class="w-full" style="max-height: 54px;"/>
