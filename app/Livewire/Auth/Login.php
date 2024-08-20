<?php

namespace App\Livewire\Auth;

use App\Traits\AlertTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Login extends Component
{
    use AlertTrait;

    #[Validate('required|min:3')]
    public string $username = '';

    #[Validate('required|min:3')]
    public string $password = '';

    public function validationAttributes(): array
    {
        return [
            'username' => __('Kullanıcı Adı'),
            'password' => __('Parola'),
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->login()) {
            return redirect()->route('dashboard.home.index');
        }

        $this->alertError(__('Kullanıcı adı / Parola hatalı!'));
        return false;
    }

    public function render()
    {
        return view('livewire.auth.login');
    }

    protected function login()
    {
        $credentials = [
            'username' => $this->username,
            'password' => $this->password,
            'status'   => 'active'
        ];

        return Auth::attempt($credentials, true);
    }
}
