<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\Model_course;
use Livewire\Component;

class Create extends Component
{


    public $allcourses = [];
    public $models;
    public $model = 1;
    public $show= 'all';
    public $course;
    public $active = '';

    protected $queryString = [
        "show"=>['except'=>''],
        "active"=>['except'=>'']
    ];


    public function mount(){
        switch (auth()->user()->roles[0]->id) {
            case 1:
                $this->allcourses = Course::all();
                break;
            case 2:
            case 3:
            case 4:
                $this->allcourses = auth()->user()->courses;
                break;
        }
        $this->models = Model_course::all();

        if($this->active != ''){
            $this->course = Course::find($this->active);
        }else{
            $this->show = 'all';
        }
        

    }


    
    public function create(){

            $course = new Course();
            $course->model_id = $this->model;
            $course->save();

            $course->users()->attach(auth()->user()->id);
            $this->allcourses = auth()->user()->courses;
    }

    public function show_course($course){
        $this->course = Course::find($course);
        $this->active = $course;
        $this->show = 'course';
    }
    public function all(){
        $this->show = 'all';
        $this->active = '';
    }


    public function render()
    {
        return view('livewire.course.create');
    }
}
