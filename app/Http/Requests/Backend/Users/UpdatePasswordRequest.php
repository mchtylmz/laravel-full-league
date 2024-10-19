<?php

namespace App\Http\Requests\Backend\Users;

use App\Enums\StatusEnum;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return request()->user()->can('users:update-password');
    }

    public function rules(): array
    {
        return [
            'password' => ['required', 'confirmed', Password::min(6)->letters()->numbers()],
        ];
    }

    public function attributes(): array
    {
        return [
            'password' => __('Parola')
        ];
    }

    public function failedAuthorization()
    {
        throw new AuthorizationException(
            message: __('Kullanıcı parolası güncellenemez, yetkiniz bulunmuyor!')
        );
    }
}
