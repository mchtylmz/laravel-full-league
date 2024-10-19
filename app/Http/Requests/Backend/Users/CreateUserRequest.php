<?php

namespace App\Http\Requests\Backend\Users;

use App\Enums\StatusEnum;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return request()->user()->can('users:add');
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email:rfc,dns|unique:App\Models\User,email',
            'phone' => 'nullable',
            'status' => ['required', Rule::in(StatusEnum::values())],
            'role' => 'required|exists:\App\Models\Role,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('Ad soyad'),
            'email' => __('E-posta adresi'),
            'phone' => __('Telefon numarası'),
            'status' => __('Durum'),
            'role' => __('Yetki'),
        ];
    }

    public function failedAuthorization()
    {
        throw new AuthorizationException(
            message: __('Yeni kullanıcı eklenemez, yetkiniz bulunmuyor!')
        );
    }
}
