<?php

namespace App\Livewire;

use Livewire\Component;

class Events extends Component
{
    protected $listeners = [
        'runEvent' => 'run',
    ];

    public function run(string $event, mixed $data = null)
    {

    }

    public function render()
    {
        return view('livewire.events');
    }
}
