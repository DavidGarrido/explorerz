<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\Model_course;
use Livewire\Component;

class Create extends Component
{


    public $allcourses;
    public $models;
    public $model = 1;




    public function mount(){

        $this->allcourses = Course::all();
        $this->models = Model_course::all();
        

    }


    
    public function create(){

            $course = new Course();
            $course->model_id = $this->model;
            $course->save();

            $course->users()->attach(auth()->user()->id);
            $this->allcourses = auth()->user()->courses;
    }


    public function render()
    {
        return view('livewire.course.create');
    }
}
