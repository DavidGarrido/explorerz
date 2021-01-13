<?php

namespace App\Http\Livewire\Activity;

use App\Models\Activity;
use App\Models\Material;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component
{
    use WithFileUploads;

    public $activity;
    public $data_material;
    public $videos = [];
    public $agreeMaterial;

    protected $queryString = ['agreeMaterial'];

    public function mount(){
        $this->agreeMaterial = false;
        $this->countVideos();
    }
    public function countVideos(){
        $this->videos = [];
        foreach ($this->activity->materials as $material ) {
            if (strstr($material->url,'https://youtu.be')){                
                $id_video = explode( '.be/' , $material->url);
                $this->videos[count($this->videos)] = $id_video[1];
            }
            if (strstr($material->url,'youtube.com')){
                $id_video = explode('v=',$material->url);
                if (count($id_video)>1){
                    $this->videos[count($this->videos)] = $id_video[1];
                }
            }
        }
    }
    public function agree_m(){
        $this->data_material = [null, null, null];
        $this->agreeMaterial = true;
    }
    public function cancel_m(){
        $this->data_material = [];
        $this->agreeMaterial = false;
    }
    public function save_material(){
        try {
            if ($this->data_material[0] != null || $this->data_material[1] != null) {
                $mat = Material::create([
                    'activity_id' => $this->activity->id,
                    'url' => $this->data_material[0],
                    'comments' => $this->data_material[2],
                ]);
                if ($this->data_material[1] != null) {                 
                    $file = $this->data_material[1]->store('materials');
                    $mat->file = $file;
                    $mat->save();
                }
            }
            $this->data_material = [null, null, null];
            $activity = Activity::find($this->activity->id);
            $this->activity = $activity;
            $this->agreeMaterial = false;
            $this->countVideos();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function order_videos($id_video){
        $this->videos[count($this->videos)] = $id_video;
    }
    public function render()
    {
        return view('livewire.activity.show');
    }
}
