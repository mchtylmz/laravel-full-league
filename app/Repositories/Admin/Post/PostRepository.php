<?php

namespace App\Repositories\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;

class PostRepository
{
    public $data;

    public function all()
    {
        return $this->data = Post::all();
    }

    public function table(Request $request)
    {
        return [];
    }
}
