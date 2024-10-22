<?php

namespace App\Livewire\News;

use App\Actions\Files\UploadFileAction;
use App\Actions\News\CreateOrUpdateNewsAction;
use App\Enums\LocaleEnum;
use App\Enums\StatusEnum;
use App\Enums\YesNoEnum;
use App\Models\Category;
use App\Models\News;
use App\Models\Season;
use App\Traits\CustomLivewireAlert;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class NewsForm extends Component
{
    use CustomLivewireAlert, WithFileUploads;

    public News $news;

    public int $season_id;
    public int $category_id;
    public string $title;
    public string $brief;
    public string $content;
    public string $keywords;
    public ?string $source = null;
    public $image;
    public string $published_at;
    public StatusEnum $status = StatusEnum::ACTIVE;
    public LocaleEnum $lang;
    public YesNoEnum $show_homepage = YesNoEnum::NO;

    public string $permission = 'news:add';

    public function mount(?News $news = null): void
    {
        $this->news = $news;

        if (!empty($this->news) && $this->news->exists) {
            $this->season_id = $this->news->season_id;
            $this->category_id = $this->news->category_id;
            $this->title = $this->news->title;
            $this->brief = $this->news->brief;
            $this->content = html_entity_decode($this->news->content);
            $this->keywords = $this->news->keywords;
            $this->status = $this->news->status;
            $this->lang = $this->news->lang;
            $this->show_homepage = $this->news->show_homepage;
            $this->published_at = $this->news->published_at->format('Y-m-d H:i');
            $this->source = $this->news->source;

            $this->permission = 'news:update';
        } else {
            $this->published_at = date('Y-m-d H:i');
        }

    }

    #[Computed]
    public function seasons(): \Illuminate\Database\Eloquent\Collection
    {
        if (!empty($this->news) && $this->news->exists) {
            return Season::all();
        }

        return Season::active()->get();
    }

    #[Computed]
    public function categories(): \Illuminate\Database\Eloquent\Collection
    {
        return Category::all();
    }

    public function rules(): array
    {
        return [
            'season_id' => 'required|integer|exists:seasons,id',
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string',
            'brief' => 'required|string',
            'content' => 'required|string',
            'keywords' => 'nullable|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image',
            'lang' => ['required', new Enum(LocaleEnum::class)],
            'status' => ['required', new Enum(StatusEnum::class)],
            'show_homepage' => ['required', new Enum(YesNoEnum::class)],
            'source' => 'nullable|string',
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'season_id' => __('Sezon'),
            'category_id' => __('Kategori'),
            'title' => __('Haber başlığı'),
            'brief' => __('Kısa açıklama'),
            'keywords' => __('Anahtar kelime'),
            'content' => __('Haber içeriği'),
            'published_at' => __('Yayın Zamanı'),
            'image' => __('Haber Görseli'),
            'lang' => __('Haber dili'),
            'show_homepage' => __('Anasayfa listeleme'),
            'status' => __('Durum'),
            'source' => __('Kaynak'),
        ];
    }

    public function save()
    {
        $this->validate();

        if (user()->cannot($this->permission)) {
            $this->message(__('Haber kayıt edilemez, yetkiniz bulunmuyor!'))->error();
            return false;
        }

        $data = [
            'season_id' => $this->season_id,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'brief' => $this->brief,
            'content' => htmlentities($this->content),
            'keywords' => $this->keywords ?? '',
            'status' => $this->status,
            'lang' => $this->lang,
            'show_homepage' => $this->show_homepage,
            'published_at' => Carbon::parse($this->published_at)->format('Y-m-d H:i:00'),
            'source' => $this->source ?? '',
        ];
        if ($this->image instanceof TemporaryUploadedFile) {
            $data['image'] = UploadFileAction::run(file: $this->image, folder: 'news');
        }

        CreateOrUpdateNewsAction::run(
            data: $data,
            news: !empty($this->news) && $this->news->exists ? $this->news: null
        );

        return redirect()->route('admin.news.index')->with([
            'status' => 'success',
            'message' => __('Haber kayıt edildi.')
        ]);
    }

    public function render()
    {
        return view('livewire.backend.news.news-form');
    }
}
