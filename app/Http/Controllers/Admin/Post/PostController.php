<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }
    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreRequest $request)
    {
        dd($request->all());
    }


    public function json(Request $request)
    {
        return response()->json(repositories('post')->table($request));
    }
}
