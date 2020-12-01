<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Students extends Component
{
    public $students;
    public $selected;
    public $student;

    protected $queryString = ['selected' => ['except' => '']];
    public function mount(){
        $students = Role::find(4);
        $this->students = $students->users;
        if($this->selected != null){
            $this->student = User::find($this->selected);
        }
    }
    public function show_student($id){
        $this->student = User::find($id);
        $this->selected = $id;
    }
    public function render()
    {
        return view('livewire.students');
    }
}
