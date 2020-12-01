<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class Parents extends Component
{
    public function render()
    {
        return view('livewire.parents', [
            'parents' => Role::find(3)->users
        ]);
    }
}
