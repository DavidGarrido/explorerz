<?php

namespace App\Http\Livewire;

use App\Models\Request as ModelsRequest;
use Livewire\Component;

class Request extends Component
{
    public function accept(ModelsRequest $request){
        try {
            $request->user->roles()->sync($request->role_id);
            $request->state = 2;
            $request->save();
            $this->emitTo('navigation','setRequest');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function download($route,$user){
        return response()->download(storage_path('app/hvs/'.$user.'/'.$route));
    }
    public function download_certificated($route,$user){
        return response()->download(storage_path('app/certificated/'.$user.'/last_certificated/'.$route));
    }    
    public function refuse(ModelsRequest $request){
        
    }
    public function render()
    {
        return view('livewire.request',[
            'request' => ModelsRequest::where(['state'=>1])->get()
        ]);
    }
}
