<?php

namespace App\Livewire\News;

use App\Traits\CustomLivewireAlert;
use App\Traits\LivewireTableConfigure;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Category;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\CountColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;

class CategoryTable extends DataTableComponent
{
    use CustomLivewireAlert, LivewireTableConfigure;

    protected $model = Category::class;

    public function mount(): void
    {
        $this->setSortAsc('name');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->hideIf(true),
            Column::make(__('Adı'), "name")
                ->searchable()
                ->sortable(),
            Column::make(__('Açıklama'), "description")
                ->searchable()
                ->sortable(),
            CountColumn::make(__('Haber Sayısı'))
                ->setDataSource('news')
                ->sortable()
        ];
    }

    public function appendColumns(): array
    {
        return [
            WireLinkColumn::make(__('Düzenle'))
                ->collapseOnMobile()
                ->hideIf(auth()?->user()->cannot('category:update'))
                ->title(fn($row) => sprintf('<i class="fa fa-pen mx-1"></i> %s', __('Düzenle')))
                ->action(fn($row) => 'editModal("'.$row->id.'")')
                ->attributes(fn($row) => ['class' => 'btn btn-warning btn-sm'])
                ->html(),
            WireLinkColumn::make(__('Sil'))
                ->collapseOnMobile()
                ->hideIf(auth()?->user()->cannot('category:delete'))
                ->title(fn($row) => sprintf('<i class="fa fa-pen mx-1"></i> %s', __('Sil')))
                ->confirmMessage(__('Kategori silinecektir, işleme devam edilsin mi?'))
                ->action(fn($row) => 'delete("'.$row->id.'")')
                ->attributes(fn($row) => ['class' => 'btn btn-danger btn-sm'])
                ->html(),
        ];
    }

    public function editModal(Category $category): void
    {
        $this->dispatch(
            'showOffcanvas',
            component: 'news.category-form',
            data: [
                'title' => __('Kategori Düzenle'),
                'categoryId' => $category->id
            ]
        );
    }

    public function delete(Category $category)
    {
        if (auth()->user()->cannot('category:delete')) {
            $this->message(__('Kategori silinemez, yetkiniz bulunmuyor!'))->error();
            return false;
        }

        if ($category->news()->count() > 0) {
            $this->message(__('Kategori silemezsiniz, bağlı haberler bulunuyor!'))->error();
            return false;
        }

        $this->message(__('Kategori silindi!'))->toast(true)->success();

        return $category->delete();
    }
}
