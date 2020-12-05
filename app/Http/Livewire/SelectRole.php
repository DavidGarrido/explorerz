<?php

namespace App\Http\Livewire;

use App\Models\DataAdmin;
use App\Models\DataParent;
use App\Models\DataStudent;
use App\Models\DataTeacher;
use App\Models\Request;
use Livewire\Component;

class SelectRole extends Component
{
    public $show;
    protected $listeners = ['request'];
    public function request($data) {
        $request = Request::create([
            'user_id' => auth()->user()->id,
            'role_id' => $data[0],
            'type' => $data[1],
            'state' => 1
        ]);
        switch ($data[0]) {
            case 1:
                $data = DataAdmin::create();
                $type = 'App\Models\DataAdmin';
                break;
            case 2:
                $data = DataTeacher::create();
                $type = 'App\Models\DataTeacher';
                break;
            case 3:
                $data = DataParent::create();
                $type = 'App\Models\DataParent';
                break;
            case 4:
                $data = DataStudent::create();
                $type = 'App\Models\DataStudent';
                break;
        }
        $request->user->usertable_id = $data->id;
        $request->user->usertable_type = $type;
        $request->user->save();
        return redirect()->to('/dashboard');
    }
    public function render()
    {
        return view('livewire.select-role');
    }
}
