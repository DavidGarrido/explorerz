<?php

namespace App\Http\Livewire\Activity\Show;

use Livewire\Component;

class Img extends Component
{
    public $activity;
    public $imagenes_url = [];
    public $imagenes_file = [];
    public $formats = ['.jpg','.jpeg','.png','.gif','.tiff'];
    public $img_selected;
    public $show;
    public function mount(){
        $this->countImages();
        $this->show = false;
    }
    public function countImages(){
        $this->videos = [];
        foreach ($this->activity->materials as $material ) {
            foreach ($this->formats as $format) {
                if (strstr($material->url,$format)) {
                    $this->imagenes_url[count($this->imagenes_url)] = [$material->url, $material->comments];
                }
                if (strstr($material->file,$format)) {
                    $this->imagenes_file[count($this->imagenes_file)] = [$material->file, $material->comments];
                }
            }
        }
        if (count($this->videos) > 0) {
            $this->video_selected = $this->videos[0];
        }
    }
    public function show_img($url){
        $this->show = true;
        $this->img_selected = $url;
    }
    public function render()
    {
        return view('livewire.activity.show.img');
    }
}
