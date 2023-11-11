<?php

namespace App\Http\Requests\Admin\Board;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            'board_id' => 'required|exists:App\Models\Board,id',
            'photo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg'
            ],
            'name' => 'nullable',
            'grid' => 'required|integer',
            'sort' => 'required|integer',
            'status' => 'required'
        ];
    }

    public function attributes(): array
    {
        return [
            'board_id' => trans('board.table.board'),
            'photo' => trans('board.table.photo'),
            'name' => trans('board.table.name'),
            'grid' => trans('board.table.grid'),
            'sort' => trans('board.table.sort'),
            'status' => trans('board.table.status')
        ];
    }
}
