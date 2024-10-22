<?php

namespace App\Livewire\News;

use App\Actions\Files\UploadFileAction;
use App\Actions\News\UpdateNewsMetaAction;
use App\Enums\NewsInfoEnum;
use App\Models\News;
use App\Traits\CustomLivewireAlert;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewsInfoForm extends Component
{
    use WithFileUploads, CustomLivewireAlert;

    public News $news;
    public NewsInfoEnum $infoType = NewsInfoEnum::FILE;
    public string $infoTitle;
    public ?array $metas;

    public $files;

    public function mount(int $newsId, string $type): void
    {
        $this->news = News::find($newsId);
        $this->infoType = NewsInfoEnum::tryFrom($type);
    }

    #[Computed]
    public function getMetas()
    {
        return $this->metas = json_decode($this->news->getMeta($this->infoType->value), true) ?? [];
    }

    public function rules(): array
    {
        return [
            'infoTitle' => 'required|string',
            'files' => 'required',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'infoTitle' => __('Dosya ismi'),
            'files' => $this->infoType->name()
        ];
    }

    public function save()
    {
        $this->validate();

        if (user()->cannot('news:media')) {
            $this->message(__('Bilgi eklenemez, yetkiniz bulunmuyor!'))->error();
            return false;
        }

        foreach ($this->files as $file) {
            $this->metas[] = [
                'title' => $this->infoTitle,
                'file' => UploadFileAction::run(file: $file, folder:'news'),
                'date' => date('Y-m-d H:i'),
            ];
        }

        UpdateNewsMetaAction::run(
            news: $this->news,
            key: $this->infoType->value,
            data: $this->metas
        );

        $this->reset(['infoTitle', 'files']);

        $this->message(__('Bilgi Kayıt edildi'))->success();
        return true;
    }

    public function render()
    {
        return view('livewire.backend.news.news-info-form');
    }
}
