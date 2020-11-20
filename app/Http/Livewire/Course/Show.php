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
    public $allstudents;
    public $this_students = [];
    public $this_students_ids = [];
    public $students_disp = [];

    public function mount(){
        $tutors = Role::find(2);
        $this->alltutors = $tutors->users;
        $this->sync_tutors();
        $students = Role::find(4);
        $this->allstudents = $students->users;
        $this->sync_students();
    }
    public function sync_users(){
        $this->reset_all();
        $this->sync_tutors();
        $this->sync_students();
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
    public function sync_students(){
        foreach($this->course->users as $user){
            if ($user->roles[0]->id == 4) {
                array_push($this->this_students, $user);
                array_push($this->this_students_ids, $user->id);
            }
        }
        foreach ($this->allstudents as $student) {
            if (!in_array($student->id,$this->this_students_ids)) {
                if(count($student->courses) == 0){
                    array_push($this->students_disp, $student);
                }
            }
        }
    }
    public function reset_all(){
        $this->reset(['this_tutors','this_tutors_ids','tutors_disp', 'this_students','this_students_ids','students_disp']);
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
        $this->sync_students();
    }
    public function asign_student($id){
        $this->reset_all();
        $this->course = Course::find($this->course->id);
        $this->course->users()->attach($id);
        $this->sync_students();
        $this->sync_tutors();
    }
    public function remove_tutor($id){
        $this->reset_all();
        $this->course = Course::find($this->course->id);
        $this->course->users()->detach($id);
        $this->sync_tutors();
        $this->sync_students();
    }
    public function remove_student($id){
        $this->reset_all();
        $this->course = Course::find($this->course->id);
        $this->course->users()->detach($id);
        $this->sync_tutors();
        $this->sync_students();
    }
    public function render()
    {
        return view('livewire.course.show');
    }
}
