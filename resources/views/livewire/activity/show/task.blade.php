<div class="w-full flex flex-col">
    @foreach ($activity->tasks as $task)
        <div class="flex justify-between divide-x divide-gray-200 w-full border border-gray-200 rounded-lg">
            <div class="flex-1 flex flex-col gap-2 p-2">
                <p class="font-bold text-2xl">{{$task->title}}</p>
                <p>{{$task->description}}</p>
            </div>
            <div class="flex flex-col w-20">
                <p class="font-bold text-xs text-center ">Evaluable</p>
                <p class="px-2 py-1 w-full text-center">{{__($task->evaluate)}}</p>
            </div>
            <div class="flex flex-col w-20">
                <p class="font-bold text-xs text-center">Puntuación</p>
                <p class="px-2 py-1 w-full text-center">{{$task->punctuation}}</p>
            </div>
            <div class="flex flex-col w-20">
                <p class="font-bold text-xs text-center">Evidencia</p>
                <p class="px-2 py-1 w-full text-center">{{__($task->evidence)}}</p>
            </div>
        </div>
    @endforeach
</div>
