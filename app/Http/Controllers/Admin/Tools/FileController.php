<?php

namespace App\Http\Controllers\Admin\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return view('admin.tool.files');
    }

    public function json(Request $request)
    {
        return response()->json(repositories('file')->table($request));
    }
}
