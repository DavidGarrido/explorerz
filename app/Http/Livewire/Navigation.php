<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class Navigation extends Component
{
    public $content = '';

    protected $queryString = [
        "content" =>['except' => ''],
     ];
    



    public function render()
    {
        return view('livewire.navigation');
    }
}
