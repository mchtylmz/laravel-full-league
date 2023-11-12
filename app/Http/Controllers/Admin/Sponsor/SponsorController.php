<?php

namespace App\Http\Controllers\Admin\Sponsor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sponsor\StoreRequest;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        return view('admin.sponsor.index');
    }

    public function create()
    {
        return view('admin.sponsor.create');
    }

    public function store(StoreRequest $request)
    {
        services('sponsor')->save($request, new Sponsor());

        return response()->json([
            'message' => trans('sponsor.form.success'),
            'redirectTo' => route('admin.sponsors.index')
        ]);
    }

    public function update(Sponsor $sponsor)
    {
        return view('admin.sponsor.update', compact('sponsor'));
    }

    public function save(StoreRequest $request, Sponsor $sponsor)
    {
        services('sponsor')->save($request, $sponsor);

        return response()->json([
            'message' => trans('sponsor.form.success'),
            'redirectTo' => route('admin.sponsors.index')
        ]);
    }

    public function delete(Sponsor $sponsor)
    {
        if (!services('sponsor')->delete($sponsor)) {
            return response()->json([
                'message' => trans('sponsor.form.delete_error')
            ], 422);
        }

        return response()->json([
            'message' => trans('sponsor.form.delete_success')
        ]);
    }
    public function json(Request $request)
    {
        return response()->json(repositories('sponsor')->table($request));
    }
}
