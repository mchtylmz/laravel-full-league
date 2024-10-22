<?php

namespace App\Livewire\Boards;

use App\Enums\InfoTypeEnum;
use App\Enums\StatusEnum;
use App\Models\Board;
use App\Models\Information;
use App\Models\InformationType;
use App\Models\Role;
use App\Traits\CustomLivewireAlert;
use App\Traits\LivewireTableConfigure;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\BoardMember;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\CountColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectDropdownFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class MemberTable extends DataTableComponent
{
    use CustomLivewireAlert, LivewireTableConfigure;

    protected int $defaultPerPage = 5;

    protected $model = BoardMember::class;

    public int $boardId = 0;

    public function mount(int $boardId): void
    {
        $this->resetPage($this->getComputedPageName());
        $this->resetFilter('status');
        $this->clearSearch();

        $this->setSortAsc('sort');
    }

    public function builder(): Builder
    {
        return BoardMember::where('board_id', $this->boardId);
    }

    public function filters(): array
    {
        return [
            MultiSelectDropdownFilter::make(__('Görevler'))
                ->options(
                    InformationType::where('form', 'board')
                        ->first()
                        ->informations()
                        ->active()
                        ->orderBy('sort')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($item) => $item->name_tr)
                        ->toArray()
                )
                ->filter(function(Builder $builder, array $value) {
                    $builder->whereIn('information_id', $value);
                }),
            SelectFilter::make(__('Durum'), 'status')
                ->options(['' => __('Tümü'), ...StatusEnum::options()])
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('status', $value);
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->hideIf(true),
            Column::make(__('Sıra'), "sort")
                ->sortable(),
            ImageColumn::make(__('Fotoğraf'), 'photo')
                ->location(fn($row) =>
                    $row->photo ?
                    asset($row->photo) :
                    asset('backend/assets/images/no_image.png'))
                ->attributes(fn($row) => [
                    'class' => 'img-avatar img-avatar-thumb img-avatar-rounded',
                    'alt' => $row->name,
                ]),
            Column::make(__('Üye Ad Soyad'), "name")
                ->searchable()
                ->sortable(),
            Column::make(__('Görev'), "information.name_tr")
                ->searchable()
                ->sortable(),
            Column::make(__('Gösterim'), "show_type")
                ->format(function($value) {
                    return match ($value) {
                        12 => __('Tek'),
                        6 => __('Çift'),
                        4 => __('Üçlü'),
                        3 => __('Dörtlü'),
                        default =>  __('Altılı'),
                    };
                })
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
        ];
    }

    public function appendColumns(): array
    {
        return [
            WireLinkColumn::make(__('Düzenle'))
                ->collapseOnMobile()
                ->hideIf(auth()?->user()->cannot('boards:update'))
                ->title(fn($row) => sprintf('<i class="fa fa-pen mx-1"></i> %s', __('Düzenle')))
                ->action(fn($row) => 'showModal("'.$row->id.'")')
                ->attributes(fn($row) => ['class' => 'btn btn-warning btn-sm'])
                ->html(),
            WireLinkColumn::make(__('Sil'))
                ->collapseOnMobile()
                ->hideIf(auth()?->user()->cannot('boards:delete'))
                ->title(fn($row) => sprintf('<i class="fa fa-trash-alt mx-1"></i> %s', __('Sil')))
                ->confirmMessage(__('Üye silinecektir, işleme devam edilsin mi?'))
                ->action(fn($row) => 'delete("'.$row->id.'")')
                ->attributes(fn($row) => ['class' => 'btn btn-danger btn-sm'])
                ->html(),
        ];
    }

    public function showModal(BoardMember $member): void
    {
        $this->dispatch('closeModal');
        $this->dispatch(
            'showOffcanvas',
            component: 'boards.member-form',
            data: [
                'title' => sprintf('%s %s', $member->name, __('düzenle')),
                'memberId' => $member->id,
                'boardId' => $member->board_id
            ]
        );
    }

    public function delete(BoardMember $member)
    {
        if (auth()->user()->cannot('boards:delete')) {
            $this->message(__('Üye silinemez, yetkiniz bulunmuyor!'))->toast(true)->error();
            return false;
        }

        $this->message(__('Üye silindi!'))->toast(true)->success();

        return $member->delete();
    }
}
