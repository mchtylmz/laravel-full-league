<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\News;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\CountColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LivewireComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class TestTable extends DataTableComponent
{
    protected $model = News::class;

    public $columnSearch = [
        'category.name' => null,
        'slug' => null,
        'title' => null,
    ];

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setSingleSortingDisabled()
            ->setUseHeaderAsFooterEnabled()
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setUseHeaderAsFooterEnabled()
            ->setLoadingPlaceholderStatus(true)
            ->setLoadingPlaceholderContent(__('Yükleniyor...'))
            ->setFilterLayout('slide-down')
            ->setEagerLoadAllRelationsStatus(true);
    }

    public function builder(): Builder
    {
        return News::query()
            ->where('news.status', 'active');
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Durum', 'status')
                ->options([
                    '' => 'All',
                    'active' => 'Aktif',
                    'passive' => 'Pasif',
                ]),
            SelectFilter::make('Durum2', 'status')
                ->options([
                    '' => 'All',
                    'active' => 'Aktif',
                    'passive' => 'Pasif',
                ]),
            SelectFilter::make('Durum3', 'status')
                ->options([
                    '' => 'All',
                    'active' => 'Aktif',
                    'passive' => 'Pasif',
                ]),
            SelectFilter::make('Durum4', 'status')
                ->options([
                    '' => 'All',
                    'active' => 'Aktif',
                    'passive' => 'Pasif',
                ]),
            SelectFilter::make('Durum3', 'status')
                ->options([
                    '' => 'All',
                    'active' => 'Aktif',
                    'passive' => 'Pasif',
                ]),
            DateRangeFilter::make('Kayıt Tarihi')
                ->config([
                    'allowInput' => false,   // Allow manual input of dates
                    'placeholder' => __('Tarih Aralığı Giriniz'), // A placeholder value
                    'locale' => 'tr',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Slug", "slug")
                ->searchable()
                ->sortable(),
            Column::make('Kategori', 'category.name')
                ->searchable(),
            CountColumn::make('Kategori Sayısı')
                ->setDataSource('category')
                ->sortable(),
            Column::make('Başlık', 'title')
                ->searchable()
                ->sortable(),
            ComponentColumn::make('Durum', 'status')
                ->component('status')
                ->attributes(fn ($value, $row, Column $column) => [
                    'status' => $value == 'active' ? 'success':'error',
                    'label' => $value == 'active' ? __('Aktif') : __('Pasif'),
                ]),
            DateColumn::make("Created at", "created_at")
                ->inputFormat('Y-m-d')
                ->outputFormat('d M Y')
                ->sortable(),

            ButtonGroupColumn::make('İşlemler')
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('View')
                        ->html()
                        ->title(fn($row) => '<i class="fa fa-pen fa-fw"></i>')
                        ->location(fn($row) => route('dashboard.settings', $row))
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-warning btn-sm',
                            ];
                        }),
                    LinkColumn::make('View')
                        ->html()
                        ->title(fn($row) => '<i class="fa fa-trash-alt fa-fw"></i>')
                        ->location(fn($row) => route('dashboard.settings', $row))
                        ->attributes(function($row) {
                            return [
                                'class' => 'btn btn-danger btn-sm',
                            ];
                        }),
                    WireLinkColumn::make("Delete Item")
                        ->title(fn($row) => 'Delete Item')
                        ->action(fn($row) => 'delete("'.$row->id.'")')
                        ->attributes(fn($row) => [
                            'class' => 'btn btn-danger',
                        ]),
                ]),
        ];
    }
}
