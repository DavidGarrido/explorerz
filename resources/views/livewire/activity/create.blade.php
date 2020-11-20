<div  x-data="{open:false}" class="pl-10">
    @foreach ($thematic->activities as $activity)
        <p class="text-sm p-1">{{$activity->name}}</p>
    @endforeach
    <button @click="open=true" class="bg-green-400 text-white rounded-md p-1 text-sm">Agregar Actividad</button>
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center" x-show="open">
        <div class="bg-white rounded-md p-3 flex flex-col gap-2">
            <p>Crear actividad para {{$thematic->name}}</p>
            <input class="border-2 border-gray-200 rounded-lg p-3" type="text" wire:model="name" placeholder="Titulo">
            <textarea class="border-2 border-gray-200 rounded-lg p-3" cols="30" rows="10" wire:model="description" placeholder="Descripción"></textarea>
            <button wire:click="create" class="p-3 rounded-md text-white bg-gray-800" @click="open=false">Crear</button>
            <button @click="open=false" class="p-3 rounded-md text-white bg-red-500">Cancelar</button>
        </div>
    </div>
</div>
