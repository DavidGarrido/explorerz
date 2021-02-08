<div class="w-full overflow-auto justify-end gap-2 relative h-full bg-white rounded-bl-xl rounded-br-xl px-3">
    <div x-data="{open: @if(isset($student->id)) true @else false @endif}">
        <div x-show="open" class="w-full bg-black fixed inset-0 h-screen bg-opacity-50 flex items-center justify-center">
            <div class="bg-white shadow-md w-1/2">
                    @if (isset($student->id))
                        @livewire('student.show', ['student' => $student], key($student->id))
                    @endif 
            </div>
        </div>   
    </div>
    <div class="flex justify-between">
        <p class="text-2xl font-bold h-1/12 flex items-center px-5">Estudiantes</p>
        <div x-data="{ new_student: @if($new_student) true @else false @endif }">
            <button class="bg-blue-500 p-3 rounded-lg text-white" wire:click="$set('new_student', true)">Nuevo Estudiante</button>
            <div class="fixed inset-0 bg-black bg-opacity-25 flex justify-center items-center" x-show="new_student">
                <div class="bg-white w-full lg:w-1/2 p-3 rounded-lg flex flex-col gap-2">
                    @if ($errors->any())
                        <div class="bg-red-200 rounded-lg p-3 text-gray-600">
                            <div class="font-medium">{{ __('¡Uy! Algo salió mal.') }}</div>

                            <ul class="mt-3 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input type="email" wire:model="email" class="border border-gray-200 rounded-lg p-3" placeholder="Correo Electronico">
                    <input type="text" wire:model="nombre" class="border border-gray-200 rounded-lg p-3" placeholder="Nombre Completo">
                    <select wire:model="t_doc" class="border border-gray-200 rounded-lg p-3">
                        <option value="c.c">Cedula de ciudadania</option>
                        <option value="t.i">Tarjeta de Identidad</option>
                        <option value="r.c">Registro Civil</option>
                    </select>
                    <input type="number" wire:model="n_doc" class="border border-gray-200 rounded-lg p-3" placeholder="Numero de documento">
                    <div class="flex justify-between items-center">
                        <a href="#" wire:click.prevent="$set('new_student',false)">Cancelar</a>
                        <button wire:click="store" class="bg-blue-500 rounded-lg p-3 text-white">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full h-1/12 px-5 font-bold flex  items-center bg-gray-200 shadow-md">
        <div class="w-1/12"></div>
        <div class="w-3/12">Nombre</div>
        <div class="flex-1">Email</div>
        <div class="flex-1">Curso</div>
        <div class="flex-1">Padre</div>
    </div>
    <div class=" divide-y divide-gray-200  h-10/12 overflow-auto shadow-md">
        @can('haveaccess', 'user.index')
            <div class="divide-y divide-gray-200">
                @foreach ($students as $student)
                    <div class="w-full flex h-16 items-center hover:bg-gray-100 cursor-pointer" @click="open=true" wire:click="show_student({{$student->id}})">
                        <div class="w-1/12 px-3">
                            <div class="rounded-full overflow-hidden w-10 h-10">
                                <img style="w-10 h-10" src="{{$student->profile_photo_url}}" alt="{{$student->name}}">
                            </div>
                        </div>
                        <div class="flex-1 px-3"><p>{{$student->name}}</p></div>
                        <div class="flex-1 px-3"><p>{{$student->email}}</p></div>
                        <div class="flex-1 px-3">
                            @foreach ($student->courses as $course)
                                <a href="#" wire:click.prevent="$emit('set_content_to_course',{{$course->id}})">{{$course->model->group}}</a>
                            @endforeach
                            {{-- <p>{{$student->courses->model->dimensions}}</p> --}}
                        </div>
                        <div class="flex-1 px-3">
                            @if ($student->parent_id != null)
                                <p>{{$student->parent->name}}</p>
                            @else
                                <p class="text-red-500">No definido.</p>
                            @endif
                        </div>
                    </div> 
                @endforeach
            </div>
        @else
            <p>No tienes acceso a esta seccion.</p>
        @endcan
    </div>
</div>
