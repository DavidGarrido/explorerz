<div class="w-full h-full p-3 flex flex-col" x-data="data_activity()">
    <div class="fixed bg-black bg-opacity-25 z-50 inset-0 w-full flex justify-center items-center transform scale-0" wire:loading.class="transform scale-100">
        <p class="text-red-500">Cargando...</p>
    </div>
    <div class="h-1/12 flex items-center justify-between">
        <h1 class="text-2xl font-bold">{{$activity->name}}</h1>
    </div>
    <div class="h-11/12 flex">
        <div class="w-64 p-2 flex flex-col gap-1">  
            {{--  <p>{{$activity->description}}</p>  --}}
            {{--  <h1 class="text-3xl">Material de apoyo</h1>  --}}
            <div class="bg-gray-100 rounded-lg flex-1 flex flex-col justify-between p-2">
                <div class="flex text-white rounded-md font-bold justify-between px-3 py-2" style="background-color: {{$activity->schedule[0]->courses[0]->color}}">
                    <p>Videos</p>
                    <p>{{count($videos)}}</p>
                </div>
                <div class="flex flex-col gap-2 w-full py-3 bg-white p-1 rounded-lg">
                    <p>Agregar Material</p>
                    <input type="text" wire:model.defer="data_material.0" placeholder="url" class="border border-gray-200 p-2 rounded-lg outline-none">
                    <input type="file" wire:model = "data_material.1" accept="image/*,.pdf" id="material" class="hidden">
                    <label for="material" class="p-2 border-dotted flex items-center justify-center text-sm rounded-lg border cursor-pointer hover:bg-gray-100" style="border-color: {{$activity->schedule[0]->courses[0]->color}};color:{{$activity->schedule[0]->courses[0]->color}}">Seleccionar Archivo</label>
                    <textarea rows="10" wire:model.defer="data_material.2" placeholder="comentario" class="border border-gray-200 p-2 rounded-lg outline-none"></textarea class="border border-gray-200 p-2 rounded-lg outline-none">
                    <button wire:click="save_material" class="text-white rounded-lg p-3" style="background-color: {{$activity->schedule[0]->courses[0]->color}}">Agregar</button>
                </div>  
            </div>
        </div>
        <div class="flex-1 flex p-2 overflow-auto">
            <div class="w-1/2 flex flex-col">
                <div class="flex flex-col h-0 overflow-hidden relative" style="padding-top: 56.25%">
                    @if (count($videos) > 0)
                        <div class="absolute inset-0">
                            <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{$video_selected}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        
                        </div>
                    @endif
                </div>
                <div class="flex-1 py-2 overflow-auto">
                    <div class="flex flex-wrap gap-3">
                        @foreach ($videos as $video)                
                            <div wire:click="$set('video_selected','{{$video}}')" class="cursor-pointer">
                                <img src="https://img.youtube.com/vi/{{$video}}/default.jpg" alt="video" >
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-start justify-start w-1/2 px-2">
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
