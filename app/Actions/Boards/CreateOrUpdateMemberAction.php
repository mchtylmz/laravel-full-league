<?php

namespace App\Actions\Boards;

use App\Models\BoardMember;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateOrUpdateMemberAction
{
    use AsAction;

    public function handle(array $data, ?BoardMember $member = null)
    {
        if (is_null($member)) {
            $member = BoardMember::create($data);
        } else {
            $member->update($data);
        }

        return $member;
    }
}
