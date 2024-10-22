<?php

namespace App\Http\Controllers\Backend;

use App\Enums\InfoTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\InformationType;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        return view('backend.information.index', [
            'title' => __('Bilgi Girişleri'),
            'types' => InformationType::orderBy('group')->orderBy('name')->get(),
        ]);
    }
    public function form(InformationType $informationType)
    {
        return view('backend.information.form', [
            'title' => __('group.' . $informationType->group),
            'informationType' => $informationType,
        ]);
    }
}
