<?php

namespace App\Http\Livewire\Schedule;

use Livewire\Component;

class Stripe extends Component
{
    public $stripe;
    public $teacher;
    public function mount(){
        $this->teacher = $this->stripe->user_id;
    }
    public function save (){
        $this->stripe->user_id = $this->teacher;
        $this->stripe->save();
    }
    public function render()
    {
        return view('livewire.schedule.stripe',[
            'teachers' => $this->stripe->courses[0]->users
        ]);
    }
}
