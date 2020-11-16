<?php

namespace App\Http\Livewire\Thematic;

use App\Models\Course;
use App\Models\Thematic;
use Facade\Ignition\Support\FakeComposer;
use Livewire\Component;

class Create extends Component
{
    public $course;
    public $name, $description;
    public $all_thematics;

    public function mount(){
        $this->all_thematics = $this->course->thematics;
    }

    public function create(){
        $thematic = new Thematic();
        $thematic->name = $this->name;
        $thematic->description = $this->description;
        $thematic->save();

        $thematic->courses()->sync($this->course->id);

        $course = Course::find($this->course->id);
        $this->all_thematics = $course->thematics;
        $this->reset(['name','description']);
        session()->flash('message', 'Se ha registrado la tematica con exito.');
    }
    public function render()
    {
        return view('livewire.thematic.create');
    }
}
