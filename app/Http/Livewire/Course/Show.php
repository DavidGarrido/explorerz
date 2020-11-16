<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\Role;
use Livewire\Component;

class Show extends Component
{
    public $course;
    public $alltutors;
    public $this_tutors = [];
    public $this_tutors_ids = [];
    public $tutors_disp = [];
    public $action = 'view';
    public $title, $description, $capacity;

    public function mount(){
        $tutors = Role::find(2);
        $this->alltutors = $tutors->users;
        $this->sync_tutors();
        $this->title = $this->course->title;
        $this->description = $this->course->description;
        $this->capacity = $this->course->capacity;
    }
    public function setAction(){
        $this->reset_all();
        $this->action = 'update';
        $this->sync_tutors();
    }
    public function sync_tutors(){
        foreach($this->course->users as $user){
            if ($user->roles[0]->id == 2) {
                array_push($this->this_tutors, $user);
                array_push($this->this_tutors_ids, $user->id);
            }
        }
        foreach ($this->alltutors as $tutor) {
            if (!in_array($tutor->id,$this->this_tutors_ids)) {
                array_push($this->tutors_disp, $tutor);
            }
        }
    }
    public function reset_all(){
        $this->reset(['this_tutors','this_tutors_ids','tutors_disp']);
    }
    public function cancel(){
        $this->reset_all();
        $this->action = 'view';
        $this->sync_tutors();
    }
    public function save (){
        $this->reset_all();
        $course = Course::find($this->course->id);
        $course->title = $this->title;
        $course->description = $this->description;
        $course->capacity = $this->capacity;
        $course->save();
        $this->sync_tutors();
        $this->action = 'view';
        $this->course = $course;
    } 
    public function asign_tutor($id){
        $this->reset_all();
        $this->course = Course::find($this->course->id);
        $this->course->users()->attach($id);
        $this->sync_tutors();
    }
    public function remove_tutor($id){
        $this->reset_all();
        $this->course = Course::find($this->course->id);
        $this->course->users()->detach($id);
        $this->sync_tutors();
    }
    public function render()
    {
        return view('livewire.course.show');
    }
}
