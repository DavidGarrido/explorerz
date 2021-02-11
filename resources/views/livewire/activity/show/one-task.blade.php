<div class="flex flex-wrap divide-y divide-gray-200 justify-between divide-x divide-gray-200 w-full border border-gray-200 rounded-lg">
    <div class="flex-1 flex flex-col gap-2 p-2">
        <p class="font-bold text-2xl">{{$task->title}}</p>
        {{--  <p>{{$task->id}}</p>  --}}
        <p>{{$task->description}}</p>
    </div>
    <div class="flex flex-col w-20">
        <p class="font-bold text-xs text-center ">Evaluable</p>
        <p class="px-2 py-1 w-full text-center">{{__($task->evaluate)}}</p>
        @if ($task->evaluate == 'yes')
            <i class="fas fa-checked"></i>
        @endif
    </div>
    <div class="flex flex-col w-20 items-center">
        <p class="font-bold text-xs text-center">Puntuación</p>
        @if ($task->evaluate == 'yes')
            @if (auth()->user()->roles[0]->name == 'teacher')                
                <p class="px-2 py-1  text-center w-10 h-10 flex items-center justify-center border-2 border-dotted border-green-500 rounded-full font-bold text-green-500 ">{{$task->punctuation}}</p>
            @endif
            @if (auth()->user()->roles[0]->name == 'student')
                @if (auth()->user()->evidences()->where('task_id',$task->id)->count() == 0)                    
                    <p class="text-gray-400">max: {{$task->punctuation}}</p>
                @else
                    @if (auth()->user()->evidences()->where('task_id',$task->id)->first()->calification > 0)
                        <p>{{auth()->user()->evidences()->where('task_id',$task->id)->first()->calification}} / {{$task->punctuation}}</p>
                    @else
                        <p class="text-xs">Pendiente</p>
                    @endif
                @endif
            @endif
        @else
            <i class="fas fa-ban"></i>
        @endif
    </div>
    <div class="flex flex-col w-20 items-center">
        <p class="font-bold text-xs text-center">Evidencia</p>
        @if ($task->evidence == 'yes' && auth()->user()->evidences()->where('task_id',$task->id)->count() == 0)
            @if (auth()->user()->roles[0]->name == 'student')                
                <input type="file" wire:model="file" id="file{{$task->id}}" class="hidden" accept="image/*,.pdf">
                <label for="file{{$task->id}}" class="cursor-pointer ">
                    <i class="fas fa-upload"></i>
                </label>
            @endif
        @endif
        @if ($task->evidence == 'yes' && auth()->user()->evidences()->where('task_id',$task->id)->count() > 0)
            @php
                $evidencia = auth()->user()->evidences()->where('task_id',$task->id)->first();
            @endphp
            @if ($evidencia->file != null)
                @php
                    $archivo = explode('/', $evidencia->file);
                @endphp
                <a href="{{route('evidence',[$archivo[1], $archivo[2]])}}" target="blanck">Ver</a>
            @endif        
        @endif
        @if ($task->evidence == 'no')
            <i class="fas fa-ban"></i>
        @endif
    </div>
    @if (auth()->user()->roles[0]->name == 'teacher')
        <div class="w-full divide-y divide-gray-200">
            {{--  {{$task->activity->schedule[0]->courses[0]->users()->count()}}  --}}
            @foreach ($task->activity->schedule[0]->courses[0]->users as $user)
                @if ($user->roles[0]->name == 'student')
                    <div class="flex justify-between p-2">
                        <p>{{$user->name}}</p>                    
                        @if ($task->evidences()->where('user_id',$user->id)->count() == 1)
                            @livewire('activity.show.evidence', ['evidence' => $task->evidences()->where('user_id',$user->id)->first()], key('evidence'.$task->id.$user->id))
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>