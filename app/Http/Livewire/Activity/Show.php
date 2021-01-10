<?php

namespace App\Http\Livewire\Activity;

use Livewire\Component;

class Show extends Component
{
    public $activity;
    public function render()
    {
        return view('livewire.activity.show');
    }
}
