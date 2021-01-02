<?php

namespace App\Http\Livewire\Student;

use App\Models\Model_course;
use Livewire\Component;

class Data extends Component
{
    public $course_selected = '';
        

    protected $queryString = [
        'course_selected' => ['except' => '']
    ];
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
