<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navigation extends Component
{
    public $content = '';

    protected $queryString = [
        "content" =>['except' => ''],
     ];
    protected $listeners = ['set_content_to_course'];

    public function set_content_to_course($id){
        $this->content = 'cursos';
        $this->emitTo('course.create', 'show_course', $id);
    }
    public function render()
    {
        return view('livewire.navigation');
    }
}
