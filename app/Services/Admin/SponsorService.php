<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\Sponsor\StoreRequest;
use App\Models\Sponsor;

class SponsorService
{
    public function save(StoreRequest $request, Sponsor $sponsor)
    {
        $sponsor->description = $request->description;
        $sponsor->link = $request->link;
        $sponsor->type = $request->type;
        $sponsor->sort = $request->sort;
        $sponsor->status = $request->status;
        $sponsor->save();

        if ($request->hasFile('photo')) {
            $photo = upload($request->photo);
            if ($photo && $photo->id) {
                $sponsor->upload_id = $photo->id;
            }
        }

        $sponsor->save();

        return $sponsor;
    }

    public function delete(Sponsor $sponsor)
    {
        return $sponsor->delete();
    }
}
