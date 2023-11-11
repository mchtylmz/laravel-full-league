<?php

namespace App\Http\Requests\Admin\Board;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title_tr' => 'required',
            'title_en' => 'nullable',
            'photo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg'
            ],
            'sort' => 'required|integer',
            'status' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'title_tr' => trans('board.table.title_tr'),
            'title_en' => trans('board.table.title_en'),
            'photo' => trans('board.table.photo'),
            'sort' => trans('board.table.sort'),
            'status' => trans('board.table.status'),
        ];
    }
}
