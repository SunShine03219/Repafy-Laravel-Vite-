<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class LoginUser extends Component
{
    public $countries = [];
    public $phone = '';
    public $country = '';

    protected function rules()
    {
        return [
            'country' => ['required']
        ];
    }

    public function mount()
    {
        $this->countries = \App\Models\Country::orderBy('name')->get()->toArray();
        $len = count($this->countries);
        for($i = 0; $i < $len; $i ++) {
            $this->countries[$i]["name"] = $this->countries[$i]["name"] . " ( + " . $this->countries[$i]["phonecode"] . " )";
        }
    }

    public function render()
    {
        return view('livewire.login-user');
    }
}
