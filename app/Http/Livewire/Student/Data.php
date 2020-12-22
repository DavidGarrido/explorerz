<?php

namespace App\Http\Livewire\Student;

use App\Models\Model_course;
use Livewire\Component;
use Livewire\WithFileUploads;

class Data extends Component
{
    use WithFileUploads;
    public $course_selected = '';
    public $cretificated;

    protected $queryString = [
        'course_selected' => ['except' => '']
    ];

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
