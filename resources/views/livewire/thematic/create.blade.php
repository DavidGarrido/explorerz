<div class="flex flex-col gap-2" x-data="{open:false}">
    <button @click="open=true" class="bg-green-500 w-48 text-white p-2 text-sm">Agregar tematica</button>
    @if (session()->has('message'))
        <p class="text-green-500">{{session('message')}}</p>
    @endif
    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 w-full h-screen flex items-center justify-center">
        <div class="bg-white p-3 flex flex-col gap-2 rounded-md">
            <input class="p-3 border-2 border-gray-200 rounded-lg" type="text" wire:model.defer="name" placeholder="Titulo">
            <textarea class="p-3 border-2 border-gray-200 rounded-lg" wire:model.defer="description" cols="30" rows="10" placeholder="Descripción"></textarea>
            <button wire:click="create" class="p-3 rounded-md text-white bg-gray-800" @click="open=false">Crear</button>
            <button @click="open=false" class="p-3 rounded-md text-white bg-red-500">Cancelar</button>
        </div>
    </div>
    <div class="flex flex-col gap-2 divide-y divide-gray-200 py-2 items-center ">
        <p>Tematicas creadas en este curso:</p>
        @if (count($all_thematics)>0)
            @foreach ($all_thematics as $thematic)
                <div class="flex flex-col w-full py-2">
                    <p class="text-black">{{$thematic->name}}</p>
                    <livewire:activity.create :thematic="$thematic" :key="$loop->index">
                </div>
            @endforeach
        @else
            <p class="text-xs">No tienes tematicas asignadas a este curso</p>
        @endif
    </div>
</div>
