<?php

namespace App\Traits;

use Jantinnerezo\LivewireAlert\LivewireAlert;

trait AlertTrait
{
    use LivewireAlert;

    public array $alertOptions = [
        'text' => '',
        'position' => 'center',
        'timer' => 3000,
        'toast' => false,
        'timerProgressBar' => true,
        'showCloseButton' => true,
    ];

    public function alertError(string $text): void
    {
        $this->alertOptions['text'] = $text;

        $this->alert(type: 'error', options: $this->alertOptions);
    }
}
