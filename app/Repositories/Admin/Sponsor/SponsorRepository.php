<?php

namespace App\Repositories\Admin\Sponsor;

use App\Http\Resources\Admin\Sponsors\SponsorResource;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorRepository
{
    public $data;

    public function all()
    {
        return $this->data = Sponsor::all();
    }

    public function search(Request $request)
    {
        if ($sort = $request->get('sort')) {
            $sponsor = Sponsor::orderBy($sort, $request->order ?? 'ASC');
        } else {
            $sponsor = Sponsor::orderBy('sort');
        }

        if ($search = $request->get('search')) {
            $sponsor->where('description', 'LIKE', '%' . $search . '%')
                ->orWhere('link', 'LIKE', '%' . $search . '%');
        }

        if ($offset = $request->get('offset')) {
            $sponsor->offset($offset);
        }
        if ($limit = $request->get('limit')) {
            $sponsor->limit($limit);
        }

        return $this->data = $sponsor->get();
    }

    public function table(Request $request)
    {
        $data = SponsorResource::collection($this->search($request));
        return [
            'rows' => $data,
            'total' => $data->count(),
            'totalNotFiltered' => $data->count(),
        ];
    }
}
