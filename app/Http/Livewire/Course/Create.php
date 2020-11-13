<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\Role;
use Livewire\Component;

class Create extends Component
{
    public $title, $description, $courses, $allcourses;
    public $students;
    public $capacity = 0 ;

    public function mount(){
        $role = Role::find(4);
        $this->students = $role->users;
        $this->allcourses = Course::all();
    }

    
    public function create(){
            $course = new Course();
            $course->title = $this->title;
            $course->description = $this->description;
            $course->capacity = $this->capacity;
            $course->save();

            $this->reset('title', 'description', 'capacity');
            $this->allcourses = Course::get();
    }
    public function render()
    {
        return view('livewire.course.create');
    }
}
