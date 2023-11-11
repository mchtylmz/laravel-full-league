<?php

namespace App\Http\Requests\Admin\Profile;

use App\Rules\ValidatePassword;
use Illuminate\Foundation\Http\FormRequest;

class StorePasswordRequest extends FormRequest
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
            'password' => ['required', 'min:6', new ValidatePassword()],
            'newpassword' => ['required', 'confirmed', 'min:6'],
        ];
    }

    public function attributes(): array
    {
        return [
            'password' => trans('profile.change_password.current'),
            'newpassword' => trans('profile.change_password.new'),
            'newpassword_confirmation' => trans('profile.change_password.confirm'),
        ];
    }
}
