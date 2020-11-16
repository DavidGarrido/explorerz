<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\Role;
use Livewire\Component;

class Create extends Component
{


    public $title, $description, $allcourses;
    public $capacity = 0 ;




    public function mount(){

        $this->allcourses = auth()->user()->courses;

        

    }
    protected $rules = [
        'title' => 'required',
        'description' => 'required'
    ];


    
    public function create(){
        $this->validate();

            $course = new Course();
            $course->title = $this->title;
            $course->description = $this->description;
            $course->capacity = $this->capacity;
            $course->save();

            $this->reset('title', 'description', 'capacity');
            $course->users()->attach(auth()->user()->id);
            $this->allcourses = auth()->user()->courses;
    }


    public function render()
    {
        return view('livewire.course.create');
    }
}
