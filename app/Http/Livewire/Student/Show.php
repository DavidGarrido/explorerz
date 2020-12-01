<?php

namespace App\Http\Livewire\Student;

use App\Models\Role;
use Livewire\Component;

class Show extends Component
{
    public $student;
    public $parent;
    public function sync_parent($id){
        $this->student->parent_id = $id;
        $this->student->save();

    }
    public function render()
    {
        return view('livewire.student.show',[
            'parents' => Role::find(3)->users->where('email',$this->parent)
        ]);
    }
}
