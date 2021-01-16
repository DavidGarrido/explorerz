<?php

namespace App\Http\Livewire\Activity\Show;

use Livewire\Component;

class Task extends Component
{
    public $activity;
    public function render()
    {
        return view('livewire.activity.show.task');
    }
}
