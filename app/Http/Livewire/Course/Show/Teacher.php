<?php

namespace App\Http\Livewire\Course\Show;

use Livewire\Component;

class Teacher extends Component
{
    public $course;
    public function render()
    {
        return view('livewire.course.show.teacher');
    }
}
