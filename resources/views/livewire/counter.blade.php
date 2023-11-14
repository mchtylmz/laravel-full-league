<div>
    <h1>{{ $count }}</h1>

    <button wire:click="increment">+</button>

    <button wire:click="decrement">-</button>



    <hr>


    <input type="search" wire:change="change" placeholder="ara" name="deneme" />

    <hr>
    <input type="text" name="file" placeholder="file id" value="{{ $data_id }}">
<br><br>
    <form wire:submit="sec">
        @foreach($data as $d)
            <input type="radio" wire:model.live="data_id" name="data_id" value="{{ $d['a'] }}"> {{ $d['a'] }} <br>
        @endforeach
        <button type="submit">SEÇ
            <div wire:loading>
               loading
            </div>
        </button>
    </form>

</div>
