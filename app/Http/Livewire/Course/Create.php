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
    protected $listeners = ['show_course'];


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
    public function dimension_name($id)
    {        
        switch($id){
            case  1: return 'Corporal'; break;
            case  2: return 'Cognitiva'; break;
            case  3: return 'Comunicativa'; break;
            case  4: return 'Etica'; break;
            case  5: return 'Estetica'; break;
            case  6: return 'Actitudinal'; break;
            case  7: return 'Valorativa'; break;
            case  8: return 'Matemáticas'; break;
            case  9: return 'Humanidades'; break;
            case  10: return 'Ciencias Naturales';  break;
            case  11: return 'Ciencias Sociales';  break;
            case  12: return 'Educación Artística';  break;
            case  13: return 'Educación Etica';  break;
            case  14: return 'Educación Fisica';  break;
            case  15: return 'Educación Religiosa';  break;
            case  16: return 'Tecnologia e informatica';  break;
            case  17: return 'Ciencias Politicas';  break;
            case  18: return 'Filosofia'; break;
        }
    }
    public function hour($hour){
        if ($hour < 12) {
            return $hour.' a.m';
        }
        if ($hour == 12) {
            return $hour.' m';
        }
        if ($hour > 12) {
            return ($hour-12).' p.m';
        }
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
