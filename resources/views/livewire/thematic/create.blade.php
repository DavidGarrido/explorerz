<div class="flex flex-col gap-2">
    <p>Crear tematica para el curso {{$course->id}}</p>
    @if (session()->has('message'))
        <p class="text-green-500">{{session('message')}}</p>
    @endif
    <input class="p-3 border-2 border-gray-200 rounded-lg" type="text" wire:model="name" placeholder="Titulo">
    <textarea class="p-3 border-2 border-gray-200 rounded-lg" wire:model="description" cols="30" rows="10" placeholder="Descripción"></textarea>
    <button wire:click="create" class="p-3 rounded-md text-white bg-gray-800">Crear</button>
    <div>
        @if (count($all_thematics)>0)
            @foreach ($all_thematics as $thematic)
                <p>{{$thematic->name}}</p>
            @endforeach
        @else
            <p class="text-xs">No tienes tematicas asignadas a este curso</p>
        @endif
    </div>
</div>
