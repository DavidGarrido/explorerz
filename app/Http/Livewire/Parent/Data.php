<?php

namespace App\Http\Livewire\Parent;

use App\Models\DataStudent;
use App\Models\Request;
use App\Models\User;
use Livewire\Component;

class Data extends Component
{
    public $show;
    public $email, $name, $password, $password_2, $typdoc, $number_doc;
    public function mount(){
        $this->show = 'button';
        $this->typdoc = 't.i';
    }
    public function store(){
        $this->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'password' => 'required|string',
            'password_2' => 'required|string',
        ]);
        $student = new User();
        $student->name = $this->name;
        $student->email = $this->email;
        $student->password = bcrypt($this->password);
        $student->parent_id = auth()->user()->id;
        $student->save();
        $this->request($student);
    }
    public function request(User $student){
        $data = DataStudent::create();
        $data->type_document = $this->typdoc;
        $data->number_document = $this->number_doc;
        $data->save();
        $student->usertable_id = $data->id;
        $student->usertable_type = 'App\Models\DataStudent';
        $student->save();
        Request::create([
            'user_id' => $student->id,
            'role_id' => 4,
            'type' => 1,
            'state' => 1
        ]);
    }
    public function render()
    {
        return view('livewire.parent.data');
    }
}
