<?php

namespace App\Livewire\News;

use App\Enums\LocaleEnum;
use App\Enums\StatusEnum;
use App\Enums\YesNoEnum;
use App\Models\Category;
use App\Models\Role;
use App\Models\Season;
use App\Traits\CustomLivewireAlert;
use App\Traits\LivewireTableConfigure;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\News;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\CountColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectDropdownFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class NewsTable extends DataTableComponent
{
    use CustomLivewireAlert, LivewireTableConfigure;

    protected $model = News::class;

    public function mount(): void
    {
        $this->setFilter('season_id', Season::first()->id);
        $this->setSortDesc('published_at');
    }

    public function filters(): array
    {
        return [
            SelectFilter::make(__('Haber Dili'), 'lang')
                ->options(['' => __('Tümü'), ...LocaleEnum::options()])
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('news.lang', $value);
                }),

            SelectFilter::make(__('Sezon'), 'season_id')
                ->options(
                    Season::latest()
                        ->get()
                        ->keyBy('id')
                        ->map(fn($item) => $item->name)
                        ->toArray()
                )
                ->filter(function(Builder $builder, int $value) {
                    $builder->where('news.season_id', $value);
                }),

            MultiSelectDropdownFilter::make(__('Kategoriler'))
                ->options(
                    Category::orderBy('name')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($item) => $item->name)
                        ->toArray()
                )
                ->filter(function(Builder $builder, array $value) {
                    $builder->whereIn('news.category_id', $value);
                }),

            SelectFilter::make(__('Durum'), 'status')
                ->options(['' => __('Tümü'), ...StatusEnum::options()])
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('news.status', $value);
                }),

            SelectFilter::make(__('Anasayfa Listeleme'), 'show_homepage')
                ->options(['' => __('Tümü'), ...YesNoEnum::options()])
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('news.show_homepage', $value);
                }),

            DateRangeFilter::make(__('Yayın Tarihi'))
                ->config([
                    'placeholder' => __('Tarih Seçiniz'),
                    'locale' => app()->getLocale(),
                ])
                ->filter(function (Builder $builder, array $dateRange) { // Expects an array.
                    $builder
                        ->whereDate('news.published_at', '>=', $dateRange['minDate'])
                        ->whereDate('news.published_at', '<=', $dateRange['maxDate']);
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->hideIf(true),
            Column::make(__('Dil'), "lang")
                ->format(fn($value) => $value->name())
                ->sortable(),
            ImageColumn::make(__('Görsel'), 'image')
                ->location(fn($row) => asset($row->image))
                ->attributes(fn($row) => [
                    'class' => 'img-avatar img-avatar-thumb img-avatar-rounded',
                    'alt' => $row->title,
                ]),
            Column::make(__('Kategori'), "category.name")
                ->searchable()
                ->sortable(),
            Column::make(__('Başlık'), "title")
                ->searchable()
                ->sortable(),
            Column::make(__('Görüntüleme'), "hits")
                ->sortable(),
            ComponentColumn::make(__('Durum'), "status")
                ->collapseOnMobile()
                ->component('table.status')
                ->attributes(fn ($value, $row, Column $column) => [
                    'type' => $value->class(),
                    'label' => $value->name(),
                ])
                ->searchable()
                ->sortable(),
            Column::make(__('Yayın Tarihi'), "published_at")
                ->format(fn($value) => $value->isoFormat('D MMMM Y HH:mm'))
                ->sortable()
        ];
    }

    public function appendColumns(): array
    {
        $actionButtons = [
            LinkColumn::make(__('Görüntüle'))
                ->title(fn($row) => sprintf('<i class="fa fa-eye mx-1"></i> %s', __('Görüntüle')))
                ->location(fn($row) => route('admin.news.index', $row->id))
                ->attributes(fn($row) => ['class' => 'dropdown-item text-info'])
                ->html(),
        ];

        if (request()?->user()->can('news:media')) {
            $actionButtons[] = LinkColumn::make(__('Dosya'))
                ->title(fn($row) => sprintf('<i class="fa fa-file mx-1"></i> %s', __('Dosya(lar)')))
                ->location(fn($row) => 'javascript:void(0)')
                ->attributes(fn($row) => [
                    'class' => 'dropdown-item text-dark',
                    'wire:click' => 'showInfoModal('.$row->id.', \'file\')'
                ])
                ->html();
            $actionButtons[] = LinkColumn::make(__('Resim'))
                ->title(fn($row) => sprintf('<i class="fa fa-images mx-1"></i> %s', __('Resim / Fotoğraf')))
                ->location(fn($row) => 'javascript:void(0)')
                ->attributes(fn($row) => [
                    'class' => 'dropdown-item text-dark',
                    'wire:click' => 'showInfoModal('.$row->id.', \'image\')'
                ])
                ->html();
            $actionButtons[] = LinkColumn::make(__('Video'))
                ->title(fn($row) => sprintf('<i class="fa fa-video mx-1"></i> %s', __('Video')))
                ->location(fn($row) => 'javascript:void(0)')
                ->attributes(fn($row) => [
                    'class' => 'dropdown-item text-dark',
                    'wire:click' => 'showInfoModal('.$row->id.', \'video\')'
                ])
                ->html();
        }

        if (request()?->user()->can('news:update')) {
            $actionButtons[] = LinkColumn::make(__('Düzenle'))
                ->title(fn($row) => sprintf('<i class="fa fa-pen mx-1"></i> %s', __('Düzenle')))
                ->location(fn($row) => route('admin.news.edit', $row->id))
                ->attributes(fn($row) => [
                    'class' => 'dropdown-item text-warning fw-medium',
                ])
                ->html();
        }

        if (request()?->user()->can('news:delete')) {
            $actionButtons[] = LinkColumn::make(__('Sil'))
                ->title(fn($row) => sprintf('<i class="fa fa-trash-alt mx-1"></i> %s', __('Kaldır / Sil')))
                ->location(fn($row) => 'javascript:void(0)')
                ->attributes(fn($row) => [
                    'class' => 'dropdown-item text-danger',
                    'wire:confirm' => __('Haber silinecektir, işleme devam edilsin mi?'),
                    'wire:click' => 'delete('.$row->id.')'
                ])
                ->html();
        }

        return [
            ButtonGroupColumn::make(__('İşlemler'))
                ->collapseOnMobile()
                ->buttons($actionButtons),
        ];
    }

    public function delete(News $news)
    {
        if (auth()->user()->cannot('news:delete')) {
            $this->message(__('Haber silinemez, yetkiniz bulunmuyor!'))->error();
            return false;
        }

        $this->message(__('Haber silindi!'))->success();

        return $news->delete();
    }

    public function showInfoModal(News $news, string $type)
    {
        $this->dispatch(
            'showModal',
            component: 'news.news-info-form',
            data: [
                'title' => __('Haber Ek Bilgiler'),
                'newsId' => $news->id,
                'type' => $type,
            ]
        );
    }
}
