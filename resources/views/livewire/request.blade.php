<div class="h-full">
    <p class="text-xl w-full h-1/12 flex items-center px-3 font-bold">Solicitudes</p>
    <div class="h-1/12 bg-gray-200 w-full flex font-bold">
        <p class="w-1/12 px-3 flex items-center">Nombre</p>
        <p class="w-2/12 px-3 flex items-center">Email</p>
        <p class="w-2/12 px-3 flex items-center">Cargo</p>
        <p class="flex-1 px-3 flex items-center">Acciones</p>
    </div>
    <div class="h-10/12 flex flex-col divide-y divide-gray-200">
        @foreach ($request as $one_request)
            
            
            <div class="h-16  w-full flex ">
                <p class="w-1/12 px-3 flex items-center">
                    {{$one_request->user->name}}
                </p>
                <p class="w-2/12 px-3 flex items-center">
                    {{$one_request->user->email}}
                </p>
                <p class="w-2/12 px-3 flex items-center">
                    {{__($one_request->role->name)}}
                </p>
                <div class="flex-1 px-3 flex items-center gap-3">
                    <button class="p-3 rounded-lg text-white bg-green-500" wire:click="accept({{$one_request}})">Aceptar</button>
                    <button class="p-3 rounded-lg text-white bg-red-500" wire:click="refuse({{$one_request}})">Rechazar</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
