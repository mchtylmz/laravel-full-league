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
        if (method_exists($this, $event)) {
            $this->{$event}($data);
        }
    }

    public function render()
    {
        return view('livewire.events');
    }

    protected function darkMode(mixed $data): void
    {
        if (auth()->check()) {
            $darkMode = user()->getMeta('darkMode');
            user()->setMeta('darkMode', !$darkMode ? 1:0);
        }
    }
}
