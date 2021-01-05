<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;
use Livewire\WithFileUploads;

class Data extends Component
{
    use WithFileUploads;
    public $laboralCertificate = [];

    public function mount (){
        $this->addExperience();
    }

    public function addExperience (){
        $position = count($this->laboralCertificate);
        $this->laboralCertificate[$position]['company'] = null;
        $this->laboralCertificate[$position]['utc_inicio'] = null;
        $this->laboralCertificate[$position]['utc_fin'] = null;
        $this->laboralCertificate[$position]['position'] = null;
        $this->laboralCertificate[$position]['location'] = null;
    }
    
    public function render()
    {
        return view('livewire.teacher.data');
    }
}
