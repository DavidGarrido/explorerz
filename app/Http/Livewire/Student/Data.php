<?php

namespace App\Http\Livewire\Student;

use App\Models\DataStudent;
use App\Models\Model_course;
use Livewire\Component;
use Livewire\WithFileUploads;

class Data extends Component
{
    use WithFileUploads;
    public $course_selected = '';
    public $certificated;
        
    public  $full_name,
            $type_document,
            $number_document,
            $utc_nacimiento,
            $age,
            $sex,
            $size = 's',
            $eps;

    protected $queryString = [
        'course_selected' => ['except' => '']
    ];
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

    public function mount(){
        $this->data = auth()->user()->usertable;
    }

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
        } catch (\Throwable $th) {
            dd($th);
        }

    }
    public function download($route){
        return response()->download(storage_path($route));
    }

    public function render()
    {
        if ($this->course_selected == '') {
            return view('livewire.student.data',[
                'courses' => Model_course::all()
            ]);  
        }else{
            return view('livewire.student.data',[
                'courses' => Model_course::all(),
                'course' => Model_course::find($this->course_selected)
            ]);  
        }
    }
}
