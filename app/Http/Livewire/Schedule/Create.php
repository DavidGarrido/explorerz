<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Schedule;
use Livewire\Component;

class Create extends Component
{
    public $course;
    public $hour = [];

    public function mount ($course){
        // $this->schedule = $course->schedule;
    }

    public function create(){
        $schedule = new Schedule;
        $schedule->save();
        $schedule->courses()->sync($this->course);
        $this->schedule = $this->course->schedule;
    }
    public function render()
    {
        return view('livewire.schedule.create');
    }
}
