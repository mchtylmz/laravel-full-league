<?php

namespace App\Livewire\Information;

use App\Enums\StatusEnum;
use App\Models\Information;
use App\Models\InformationType;
use App\Traits\CustomLivewireAlert;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Form extends Component
{
    use CustomLivewireAlert;

    public InformationType $informationType;
    public array $informations;

    public function mount(InformationType $informationType)
    {
        $this->informationType = $informationType;
        $this->informations = $this->getRows();
    }

    public function getRows(): array
    {
        $items = $this->informationType->informations()->latest()->get()->toArray();

        return collect($items)->sortBy('sort')->values()->toArray();
    }

    public function add()
    {
        $data = [
            'id' => 0,
            'sort' => 1,
            'code' => '',
            'short_name' => '',
            'name_tr' => '',
            'name_en' => '',
            'description_tr' => '',
            'description_en' => '',
            'status' => StatusEnum::ACTIVE
        ];


        $this->informations[] = $data;
        $this->informations = collect($this->informations)->sortBy('sort')->values()->toArray();
    }

    public function rules(): array
    {
        return [
            'informations.*.name_tr' => 'required|string',
            'informations.*.name_en' => 'nullable|string',
        ];
    }

    public function validationAttributes(): array
    {
        if (!empty($this->informationType) && $this->informationType->form == 'board') {
            return [
                'informations.*.name_tr' => __('Görev (TR)'),
                'informations.*.name_en' => __('Görev (EN)'),
            ];
        }

        return [
            'informations.*.name_tr' => __('Adı (TR)'),
            'informations.*.name_en' => __('Adı (EN)'),
        ];
    }

    public function save()
    {
        $this->validate();

        foreach ($this->informations as $index => $information) {
            $data = [
                'sort' => intval($information['sort']) ?: $index + 1,
                'code' => $information['code'] ?? '',
                'short_name' => $information['short_name'] ?? '',
                'name_tr' => $information['name_tr'],
                'name_en' => $information['name_en'] ?? '',
                'description_tr' => $information['description_tr'] ?? '',
                'description_en' => $information['description_en'] ?? '',
                'status' => $information['status'] ?? StatusEnum::ACTIVE,
            ];

            if (!empty($information['id'])) {
                $this->informationType->informations()->find($information['id'])->update($data);
            } else {
                $this->informationType->informations()->create($data);
            }
        }

        $this->informations = $this->getRows();
        $this->message(__('Bilgi kayıt edildi'))->success();
    }

    public function delete(int $index): void
    {
        if (!empty($this->informations[$index]['id'])) {
            $this->informationType->informations()->find($this->informations[$index]['id'])->delete();
        }
        unset($this->informations[$index]);

        $this->informations = array_values($this->informations);
        $this->message(__('İlgili satır silindi!'))->success();
    }

    public function render()
    {
        return view('livewire.backend.information.form');
    }
}
