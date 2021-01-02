<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use Livewire\WithFileUploads;

class FormData extends Component
{
    use WithFileUploads;
    public  $full_name,
            $type_document,
            $number_document,
            $utc_nacimiento,
            $age,
            $sex,
            $size = 's',
            $eps;

    public $certificated;

    protected $rules = [
        'certificated' => "required|mimes:pdf",
        'full_name' => "required",
        'type_document' => "required",
        'number_document' => "required",
        'utc_nacimiento' => "required",
        'age' => "required",
        'sex' => "required",
        'size' => "required",
        'eps' => "required",
    ];

    public function save(){
        $this->validate();
        try {
            $this->certificated->storeAs('certificated/'.auth()->user()->id,'last_certificated.pdf');    
            auth()->user()->usertable->full_name = $this->full_name;
            auth()->user()->usertable->type_document = $this->type_document;
            auth()->user()->usertable->number_document = $this->number_document;
            auth()->user()->usertable->utc_nacimiento = strtotime($this->utc_nacimiento);
            auth()->user()->usertable->age = $this->age;
            auth()->user()->usertable->sex = $this->sex;
            auth()->user()->usertable->size = $this->size;
            auth()->user()->usertable->eps = $this->eps;
            auth()->user()->usertable->last_certificated = 'app/certificated/'.auth()->user()->id.'/last_certificated.pdf';
            auth()->user()->usertable->save();
            $this->reset(['certificated']);            
            return redirect()->to('/dashboard');
        } catch (\Throwable $th) {
            dd($th);
        }

    }
    public function render()
    {
        return view('livewire.student.form-data');
    }
}
