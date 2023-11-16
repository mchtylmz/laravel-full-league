<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;

class PostService
{
    public function save(StoreRequest $request, Post $post)
    {
        $post->season_id = $request->season_id;
        $post->post_type_id = $request->post_type_id;
        $post->title = $request->title;
        $post->brief = $request->brief;
        $post->content = $request->content;
        $post->single = intval($request->single);
        $post->home = intval($request->home);
        $post->lang = $request->lang;
        $post->sort = $request->sort;
        $post->status = $request->status;
        $post->published_at = $request->published_at;
        $post->save();

        if ($request->hasFile('photo')) {
            $photo = upload($request->photo);
            if ($photo && $photo->id) {
                $post->upload_id = $photo->id;
            } else {
                $post->forceDelete();
                return false;
            }
        }

        $post->save();

        return $post;
    }
}
