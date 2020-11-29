<?php

namespace App\Http\Livewire\Schedule;

use Livewire\Component;

class Stripe extends Component
{
    public $stripe;
    public function render()
    {
        return view('livewire.schedule.stripe');
    }
}
