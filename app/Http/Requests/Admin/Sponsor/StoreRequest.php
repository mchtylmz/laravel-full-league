<?php

namespace App\Http\Requests\Admin\Sponsor;

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
            'photo' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg'
            ],
            'sort' => 'required|integer',
            'type' => 'required|in:left,right',
            'status' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'type' => trans('sponsor.table.type'),
            'photo' => trans('sponsor.table.photo'),
            'sort' => trans('sponsor.table.sort'),
            'status' => trans('sponsor.table.status'),
        ];
    }
}
