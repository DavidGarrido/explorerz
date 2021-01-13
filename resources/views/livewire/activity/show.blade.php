<div class="w-full h-full p-3 flex flex-col" x-data="{agreeMaterial: @if($agreeMaterial) true @else false @endif}">
    <div class="fixed bg-black bg-opacity-25 z-50 inset-0 w-full flex justify-center items-center transform scale-0" wire:loading.class="transform scale-100">
        <p class="text-red-500">Cargando...</p>
    </div>
    <div class="h-1/12 flex items-center justify-between">
        <h1 class="text-2xl font-bold">{{$activity->name}}</h1>
        <button class="p-3 text-white rounded-md font-bold text-sm" wire:click="agree_m" style="background-color: {{$activity->schedule[0]->courses[0]->color}}">Agregar material</button>
        <div class="fixed inset-0 bg-black bg-opacity-25 flex items-center justify-center z-20" x-show="agreeMaterial">
            <div class="flex flex-col gap-2 w-1/4 py-3 bg-white p-3 rounded-lg">
                <div class="h-10 flex justify-between items-center">
                    <p>Agregar Material</p>
                    <i class="fas fa-times cursor-pointer hover:text-gray-900" wire:click="cancel_m"></i>
                </div>
                <input type="text" wire:model="data_material.0" placeholder="url" class="border border-gray-200 p-2 rounded-lg outline-none">
                <input type="file" wire:model = "data_material.1" accept="image/*,.pdf">
                <textarea wire:model="data_material.2" placeholder="comentario"></textarea class="border border-gray-200 p-2 rounded-lg outline-none">
                <button wire:click="save_material" class="text-white rounded-lg p-3" style="background-color: {{$activity->schedule[0]->courses[0]->color}}">Agregar</button>
            </div>            
        </div>
    </div>
    <div class="h-11/12 flex">
        <div class="w-64 p-2 flex flex-col gap-1">  
            {{--  <p>{{$activity->description}}</p>  --}}
            {{--  <h1 class="text-3xl">Material de apoyo</h1>  --}}
            <div class="bg-gray-100 rounded-lg flex-1 flex flex-col p-5">
                <div class="flex text-white rounded-md font-bold justify-between px-3 py-2" style="background-color: {{$activity->schedule[0]->courses[0]->color}}">
                    <p>Videos</p>
                    <p>{{count($videos)}}</p>
                </div>
            </div>
        </div>
        <div class="flex-1 p-2 overflow-auto">
            <div class="flex gap-3 flex-wrap">
                @foreach ($videos as $video)                
                    {{--  <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  --}}
                    <img src="https://img.youtube.com/vi/{{$video}}/default.jpg" alt="video">
                @endforeach
            </div>
            {{--  <div class="flex overflow-auto gap-3">
                @foreach ($activity->materials as $material)
                    @if (strstr($material->url,'https://youtu.be'))
                        @php
                            $id_video = explode( '.be/' , $material->url);
                        @endphp
                        @if (count($id_video)>1) 
                        @endif
        
                    @endif
                    @if (strstr($material->url,'youtube.com'))
                        @php
                            $id_video = explode('v=',$material->url);
                        @endphp
                        @if (count($id_video)>1)
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$id_video[1]}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @else
                            <a href="{{$material->url}}" target="blanck" class="underline" style="color:{{$activity->schedule[0]->courses[0]->color}}" >Enlace a youtube</a>
                        @endif
                    @endif
                @endforeach
            </div>  --}}
        </div>
    </div>
</div>
