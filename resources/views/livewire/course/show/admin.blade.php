<div class="relative">
    <div class="flex justify-center gap-1 h-7  w-7 absolute top-5 right-5 z-40">
        <div >
            <div class="h-5 w-5 mt-1 rounded-full cursor-pointer bg-red-500" wire:click="setColor('#F05252')"></div>
            <div class="h-5 w-5 mt-1 rounded-full cursor-pointer bg-gray-500" wire:click="setColor('#6B7280')"></div>
            <div class="h-5 w-5 mt-1 rounded-full cursor-pointer bg-teal-500" wire:click="setColor('#0694A2')"></div>
            <div class="h-5 w-5 mt-1 rounded-full cursor-pointer bg-blue-500" wire:click="setColor('#3F83F8')"></div>
            <div class="h-5 w-5 mt-1 rounded-full cursor-pointer bg-pink-500" wire:click="setColor('#E74694')"></div>
            <div class="h-5 w-5 mt-1 rounded-full cursor-pointer bg-green-500" wire:click="setColor('#0E9F6E')"></div>
            <div class="h-5 w-5 mt-1 rounded-full cursor-pointer bg-orange-500" wire:click="setColor('#FF5A1F')"></div>
            <div class="h-5 w-5 mt-1 rounded-full cursor-pointer bg-yellow-500" wire:click="setColor('#C27803')"></div>
            <div class="h-5 w-5 mt-1 rounded-full cursor-pointer bg-indigo-500" wire:click="setColor('#6875F5')"></div>
            <div class="h-5 w-5 mt-1 rounded-full cursor-pointer bg-purple-500" wire:click="setColor('#9061F9')"></div>
        </div>
    </div>
    <div class="w-full bg-white p-3 shadow-md text-white" style="color: {{$course->color}}">         
        <p class="text-2xl ">{{$course->model->group}}</p>
        <p class="text-xl">Dimensiones:</p>
        <div class="flex gap-2 text-sm">
            <p>{{ $course->model->dimensions()->pluck('name')->join(', ')}}.</p>
        </div>
    </div>
    <div class="w-full flex flex-col xl:flex-row gap-5 my-3">
        <div class="w-full xl:w-6/12 p-2 bg-white shadow-md">
            @livewire('schedule.create', ['course' => $course])
            <div class="bg-white shadow-md p-3 w-full">
                @if (isset($stripe->id))
                    @livewire('schedule.stripe', ['stripe' => $stripe], key($stripe->id))
                @else
                    <p>Seleciona un item para asignar datos.</p>
                @endif
            </div>  
        </div>
        <div class="bg-white w-full xl:w-3/12 shadow-md p-2 flex flex-col">
            <p class="text-xl py-3">Tutores activos</p>
            <div class="h-full">
                @if (count($this_tutors)>0)
                    @foreach ($this_tutors as $tutor)
                        <div class="flex w-full justify-between p-3 items-center">
                            <p>{{$tutor->name}}</p>
                            <button style="color: {{$course->color}}" class=" outline-none" wire:click="remove_tutor({{$tutor->id}})">Remover</button>
                        </div>
                    @endforeach
                @else
                    <p class="text-xs">No tienes tutores asignados a este curso.</p>                    
                @endif
            </div>
            <div x-data="{open:false}" class="h-16 w-full flex justify-end py-2">
                <button @click="open=true" class="text-white p-3 outline-none rounded-sm" style="background-color: {{$course->color}}">Agregar</button>
                <div x-show="open" class="fixed inset-0 bg-black bg-opacity-25 z-50 w-full h-screen flex items-center justify-center py-40">
                    <div class="bg-white shadow-lg w-1/2 max-h-full flex flex-col justify-between">
                        <div class="bg-gray-200 w-full h-16 p-5 flex justify-between items-center">
                            <p class="font-bold text-lg">Asignar Tutor</p>
                            <i @click="open=false" class="fas fa-times cursor-pointer hover:text-orange-500"></i>
                        </div>
                        <div class="p-3 max-h-full overflow-auto">
                            @if (count($tutors_disp)>0)
                                @foreach ($tutors_disp as $tutor)
                                    <div class="flex w-full justify-between p-3 items-center">
                                        <p>{{$tutor->name}}</p>
                                        <button style="color: {{$course->color}}" class=" outline-none" wire:click="asign_tutor({{$tutor->id}})">Asignar</button>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-xl flex items-center justify-center p-20 text-gray-300">No tienes tutores disponibles para este curso.</p>                    
                            @endif
                        </div>
                        <div class="bg-gray-200 w-full h-16 p-2 flex justify-end gap-x-5 items-center">
                            <button @click="open=false">Cancelar</button>
                            <button @click="open=false" class="text-white p-3" style="background-color: {{$course->color}}">Listo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white w-full xl:w-3/12 shadow-md p-2 flex flex-col">
            <p class="text-xl">Estudiantes activos</p>
            <div class="h-full">
                @if (count($this_students)>0)
                    @foreach ($this_students as $student)
                        <div class="flex w-full justify-between p-3 items-center">
                            <p>{{$student->name}}</p>
                            <button style="color: {{$course->color}}" class=" outline-none" wire:click="remove_student({{$student->id}})">Remover</button>
                        </div>
                    @endforeach
                @else
                    <p class="text-xs">No tienes estudiantes asignados a este curso.</p>                    
                @endif
            </div>
            <div x-data="{open:false}" class="h-16 w-full flex justify-end py-2">
                <button @click="open=true" style="background-color: {{$course->color}}" class="text-white p-3 outline-none">Agregar</button>
                <div x-show="open" class="fixed inset-0 bg-black bg-opacity-25 z-50 w-full h-screen flex items-center justify-center py-40">
                    <div class="bg-white shadow-lg w-1/2 max-h-full flex flex-col justify-between">
                        <div class="bg-gray-200 w-full h-16 p-5 flex justify-between items-center">
                            <p class="font-bold text-lg">Asignar Estudiante</p>
                            <i @click="open=false" class="fas fa-times cursor-pointer hover:text-orange-500"></i>
                        </div>
                        <div class="p-3 max-h-full overflow-auto">
                            @if (count($students_disp)>0)
                                @foreach ($students_disp as $student)
                                    <div class="flex w-full justify-between p-3 items-center">
                                        <p>{{$student->name}}</p>
                                        <button  style="color: {{$course->color}}" class="outline-none" wire:click="asign_student({{$student->id}})">Asignar</button>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-xs">No tienes estudiantes disponibles para este curso.</p>                    
                            @endif
                        </div>
                        <div class="bg-gray-200 w-full h-16 p-2 flex justify-end gap-x-5 items-center">
                            <button @click="open=false">Cancelar</button>
                            <button @click="open=false" class="bg-orange-500 text-white p-3">Listo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
