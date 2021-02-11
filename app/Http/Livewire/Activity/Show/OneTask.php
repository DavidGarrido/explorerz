<?php

namespace App\Http\Livewire\Activity\Show;

use App\Models\Evidence;
use Livewire\Component;
use Livewire\WithFileUploads;

class OneTask extends Component
{
    use WithFileUploads;
    public $task;
    public $file;
    public function updatedFile(){
        $root = storage_path().'/app/evidences';
        if(!file_exists($root)){
            mkdir($root, 0700);
        }
        $directory = storage_path().'/app/evidences/'.$this->task->id;
        if (!file_exists($directory)) {
            mkdir($directory, 0700);
        }
        $file = $this->file->store('evidences/'.$this->task->id);
        Evidence::create([
            'file' => $file,
            'user_id' => auth()->user()->id,
            'task_id' => $this->task->id
        ]);
    }
    public function render()
    {
        return view('livewire.activity.show.one-task');
    }
}
