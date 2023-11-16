<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
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
        $post = services('post')->save($request, new Post());
        if (!$post) {
            return response()->json([
                'message' => trans('post.form.error')
            ], 400);
        }

        return response()->json([
            'message' => trans('post.form.success'),
            'redirectTo' => route('admin.posts.index')
        ]);
    }

    public function update(Post $post)
    {
        return view('admin.posts.update', compact('post'));
    }

    public function save(StoreRequest $request, Post $post)
    {
        $post = services('post')->save($request, $post);
        if (!$post) {
            return response()->json([
                'message' => trans('post.form.error')
            ], 400);
        }

        return response()->json([
            'message' => trans('post.form.success'),
            'redirectTo' => route('admin.posts.index')
        ]);
    }

    public function json(Request $request)
    {
        return response()->json(repositories('post')->table($request));
    }
}
