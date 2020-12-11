<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Data extends Component
{
    use WithFileUploads;
    public $hv;
    public $sex, $address, $phone;
    public $id_departamento = 1, $municipio = 1;


    protected $rules = [
        'hv' => "required|mimes:pdf"
    ];

    public function mount(Request $request){
        // $this->data = $request;
    }
    public function save()
    {
        // $this->dimensions = getimagesize($this->photo->path());
        $this->validate();



        $this->hv->storeAs('public/hvs/'.auth()->user()->id,'hoja_de_vida'.'.pdf');
        

        
        auth()->user()->usertable->hv = 'storage/hvs/'.auth()->user()->id.'/hoja_de_vida.pdf';
        auth()->user()->usertable->save();
        $this->reset(['hv']);
        

        
    }
    public function render()
    {
        return view('livewire.teacher.data',[
            'data_departamento' => departamento::find($this->id_departamento)
        ]);
    }
}
