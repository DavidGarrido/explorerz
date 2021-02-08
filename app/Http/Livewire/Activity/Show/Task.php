<?php

namespace App\Http\Livewire\Activity\Show;

use App\Models\Activity;
use App\Models\Task as ModelsTask;
use Livewire\Component;

class Task extends Component
{
    public $activity;
    public $tasks;
    protected $rules = [
        'tasks.title' => 'required|string',
        'tasks.description' => 'required|string',
        'tasks.evidence' => 'required',
        'tasks.evaluate' => 'required',
        'tasks.punctuation' => 'required',
    ];
    public function mount(){
        $this->add_task();
    }
    public function add_task(){
        $this->tasks = new ModelsTask();
        $this->tasks->evidence = 'yes';
        $this->tasks->evaluate = 'yes';
        $this->tasks->punctuation = 5;
    }
    public function store_task(){
        $this->validate();
        try {
            $this->tasks->activity_id = $this->activity->id;
            $this->tasks->save();
            $this->add_task();
            $activity = Activity::find($this->activity->id);
            $this->activity = $activity;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function render()
    {
        return view('livewire.activity.show.task');
    }
}
