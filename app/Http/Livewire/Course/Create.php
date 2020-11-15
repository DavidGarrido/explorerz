<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\Role;
use Livewire\Component;

class Create extends Component
{

    public $action = 'view';

    public $tutors, $role;

    public $title, $description, $allcourses;
    public $capacity = 0 ;

    public $students;

    public $show;

    public $tutor_active = [];
    public $tutor_active_id = [];
    public $tutor_disp = [];

    public function mount(){
        $this->role = Role::find(4);
        $this->tutors = Role::find(2);

        $this->students = $this->role->users;
        $this->allcourses = auth()->user()->courses;

        if (count(auth()->user()->courses) > 0) {
            $this->show = Course::find(auth()->user()->courses[0]->id);
            foreach ($this->show->users as $user) {
                if($user->roles[0]->id == 2){
                    array_push($this->tutor_active, $user);
                    array_push($this->tutor_active_id, $user->id);
                }
            }

            foreach ($this->tutors->users as $user ) {
                if (!in_array($user->id,$this->tutor_active_id)) {
                    array_push($this->tutor_disp, $user);
                }
            }
        }

    }

    public function refresh(){
        $this->reset(['tutor_active', 'tutor_active_id', 'tutor_disp']);

        $course = Course::find($this->show->id); 
        $tutors = Role::find(2);

        foreach ($course->users as $user) {
            if($user->roles[0]->id == 2){
                array_push($this->tutor_active, $user);
                array_push($this->tutor_active_id, $user->id);
            }
        }

        foreach ($tutors->users as $user ) {
            if (!in_array($user->id,$this->tutor_active_id)) {
                array_push($this->tutor_disp, $user);
            }
        }
    }

    
    public function create(){
            $this->refresh();

            $course = new Course();
            $course->title = $this->title;
            $course->description = $this->description;
            $course->capacity = $this->capacity;
            $course->save();

            $this->reset('title', 'description', 'capacity');
            $course->users()->attach(auth()->user()->id);
            $this->allcourses = auth()->user()->courses;
    }

    public function show_course($id){
        $this->show = Course::find($id);
        $this->refresh();
        $this->action = 'view';
    }

    public function asing_tutor($id){


        $this->show->users()->attach($id);
        $this->refresh();
    }

    public function remove_tutor($id){
        $this->show->users()->detach($id);
        $this->refresh();
    }

    public function update(){
        $this->refresh();
        $this->action = 'update';
    }

    public function render()
    {
        return view('livewire.course.create');
    }
}
