<?php

namespace App\Livewire\Boards;

use App\Actions\Boards\CreateOrUpdateMemberAction;
use App\Actions\Files\UploadFileAction;
use App\Enums\InfoTypeEnum;
use App\Enums\StatusEnum;
use App\Models\Board;
use App\Models\BoardMember;
use App\Models\Information;
use App\Models\InformationType;
use App\Traits\CustomLivewireAlert;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class MemberForm extends Component
{
    use CustomLivewireAlert, WithFileUploads;

    public ?int $memberBoardId;
    public ?BoardMember $member;

    public int $memberSort = 1;
    public string $memberName;
    public int $memberTitle;
    public int $showType = 4;
    public StatusEnum $memberStatus = StatusEnum::ACTIVE;
    public $photo;

    public string $permission = 'boards:add';

    public function mount(?int $boardId = 0, ?int $memberId = 0)
    {
        if ($boardId) {
            $this->memberBoardId = $boardId;
        }
        if ($memberId) {
            $this->member = BoardMember::find($memberId);

            $this->memberSort = $this->member->sort;
            $this->memberName = $this->member->name;
            $this->memberTitle = $this->member->information_id;
            $this->showType = $this->member->show_type;
            $this->memberStatus = $this->member->status;
        }
    }

    #[Computed]
    public function showTypes(): array
    {
        return [
            12 => __('Tek'),
            6 => __('Çift'),
            4 => __('Üçlü'),
            3 => __('Dörtlü'),
            2 => __('Altılı'),
        ];
    }

    #[Computed]
    public function boards()
    {
        return Board::orderBy('name')->get();
    }

    #[Computed]
    public function titles()
    {
        $type = InformationType::where('form', 'board')->first();

        return $type->informations()->active()->get();
    }

    public function rules(): array
    {
        return [
            'memberSort' => 'required|integer|min:1',
            'memberName' => 'required|string|min:1|max:255',
            'memberTitle' => 'required|integer|exists:information,id',
            'memberStatus' => ['required', new Enum(StatusEnum::class)],
            'photo' => ['nullable', 'image'],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            'memberSort' => __('Sıra'),
            'memberName' => __('Üye Ad Soyad'),
            'memberTitle' => __('Görevi'),
            'memberStatus' => __('Durum'),
            'photo' => __('Fotoğraf'),
        ];
    }

    public function save(): bool
    {
        $this->validate();

        if (user()->cannot($this->permission)) {
            $this->message(__('Üye eklenemez, yetkiniz bulunmuyor!'))->error();
            return false;
        }

        $data = [
            'board_id' => $this->memberBoardId,
            'sort' => $this->memberSort,
            'name' => $this->memberName,
            'information_id' => $this->memberTitle,
            'show_type' => $this->showType,
            'status' => $this->memberStatus,
        ];
        if ($this->photo instanceof TemporaryUploadedFile) {
            $data['photo'] = UploadFileAction::run(file: $this->photo, folder: 'boards');
        }

        CreateOrUpdateMemberAction::run(
            data: $data,
            member: !empty($this->member) && $this->member->exists ? $this->member : null,
        );

        $this->dispatch('closeOffcanvas');
        $this->dispatch('refreshDatatable');
        return true;
    }

    public function render()
    {
        return view('livewire.backend.boards.member-form');
    }
}
