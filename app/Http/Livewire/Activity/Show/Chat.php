<?php

namespace App\Http\Livewire\Activity\Show;

use App\Models\Activity;
use App\Models\Comment;
use Livewire\Component;

class Chat extends Component
{
    public $activity;
    public $comment;

    protected $rules = [
        'comment' => 'required|string'
    ];

    public function mount(){
        $this->restore_comment();
    }
    public function send(){
        $this->validate();
        try {
            $comment = Comment::create([
                'user_id' => auth()->user()->id,
                'body' => $this->comment,
                'priority' => 1,
                'privacy' => 'public',
                'activity_id' => $this->activity->id
            ]);
            $this->restore_comment();
            $activity = Activity::find($this->activity->id);
            $this->activity = $activity;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function restore_comment(){
        $this->comment = null;
    }
    public function render()
    {
        return view('livewire.activity.show.chat',[
            'comments' => $this->activity->comments
        ]);
    }
}
