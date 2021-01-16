<?php

namespace App\Http\Livewire\Activity\Show;

use Livewire\Component;

class Video extends Component
{
    public $activity;
    public $videos = [];
    public $video_selected;
    public function mount(){
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
        if (count($this->videos) > 0) {
            $this->video_selected = $this->videos[0];
        }
    }
    public function render()
    {
        return view('livewire.activity.show.video');
    }
}
