<?php

namespace App\Livewire\Boards;

use App\Enums\StatusEnum;
use App\Models\BoardMember;
use App\Traits\CustomLivewireAlert;
use App\Traits\LivewireTableConfigure;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Board;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\CountColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class BoardTable extends DataTableComponent
{
    use CustomLivewireAlert, LivewireTableConfigure;

    protected $model = Board::class;

    public function mount(): void
    {
        $this->setSortAsc('sort');
    }

    public function filters(): array
    {
        return [
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
            Column::make(__('Kurul Adı'), "name")
                ->searchable()
                ->sortable(),
            CountColumn::make(__('Üye Sayısı'))
                ->setDataSource('members')
                ->label(function ($row) {
                    return sprintf(
                        '<button class="btn btn-alt-secondary btn-sm" wire:click.prevent="showMemberModal(\'%d\')">%d %s</button>',
                        $row->id,
                        $row->members_count,
                        __('üye')
                    );
                })
                ->html()
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
            WireLinkColumn::make(__('Üye Ekle'))
                ->collapseOnMobile()
                ->hideIf(auth()?->user()->cannot('boards:add'))
                ->title(fn($row) => sprintf('<i class="fa fa-user-plus mx-1"></i> %s', __('Üye Ekle')))
                ->action(fn($row) => 'formMemberModal("'.$row->id.'")')
                ->attributes(fn($row) => ['class' => 'btn btn-alt-secondary btn-sm'])
                ->html(),
            WireLinkColumn::make(__('Düzenle'))
                ->collapseOnMobile()
                ->hideIf(auth()?->user()->cannot('boards:update'))
                ->title(fn($row) => sprintf('<i class="fa fa-pen mx-1"></i> %s', __('Düzenle')))
                ->action(fn($row) => 'showModal("'.$row->id.'")')
                ->attributes(fn($row) => ['class' => 'btn btn-warning btn-sm'])
                ->html(),
        ];
    }

    public function formMemberModal(Board $board): void
    {
        $this->dispatch(
            'showOffcanvas',
            component: 'boards.member-form',
            data: [
                'title' => __('Üye Ekle'),
                'boardId' => $board->id
            ]
        );
    }

    public function showMemberModal(Board $board): void
    {
        $this->dispatch(
            'showModal',
            component: 'boards.member-table',
            data: [
                'title' => sprintf('%s %s', $board->name, __('üyeleri')),
                'boardId' => $board->id
            ]
        );
    }

    public function showModal(Board $board): void
    {
        $this->dispatch(
            'showModal',
            component: 'boards.board-form',
            data: [
                'title' => sprintf('%s %s', $board->name, __('düzenle')),
                'size' => 'lg',
                'boardId' => $board->id
            ]
        );
    }
}
