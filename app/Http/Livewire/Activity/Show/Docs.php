<?php

namespace App\Http\Livewire\Activity\Show;

use Livewire\Component;

class Docs extends Component
{
    public $activity;
    public $documentos = [];
    public function mount(){
        foreach ($this->activity->materials as $material) {
            if (strstr($material->file,'.pdf')) {
                $this->documentos[count($this->documentos)] = [$material->file,$material->comments];
            }
        }
    }
    public function download($file){
        return response()->download(storage_path('app/'.$file));
    }
    public function render()
    {
        return view('livewire.activity.show.docs');
    }
}
