<?php

namespace App\Http\Livewire;

use App\Models\Request as ModelsRequest;
use Livewire\Component;

class Request extends Component
{
    public function accept(ModelsRequest $request){
        $request->user->roles()->sync($request->role_id);
        $request->state = 2;
        $request->save();
    }
    public function refuse(ModelsRequest $request){
        
    }
    public function render()
    {
        return view('livewire.request',[
            'request' => ModelsRequest::where(['state'=>1,'type'=>2])->get()
        ]);
    }
}
