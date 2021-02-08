<?php

namespace App\Http\Livewire;

use App\Models\DataStudent;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Students extends Component
{
    public $students;
    public $selected;
    public $student;
    public $nombre, $email, $t_doc = 't.i', $n_doc;
    public $new_student = false;

    protected $queryString = ['selected' => ['except' => ''],'new_student'];
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
    public function store(){
        $this->validate([
            'nombre' => 'required|string',
            'email' => 'required|email',
            't_doc' => 'required',
            'n_doc' => 'required:integer',
        ]);
        try {
            $student = new User();
            $student->name = $this->nombre;
            $student->email = $this->email;
            $student->password = bcrypt($this->n_doc);
            $data = new DataStudent();
            $data->type_document = $this->t_doc;
            $data->number_document = $this->n_doc;
            $data->save();
            $student->usertable_id = $data->id;
            $student->usertable_type = 'App\Models\DataStudent';
            $student->save();
            $student->roles()->sync('4');
            $this->new_student = false;
            $students = Role::find(4);
            $this->students = $students->users;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function render()
    {
        return view('livewire.students');
    }
}
