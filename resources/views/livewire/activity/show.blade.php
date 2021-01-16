<div class="w-full h-full p-3 flex flex-col" x-data="data_activity()">
    <div class="fixed bg-black bg-opacity-25 z-50 inset-0 w-full flex justify-center items-center transform scale-0" wire:loading.class="transform scale-100">
        <p class="text-red-500">Cargando...</p>
    </div>
    <div class="h-1/12 flex items-center justify-between">
        <h1 class="text-2xl font-bold">{{$activity->name}}</h1>
    </div>
    <div class="h-11/12 flex">
        <div class="w-64 p-2 md:flex flex-col gap-1 hidden">  
            <div class="bg-gray-100 rounded-lg flex-1 flex flex-col justify-between p-2">
                <div class="flex flex-col gap-1">
                    <div class="flex rounded-md font-bold justify-between px-3 py-2 cursor-pointer hover:underline" @if($show_act == 'info') style="background-color: {{$activity->schedule[0]->courses[0]->color}}; color:white" @endif wire:click="$set('show_act','info')">
                        <p>Descripción</p>
                    </div>
                    <div class="flex rounded-md font-bold justify-between px-3 py-2 cursor-pointer hover:underline" @if($show_act == 'video') style="background-color: {{$activity->schedule[0]->courses[0]->color}}; color:white" @endif wire:click="$set('show_act','video')">
                        <p>Videos</p>
                    </div>
                    <div class="flex rounded-md font-bold justify-between px-3 py-2 cursor-pointer hover:underline" @if($show_act == 'img') style="background-color: {{$activity->schedule[0]->courses[0]->color}}; color:white" @endif wire:click="$set('show_act','img')">
                        <p>Imagenes</p>
                    </div>
                    <div class="flex rounded-md font-bold justify-between px-3 py-2 cursor-pointer hover:underline" @if($show_act == 'docs') style="background-color: {{$activity->schedule[0]->courses[0]->color}}; color:white" @endif wire:click="$set('show_act','docs')">
                        <p>Documentos</p>
                    </div>
                    <div class="flex rounded-md font-bold justify-between px-3 py-2 cursor-pointer hover:underline" @if($show_act == 'task') style="background-color: {{$activity->schedule[0]->courses[0]->color}}; color:white" @endif wire:click="$set('show_act','task')">
                        <p>Tareas</p>
                    </div>
                </div>
                <div class="flex flex-col gap-2 w-full py-3 bg-white p-1 rounded-lg">
                    <p>Agregar Material</p>
                    <input type="text" wire:model.defer="data_material.0" placeholder="url" class="border border-gray-200 p-2 rounded-lg outline-none">
                    <input type="file" wire:model = "data_material.1" accept="image/*,.pdf" id="material" class="hidden">
                    <label for="material" class="p-2 border-dotted flex items-center justify-center text-sm rounded-lg border cursor-pointer hover:bg-gray-100" style="border-color: {{$activity->schedule[0]->courses[0]->color}};color:{{$activity->schedule[0]->courses[0]->color}}">Seleccionar Archivo</label>
                    <textarea  wire:model.defer="data_material.2" placeholder="comentario" class="border border-gray-200 p-2 rounded-lg outline-none"></textarea class="border border-gray-200 p-2 rounded-lg outline-none">
                    <button wire:click="save_material" class="text-white rounded-lg p-3" style="background-color: {{$activity->schedule[0]->courses[0]->color}}">Agregar</button>
                </div>  
            </div>
        </div>
        <div class="flex-1 flex flex-col xl:flex-row p-2 overflow-auto">
            <div class="h-full w-8/12">
                @if ($show_act == 'video')
                    @livewire('activity.show.video', ['activity' => $activity], key('activity'.$show_act))
                @endif
                @if ($show_act == 'info')
                    @livewire('activity.show.info', ['activity' => $activity], key('activity'.$show_act))
                @endif
                @if ($show_act == 'img')
                    @livewire('activity.show.img', ['activity' => $activity], key('activity'.$show_act))
                @endif
                @if ($show_act == 'docs')
                    @livewire('activity.show.docs', ['activity' => $activity], key('activity'.$show_act))
                @endif
                @if ($show_act == 'task')
                    @livewire('activity.show.task', ['activity' => $activity], key('activity'.$show_act))
                @endif
            </div>
            <div class="flex flex-wrap items-start justify-start w-4/12 px-2">
                @livewire('activity.show.chat', ['activity' => $activity], key('activitychat'.$show_act))
            </div>
        </div>
    </div>
    <script>
        function data_activity(){
            return{
                agreeMaterial:false
            }
        }
    </script>
</div>
