<div class="h-full">
    <p class="text-xl w-full h-1/12 flex items-center px-3 font-bold">Solicitudes</p>
    <div class="h-1/12 bg-gray-200 w-full flex font-bold">
        <p class="w-1/12 px-3 flex items-center">Nombre</p>
        <p class="w-2/12 px-3 flex items-center">Email</p>
        <p class="w-2/12 px-3 flex items-center">Cargo</p>
        <p class="w-2/12 px-3 flex items-center">Información</p>
        <p class="flex-1 px-3 flex items-center">Acciones</p>
    </div>
    <div class="h-10/12 flex flex-col divide-y divide-gray-200">
        @if (count($request) > 0)
            @foreach ($request as $one_request)       
                <div class=" w-full flex ">
                    <p class="w-1/12 px-3 flex items-center">
                        {{$one_request->user->name}}
                    </p>
                    <p class="w-2/12 px-3 flex items-center">
                        {{$one_request->user->email}}
                    </p>
                    <p class="w-2/12 px-3 flex items-center">
                        {{__($one_request->role->name)}}
                        @switch($one_request->type)
                            @case(1)
                                Nuevo
                                @break
                            @case(2)
                                Vinculado
                                @break                                
                        @endswitch
                    </p>
                    <div class="w-2/12 p-3 flex flex-col gap-1">
                        @if (isset($one_request->user->usertable->full_name) && $one_request->user->usertable->full_name != null)
                            <div class="flex gap-1 text-sm text-green-500 items-center">
                                <i class="fas fa-check "></i>
                                <p>{{$one_request->user->usertable->full_name}}</p>
                            </div>
                        @else
                            <div class="flex gap-1 text-sm text-red-500 items-center">
                                <i class="fas fa-times"></i>
                                <p>Nombre Completo.</p>
                            </div>
                        @endif
                        @if (isset($one_request->user->usertable->number_document) && $one_request->user->usertable->number_document != null && isset($one_request->user->usertable->type_document) && $one_request->user->usertable->type_document != null)
                            <div class="flex gap-1 text-sm text-green-500 items-center">
                                <i class="fas fa-check "></i>
                                <p>{{$one_request->user->usertable->type_document}} - {{ number_format($one_request->user->usertable->number_document)}}</p>
                            </div>
                        @else
                            <div class="flex gap-1 text-sm text-red-500 items-center">
                                <i class="fas fa-times"></i>
                                <p>Numero de Documento.</p>
                            </div>
                        @endif
                        @if (isset($one_request->user->usertable->utc_nacimiento) && $one_request->user->usertable->utc_nacimiento != null)
                            <div class="flex gap-1 text-sm text-green-500 items-center">
                                <i class="fas fa-check "></i>
                                <p>{{ date('d-m-Y',$one_request->user->usertable->utc_nacimiento)}}</p>
                            </div>
                        @else
                            <div class="flex gap-1 text-sm text-red-500 items-center">
                                <i class="fas fa-times"></i>
                                <p>Fecha de Nacimiento.</p>
                            </div>
                        @endif
                        @if (isset($one_request->user->usertable->age) && $one_request->user->usertable->age != null)
                            <div class="flex gap-1 text-sm text-green-500 items-center">
                                <i class="fas fa-check "></i>
                                <p>{{$one_request->user->usertable->age}} años.</p>
                            </div>
                        @else
                            <div class="flex gap-1 text-sm text-red-500 items-center">
                                <i class="fas fa-times"></i>
                                <p>Edad.</p>
                            </div>
                        @endif
                        @if (isset($one_request->user->usertable->sex) && $one_request->user->usertable->sex != null)
                            <div class="flex gap-1 text-sm text-green-500 items-center">
                                <i class="fas fa-check "></i>
                                <p>{{__($one_request->user->usertable->sex)}}</p>
                            </div>
                        @else
                            <div class="flex gap-1 text-sm text-red-500 items-center">
                                <i class="fas fa-times"></i>
                                <p>Género.</p>
                            </div>
                        @endif
                        @if (isset($one_request->user->usertable->size) && $one_request->user->usertable->size != null)
                            <div class="flex gap-1 text-sm text-green-500 items-center">
                                <i class="fas fa-check "></i>
                                <p>{{$one_request->user->usertable->size}}</p>
                            </div>
                        @else
                            <div class="flex gap-1 text-sm text-red-500 items-center">
                                <i class="fas fa-times"></i>
                                <p>Talla.</p>
                            </div>
                        @endif
                        @if (isset($one_request->user->usertable->eps) && $one_request->user->usertable->eps != null)
                            <div class="flex gap-1 text-sm text-green-500 items-center">
                                <i class="fas fa-check "></i>
                                <p>{{$one_request->user->usertable->eps}}</p>
                            </div>
                        @else
                            <div class="flex gap-1 text-sm text-red-500 items-center">
                                <i class="fas fa-times"></i>
                                <p>E.P.S</p>
                            </div>
                        @endif
                        @if ($one_request->role_id == 4)                            
                            @if (isset($one_request->user->usertable->last_certificated) && $one_request->user->usertable->last_certificated != null)
                                <div class="flex gap-1 text-sm text-green-500 items-center underline">
                                    <i class="fas fa-check "></i>
                                    <a href="#" wire:click.prevent="download_certificated('{{$one_request->user->usertable->last_certificated}}',{{$one_request->user->id}})">Ultimo Certificado.</a>
                                    <a href="{{route('certificate',[$one_request->user->id, $one_request->user->usertable->last_certificated])}}" target="blanck">Ver</a>
                                </div>
                            @else
                                <div class="flex gap-1 text-sm text-red-500 items-center">
                                    <i class="fas fa-times"></i>
                                    <p>Ultimo Certificado</p>
                                </div>
                            @endif
                        @endif
                        @if ($one_request->role_id == 2)                    
                            @if (isset($one_request->user->usertable->hv) && $one_request->user->usertable->hv != null)
                                <div class="flex gap-1 text-sm text-green-500 items-center underline">
                                    <i class="fas fa-check "></i>
                                    <a href="#" wire:click.prevent="download('{{$one_request->user->usertable->hv}}',{{$one_request->user->id}})">Hoja de Vida.</a>
                                    <a target="blanck" href="{{route('viewer',[$one_request->user->id, $one_request->user->usertable->hv])}}">ver</a>
                                </div>
                            @else
                                <div class="flex gap-1 text-sm text-red-500 items-center">
                                    <i class="fas fa-times"></i>
                                    <p>Hoja de Vida</p>
                                </div>
                            @endif                            
                        @endif
                    </div>
                    <div class="flex-1 px-3 flex items-center gap-3">
                        <button class="p-3 rounded-lg text-white bg-green-500" wire:click="accept({{$one_request}})">Aceptar</button>
                        <button class="p-3 rounded-lg text-white bg-red-500" wire:click="refuse({{$one_request}})">Rechazar</button>
                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-gray-50 flex items-center justify-center h-56 w-full">
                <p>No hay Solicitudes pendientes</p>
            </div>            
        @endif
    </div>
</div>
