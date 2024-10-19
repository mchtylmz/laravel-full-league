<?php

namespace App\Livewire\Home;

use App\Enums\StatusEnum;
use App\Models\Exam;
use App\Models\Question;
use App\Models\User;
use Livewire\Component;

class Statistics extends Component
{
    public string $section;

    public array $data = [];

    public function mount(string $section): void
    {
        $this->section = $section;

        if (method_exists($this, $this->section)) {
            $this->{$this->section}();
        }
    }

    public function users(): void
    {
        $count = User::active()->count();

        $this->data = [
            'count' => $count,
            'icon' => 'fa fa-fw fa-users',
            'description' => __('Kayıtlı Kullanıcılar'),
            'footerText' => __('Tümünü Görüntüle'),
            'footerRoute' => route('admin.users.index'),
        ];
    }

    public function render()
    {
        return view('livewire.backend.home.statistics');
    }
}
