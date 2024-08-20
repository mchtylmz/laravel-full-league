<?php

namespace App\Livewire\Settings;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class DashboardForm extends Component
{
    use WithFileUploads;

    public array $settings;

    public $secenekler;

    public $selectedProvince = null;
    public $selectedDistrict = null;
    public $districts = [];

    // İl ve ilçe verileri
    public $provinces = [
        'Istanbul' => ['Kadıköy', 'Beşiktaş', 'Üsküdar'],
        'Ankara' => ['Çankaya', 'Keçiören', 'Mamak'],
        'Izmir' => ['Konak', 'Karşıyaka', 'Bornova'],
    ];

    public function mount()
    {

        $this->secenekler = [
            'a', 'b', 'c', 'd', 'e'
        ];
    }

    public function updatedSelectedProvince($province)
    {
        // İl seçildiğinde ilçe listesini güncelle ve seçili ilçeyi sıfırla
        if ($province && array_key_exists($province, $this->provinces)) {
            $this->districts = $this->provinces[$province];
            $this->selectedDistrict = null; // İl değiştiğinde seçili ilçeyi sıfırla
        } else {
            $this->districts = [];
            $this->selectedDistrict = null;
        }
    }

    public function updatedSettingsTest()
    {
        $this->secenekler = [
            'a', 'b'
        ];
    }


    public function updated($name, $value)
    {

        if ($name == 'settings.site_favicon') {
            $name = sprintf(
                '%s_%d-%s.%s',
                Str::slug(pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME)),
                date('YmdHi'),
                Str::random(2),
                $value->getClientOriginalExtension()
            );

            $filename = $value->storeAs(path: '', name: $name, options: 'public');

            $this->settings['site_favicon'] = 'uploads/'.$filename;
        }

        $this->values = [
            'a', 'b'
        ];

    }

    public function submit()
    {
        dd(
            request(),
            request()->all(),
            $this->settings
        );
    }

    public function render()
    {
        return livewire('settings.dashboard-form');
    }
}
