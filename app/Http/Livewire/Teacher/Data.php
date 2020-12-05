<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;
use Livewire\WithFileUploads;

class Data extends Component
{
    use WithFileUploads;
    public $photo;

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $this->photo->store('photos');
    }
    public function render()
    {
        return view('livewire.teacher.data');
    }
}
