<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;
    public $data;
    public $data_id = '';

    public function __construct()
    {
        $this->data = [
            ['a' => 1],
            ['a' => 2],
            ['a' => 3]
        ];
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function change()
    {
        $this->data[] = ['a' => 4];
        $this->data[] = ['a' => 5];
        $this->data[] = ['a' => 6];
    }

    public function sec()
    {
        sleep(3);
    }

    public function render()
    {

        return view('livewire.counter');
    }
}
