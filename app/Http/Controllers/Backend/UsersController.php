<?php

namespace App\Http\Controllers\Backend;

use App\Actions\Users\CreateUserAction;
use App\Actions\Users\UpdatePasswordAction;
use App\Actions\Users\UpdateUserAction;
use App\Enums\RoleTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Users\CreateUserRequest;
use App\Http\Requests\Backend\Users\UpdatePasswordRequest;
use App\Http\Requests\Backend\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected array $userTabs = [
        'user',
        'password',
        'plan',
        'mailing'
    ];

    public function index()
    {
        return view('backend.users.index', [
            'title' => __('Yöneticiler'),
            'type' => RoleTypeEnum::ADMIN->value
        ]);
    }

    public function create()
    {
        return view('backend.users.create', [
            'title' => __('Kullanıcı Ekle')
        ]);
    }

    public function store(CreateUserRequest $request)
    {
        CreateUserAction::run(data: $request->validated());

        return response()->json([
            'message' => __('Kullanıcı eklendi'),
            'redirect' => route('admin.users.index')
        ]);
    }

    public function edit(User $user)
    {
        if (!request()->user()->canany(['users:update'])) {
            abort(403, __('Kullanıcı güncellenemez, yetkiniz bulunmuyor!'));
        }

        $activeTab = in_array(request()->input('tab'), $this->userTabs) ? request()->input('tab') : 'user';

        return view('backend.users.edit', [
            'title' => __('Kullanıcı Düzenle'),
            'user' => $user,
            'activeTab' => $activeTab
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        UpdateUserAction::run(
            user: $user,
            data: $request->validated()
        );

        return response()->json([
            'message' => __('Kullanıcı güncellendi'),
            'refresh' => true
        ]);
    }

    public function updatePassword(UpdatePasswordRequest $request, User $user)
    {
        UpdatePasswordAction::run(
            user: $user,
            password: $request->validated('password')
        );

        return response()->json([
            'message' => __('Kullanıcı parolası güncellendi'),
            'refresh' => true
        ]);
    }
}
