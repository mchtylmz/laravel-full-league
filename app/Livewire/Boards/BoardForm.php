<?php

namespace App\Livewire\Boards;

use App\Actions\Boards\CreateOrUpdateBoardAction;
use App\Enums\StatusEnum;
use App\Models\Board;
use App\Traits\CustomLivewireAlert;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class BoardForm extends Component
{
    use CustomLivewireAlert;

    public Board $board;

    public int $sort = 1;
    public string $name;
    public StatusEnum $status = StatusEnum::ACTIVE;

    public string $permission = 'boards:add';

    public function mount(?int $boardId = null): void
    {
        if ($boardId && $this->board = Board::find($boardId)) {
            $this->sort = $this->board->sort;
            $this->name = $this->board->name;
            $this->status = $this->board->status;

            $this->permission = 'boards:update';
        }
    }

    public function rules(): array
    {
        return [
            'sort' => 'required|integer|min:1',
            'name' => 'required|string|min:1|max:255',
            'status' => ['required', new Enum(StatusEnum::class)],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'sort' => __('Sıra'),
            'name' => __('Kurul Adı'),
            'status' => __('Durum'),
        ];
    }

    public function save()
    {
        $this->validate();

        if (user()->cannot($this->permission)) {
            $this->message(__('Kurul eklenemez, yetkiniz bulunmuyor!'))->error();
            return false;
        }

        CreateOrUpdateBoardAction::run(
            data: [
                'sort' => $this->sort,
                'name' => $this->name,
                'status' => $this->status,
            ],
            board: !empty($this->board) && $this->board->exists ? $this->board : null
        );

        return redirect()->route('admin.boards.index');
    }

    public function render()
    {
        return view('livewire.backend.boards.board-form');
    }
}
