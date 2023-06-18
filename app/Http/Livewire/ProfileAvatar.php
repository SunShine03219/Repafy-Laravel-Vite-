<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;

class ProfileAvatar extends Component
{
    use WithFileUploads;
    public $user;
    public $avatar;

    public function mount($id = null)
    {
        if (!empty($id)) {
            $this->user = User::find($id);
        }

        if (empty($this->user)) {
            $this->user = auth()->user();
        }
    }

    public function updatedAvatar()
    {
        $this->saveAvatar();
    }

    public function saveAvatar()
    {
        $name = md5($this->avatar . microtime()).'.'.$this->avatar->extension();
        $avatar = $this->avatar->store('images', 'public');
        $this->user->update(compact('avatar'));
        $this->avatar = null;
    }

    public function render()
    {
        return view('livewire.profile-avatar');
    }
}
