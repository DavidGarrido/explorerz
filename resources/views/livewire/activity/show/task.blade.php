<div class="w-full flex flex-col">
    <div class="flex flex-col gap-2">
        @foreach ($activity->tasks as $task)
            <livewire:activity.show.one-task :task="$task" :key="'task'.$loop->index">
        @endforeach
    </div>
    @if (auth()->user()->roles[0]->name == 'teacher')
        <div class="py-3 flex flex-col gap-2">
            <p class="font-bold">Tarea Nueva</p>
            @if ($errors->any())
                <div class="bg-red-200 text-gray-600 p-3 rounded-lg">
                    <div class="font-medium">{{ __('¡Uy! Algo salió mal.') }}</div>
            
                    <ul class="mt-3 list-disc list-inside text-sm ">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="text" wire:model="tasks.title" placeholder="Titulo" class="border border-gray-200 p-2 rounded-lg w-full">
            <textarea wire:model="tasks.description" placeholder="Descripción" class="border border-gray-200 p-2 rounded-lg w-full h-32"></textarea>
            <div class="flex gap-2">
                <div class="flex gap-2 items-center w-4/12 rounded-full border border-gray-200 p-1">
                    <p style="color: " class="text-sm">Evidencias:</p>
                    <label for="yes">Si</label>
                    <input type="radio" wire:model="tasks.evidence" value="yes" id="yes" style="color: ">
                    <label for="no">No</label>
                    <input type="radio" wire:model="tasks.evidence" value="no" id="no" style="color: ">
                </div>
                <div class="flex gap-2 items-center w-8/12 rounded-full border border-gray-200 p-1">
                    <p style="color: " class="text-sm">Evaluable:</p>
                    <label for="ev_yes">Si</label>
                    <input type="radio" wire:model="tasks.evaluate" value="yes" id="ev_yes" style="color: ">
                    <label for="ev_no">No</label>
                    <input type="radio" wire:model="tasks.evaluate" value="no" id="ev_no" style="color: ">
                    @if ($tasks->evaluate == 'yes')
                        <div class="flex flex-1 flex-wrap">
                            <p class="text-sm w-1/4">Max.</p>
                            <p class="w-3/4" style="color: ">
                                {{$tasks->punctuation}}
                            </p>
                            <input class="w-full" type="range" wire:model="tasks.punctuation" min="0" max="5" step="0.1">
                        </div>
                    @endif
                </div>
            </div>
            <button class="bg-gray-400 p-3 rounded-lg text-white outline-none" wire:click="store_task">Agregar</button>
        </div>
    @endif
</div>
