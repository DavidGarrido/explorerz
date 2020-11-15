<div class="w-full p-3 rounded-lg bg-white flex flex-col justify-end gap-2">
    <input class="w-full border-2 border-gray-100 rounded-md mt-3 p-2" type="text" wire:model.defer="title" placeholder="{{__('Course Title')}}">
    <textarea class="w-full border-2 border-gray-100 rounded-md mt-3 p-2" wire:model.defer="description" placeholder="{{__('Description')}}"></textarea>
    <div class="flex items-center gap-2">
        <label for="capacity">
            <p>Capacidad</p>
        </label>
        <input type="number" wire:model.defer="capacity" class="w-40 p-2 border-2 border-gray-100 text-right" id="capacity">
    </div>
    <button class="bg-gray-800 hover:bg-gray-900 p-2 rounded-md text-white w-40" wire:click="create">Crear</button>
    {{-- @foreach ($students as $student)
        <div class="flex text-gray-500 flex-wrap">
            <p class="w-1/3">{{$student->name}}</p>
            <p class="w-2/3">{{$student->email}}</p>
        </div>
    @endforeach --}}
    <div x-data="{open:true}" class="w-full p-3 rounded-lg bg-white mt-3">
        <h1 class="text-xl">Mis Cursos</h1>
        @foreach ($allcourses as $course)
            <div class="flex gap-3 divide-x divide-gray-200 ">
                <p class="font-bold w-3/12 p-2">{{$course->title}}</p>
                <p class="w-9/12  p-2">{{$course->description}}</p>
                <button wire:click="show_course({{$course->id}})" @click="open=true">Ver</button>
            </div>
        @endforeach
        <div x-show="open" class="w-full h-screen absolute inset-0 bg-black bg-opacity-50 p-16 shadow-xl">
            <div class="bg-white rounded-lg w-full h-full relative p-3 flex">

                <p @click="open=false" class="absolute top-0 right-0 p-3 cursor-pointer">Cerrar</p>
                <div class="w-9/12 p-3">
                    @if ($action == 'view')
                        <p class="text-3xl">{{$show->title}}</p>
                        <p>{{$show->description}}</p>
                        <button wire:click.defer="update">Editar</button>
                    @endif
                </div>
                <div class="w-3/12 pt-10 flex flex-col gap-5">
                    <div class="flex flex-col gap-3 border-2 border-gray-100 p-3 rounded-lg divide-y divide-gray-200">
                        <p class="text-xl">Tutores Disponibles</p>
                        @if (count($tutor_disp)>0)
                            @foreach ($tutor_disp as $tutor)
                                <div class="flex justify-between items-center p-2">
                                    <p>{{$tutor->name}}</p>
                                    <button wire:click="asing_tutor({{$tutor->id}})" class="bg-gray-800 rounded-md p-2 text-sm text-white">Asignar</button>
                                </div>
                            @endforeach
                        @else
                            <p class="py-2 text-sm">No hay tutores disponibles para este curso</p>                         
                        @endif
                    </div>
                    <div class="flex flex-col gap-3 border-2 border-gray-100 p-3 rounded-lg divide-y divide-gray-200">
                        <p class="text-xl">Tutores Activos</p>
                        @if (count($tutor_active)>0)
                            @foreach ($tutor_active as $tutor)
                                <div class="flex justify-between items-center p-2">
                                    <p>{{$tutor->name}}</p>
                                    <button wire:click="remove_tutor({{$tutor->id}})" class="bg-gray-800 rounded-md p-2 text-sm text-white">Remover</button>
                                </div>
                            @endforeach
                        @else
                            <p class="py-2 text-sm">No Tienes tutores activos en este curso</p>                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
