<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class Teachers extends Component
{
    public function render()
    {
        return view('livewire.teachers',[
            'teachers' => Role::find(2)->users
        ]);
    }
}
