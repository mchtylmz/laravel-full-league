<?php

namespace App\Repositories\Admin\Post;

use App\Http\Resources\Admin\Posts\PostResource;
use App\Models\Post;
use App\Models\PostType;
use Illuminate\Http\Request;

class PostRepository
{
    public $data;

    public $count = 0;

    public function all()
    {
        return $this->data = Post::all();
    }

    public function types($status = 'active')
    {
        if ($status == 'active') {
            return PostType::active()->get();
        }
        if ($status == 'passive') {
            return PostType::passive()->get();
        }
        return PostType::all();
    }

    public function search(Request $request)
    {
        $this->count = Post::count();
        return $this->data = Post::all();
    }

    public function table(Request $request)
    {
        $data = PostResource::collection($this->search($request));
        return [
            'rows' => $data,
            'total' => $this->count,
            'totalNotFiltered' => $this->count,
        ];
    }
}
