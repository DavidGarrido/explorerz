<?php

namespace App\Http\Livewire\Activity;

use App\Models\Activity;
use App\Models\Thematic;
use Livewire\Component;

class Create extends Component
{
    public $thematic;
    public $name, $description;
    public function create(){
        $activity = new Activity();
        $activity->name = $this->name;
        $activity->description = $this->description;
        $activity->save();
        $this->reset(['name', 'description']);
        $activity->thematics()->sync($this->thematic->id);
        session()->flash('message', 'Se ha creado correctamente la actividad');
        $this->thematic = Thematic::find($this->thematic->id);
    }
    public function render()
    {
        return view('livewire.activity.create');
    }
}
