<?php

namespace App\Http\Livewire\Activity\Show;

use Livewire\Component;

class Evidence extends Component
{
    public $evidence;
    public $calification, $file, $url;
    public function mount(){
        $this->calification = $this->evidence->calification;
        $this->file = $this->evidence->file;
        $this->url = $this->evidence->url;
    }
    public function updatedCalification(){
        $this->evidence->calification = $this->calification;
        $this->evidence->save();
    }
    public function render()
    {
        return view('livewire.activity.show.evidence');
    }
}
