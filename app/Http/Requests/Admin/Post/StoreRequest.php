<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'season_id' => 'required|exists:App\Models\Season,id',
            'post_type_id' => 'required|exists:App\Models\PostType,id',
            'title' => 'required|min:10',
            'content' => 'required|min:10',
            'photo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg'
            ],
            'home' => 'required|in:0,1',
            'lang' => 'required',
            'single' => 'required',
            'sort' => 'required|integer',
            'status' => 'required',
            'published_at' => 'required|date_format:Y-m-d H:i',
        ];
    }

    public function attributes(): array
    {
        return [
            'season_id' => trans('post.table.season'),
            'post_type_id' => trans('post.table.type'),
            'title' => trans('post.table.title'),
            'content' => trans('post.table.content'),
            'photo' => trans('post.table.photo'),
            'home' => trans('post.table.home'),
            'lang' => trans('post.table.lang'),
            'sort' => trans('post.table.sort'),
            'status' => trans('post.table.status'),
            'published_at' => trans('post.table.published_at'),
        ];
    }
}
