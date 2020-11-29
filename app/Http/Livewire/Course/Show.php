<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;

class Show extends Component
{
    public $course;
    public $autorize;


    public function mount(){
        $this->autorize = $this->course->users()->find(auth()->user()->id);
    }
    public function render()
    {
        return view('livewire.course.show');
    }
}
