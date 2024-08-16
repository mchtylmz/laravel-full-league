<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Login extends Component
{
    use LivewireAlert;

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

        $credentials = [
            'username' => $this->username,
            'password' => $this->password,
        ];

        if (!Auth::attempt($credentials, true)) {
            $this->alert(
                type: 'error',
                options: [
                    'text' => __('Kullanıcı adı / Parola hatalı!'),
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => false,
                    'timerProgressBar' => true,
                    'showCloseButton' => true,
                ]
            );
            return true;
        }

        return redirect()->route('dashboard.home.index');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
