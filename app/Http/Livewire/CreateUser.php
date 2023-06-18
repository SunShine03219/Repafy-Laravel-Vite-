<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Helpers\WhatsAppHelper;

class CreateUser extends Component
{
    public $countries = [];
    public $name = '';
    public $password = '';
    public $password_confirmation = '';
    public $country = '';
    public $division = '';
    public $phone = '';
    protected function rules()
    {
        return [
            'division' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required'],
            'phone' => ['required']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $this->validate();

        // Confirm User
        $Is_user = \App\Models\User::where('country', $this->country)->where('phone', $this->phone)->get()->toArray();

        if(!empty($Is_user)) {
            $this->notify('Este número de teléfono de WhatsApp ya estaba registrado.', 'advertencia');

            $this->division = '';
            $this->name = '';
            $this->country = '';
            $this->phone = '';

            return;
        }
        else {

            $coundtryOFuser = \App\Models\Country::where('id', $this->country)->get()->toArray();
            $phonecode = $coundtryOFuser[0]["phonecode"];
            $to_phone_number_id = "+".$phonecode.$this->phone;

            $random_password = WhatsAppHelper::generate_password(6);

            $user = User::create([
                'division' => $this->division,
                'name' => $this->name,
                'password' => Hash::make($random_password),
                'country' => $this->country,
                'phone' => $this->phone
            ]);


            $message = WhatsAppHelper::whatsappNotification($to_phone_number_id, $random_password);

            $this->notify('Felicidade, Su información fue registrada con éxito. por favor revise su WhatsApp', 'éxito');

            $this->division = '';
            $this->name = '';
            $this->country = '';
            $this->phone = '';

            // event(new Registered($user));

            // Auth::login($user);

            // return redirect(RouteServiceProvider::HOME);
            // return redirect()->route('login');
        }
    }

    public function mount()
    {
        $this->countries = \App\Models\Country::orderBy('name')->get()->toArray();
        $len = count($this->countries);
        for($i = 0; $i < $len; $i ++) {
            $this->countries[$i]["name"] = $this->countries[$i]["name"] . " ( + " . $this->countries[$i]["phonecode"] . " )";
        }

        $this->divisions = \App\Models\Division::get()->toArray();
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
