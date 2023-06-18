<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Exception;
use Goutte;

use App\Helpers\WhatsAppHelper;

class Profile extends Component
{
    public $countries = [];
    public $divisions = [];

    public $user;
    public $avatar;

    public $name = '';
    public $email = '';
    public $country = '';
    public $state = '';
    public $division = '';


    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required'],
            'state' => ['required']
        ];
    }

    public function mount($id = null)
    {
        if (!empty($id)) {
            $this->user = User::find($id);
        }

        if (empty($this->user)) {
            $this->user = auth()->user();
        }


        $this->countries = \App\Models\Country::orderBy('name')->get()->toArray();
        $len = count($this->countries);
        for($i = 0; $i < $len; $i ++) {
            $this->countries[$i]["name"] = $this->countries[$i]["name"] . " ( + " . $this->countries[$i]["phonecode"] . " )";
        }
        $this->country_info = \App\Models\Country::where('id', $this->user->country)->get()->toArray();
        $this->divisions = \App\Models\Division::get()->toArray();

        $this->country_name = $this->country_info[0]['name'];
        $this->phonecode = $this->country_info[0]['phonecode'];
        $this->name = $this->user->name;
        $this->country = $this->user->country;
        $this->zip = $this->user->zip;
        $this->division = $this->user->division;
        $this->phone = $this->user->phone;
    }

    public function updateProfile()
    {
        $user = User::where('id', $this->user->id)->update(['name'=>$this->name, 'zip' => $this->zip]);

        // show alert
        if($user == True) {
            $this->notify('Tu perfil fue actualizado.', 'éxito');
        }else {
            $this->notify('Se produjo un error en la base de datos. Inténtalo de nuevo.', 'Advertencia');
        }
    }

    public function updateWhatsapp(){

        $coundtryOFuser = \App\Models\Country::where('id', $this->country)->get()->toArray();
        $phonecode = $coundtryOFuser[0]["phonecode"];
        $to_phone_number_id = "+".$phonecode.$this->phone;


        // $random_password = $this->generate_password(6);
        $random_password = WhatsAppHelper::generate_password(6);

        $user = User::where('id', $this->user->id)->update(['country'=>$this->country, 'phone' => $this->phone, 'password'=>Hash::make($random_password)]);


        $message = WhatsAppHelper::whatsappNotification($to_phone_number_id, $random_password);

        $this->notify('Felicitaciones, la contraseña de su cuenta se restableció correctamente. por favor revise su whatsap', 'éxito');

        Auth::guard('web')->logout();

        return redirect('/');
    }

    public function render()
    {
        // if ($this->user->id == auth()->user()->id) {
            return view('livewire.edit-profile');
        // }

        // return view('livewire.profile');
    }
}
