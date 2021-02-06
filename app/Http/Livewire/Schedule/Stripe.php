<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Course;
use App\Models\Schedule;
use Livewire\Component;

class Stripe extends Component
{
    public $stripe;
    public $teacher;

    protected $listeners = ['refresh'];
    public function mount(){
        $this->teacher = $this->stripe->user_id;
    }
    public function updatedTeacher(){
        $this->stripe->user_id = $this->teacher;
        $this->stripe->save();
        $this->refresh();
    }
    public function refresh(){
        $stripe = Schedule::find($this->stripe->id);
        $this->stripe = $stripe;
    }
    public function render()
    {
        return view('livewire.schedule.stripe',[
            'teachers' => $this->stripe->courses[0]->users
        ]);
    }
}
