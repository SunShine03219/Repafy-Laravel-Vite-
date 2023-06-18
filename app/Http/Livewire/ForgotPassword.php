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

class ForgotPassword extends Component
{
    public $countries = [];
    public $country = '';
    public $phone = '';

    protected function rules()
    {
        return [
            'country' => ['required'],
            'phone' => ['required']
        ];
    }

    public function passwordreset() {


        $this->validate();

        // Confirm User
        $Is_user = \App\Models\User::where('country', $this->country)->where('phone', $this->phone)->get()->toArray();

        if(empty($Is_user)) {
            $this->notify('Este número de teléfono de WhatsApp aún no estaba registrado.', 'advertencia');

            $this->country = '';
            $this->phone = '';
        }
        else {

            $coundtryOFuser = \App\Models\Country::where('id', $this->country)->get()->toArray();
            $phonecode = $coundtryOFuser[0]["phonecode"];
            $to_phone_number_id = "+".$phonecode.$this->phone;


            // $random_password = $this->generate_password(6);
            $random_password = WhatsAppHelper::generate_password(6);

            $user = \App\Models\User::where('country', $this->country)->where('phone', $this->phone)->update(['password'=>Hash::make($random_password)]);


            $message = WhatsAppHelper::whatsappNotification($to_phone_number_id, $random_password);

            $this->notify('Felicitaciones, la contraseña de su cuenta se restableció correctamente. por favor revise su whatsapp', 'éxito');

            $this->division = '';
            $this->name = '';
            $this->country = '';
            $this->phone = '';

            return redirect()->route('login');
        }
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
        return view('livewire.forgot-password');
    }
}
