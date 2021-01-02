<?php

namespace App\Http\Livewire;

use App\Models\Request;
use Livewire\Component;

class Navigation extends Component
{
    public $content = '';
    public $request;

    protected $queryString = [
        "content" =>['except' => ''],
     ];
    protected $listeners = [
        'set_content_to_course',
        'setRequest'
    ];

    public function mount(){
        $this->setRequest();
    }

    public function setRequest(){
        $this->request = Request::where('state',1)->get();
    }

    public function set_content_to_course($id){
        $this->content = 'cursos';
        $this->emitTo('course.create', 'show_course', $id);
    }
    public function render()
    {
        return view('livewire.navigation');
    }
}
