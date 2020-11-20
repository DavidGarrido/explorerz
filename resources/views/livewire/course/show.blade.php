<div x-data="{open:false}" class="text-gray-500">
    <button @click="open=true" wire:click="sync_users">Ver</button>
    <div @click.away="open=false" class=" bg-white flex gap-1 p-16 fixed w-full overflow-auto inset-0 h-screen " x-show="open">
        <div class="w-10/12 flex flex-wrap">
            <div class="w-full">         
                    <p class="text-2xl text-gray-500">{{$course->model->group}}</p>
                    <p class="text-xl">Dimensiones:</p>
                    <div class="flex gap-2 text-sm">
                        <p>{{ $course->model->dimensions()->pluck('name')->join(', ')}}.</p>
                    </div>
            </div>
            <div class="w-1/2 p-2">
                @livewire('schedule.create', ['course' => $course])
            </div>
        </div>
        <div class="w-2/12 flex flex-col gap-2">
            <div class="border-2 border-gray-200 rounded-md p-1">
                <p class="text-xl">Tutores activos</p>
                @if (count($this_tutors)>0)
                    @foreach ($this_tutors as $tutor)
                        <div class="flex w-full justify-between p-3 items-center">
                            <p>{{$tutor->name}}</p>
                            <button class="bg-green-500 p-3 rounded-lg text-white" wire:click="remove_tutor({{$tutor->id}})">Remover</button>
                        </div>
                    @endforeach
                @else
                    <p class="text-xs">No tienes tutores asignados a este curso.</p>                    
                @endif
            </div>
            <div class="border-2 border-gray-200 rounded-md p-1">
                <p class="text-xl">Tutores disponibles</p>
                @if (count($tutors_disp)>0)
                    @foreach ($tutors_disp as $tutor)
                        <div class="flex w-full justify-between p-3 items-center">
                            <p>{{$tutor->name}}</p>
                            <button class="bg-green-500 p-3 rounded-lg text-white" wire:click="asign_tutor({{$tutor->id}})">Asignar</button>
                        </div>
                    @endforeach
                @else
                    <p class="text-xs">No tienes tutores disponibles para este curso.</p>                    
                @endif
            </div>
            <div class="border-2 border-gray-200 rounded-md p-1">
                <p class="text-xl">Estudiantes activos</p>
                @if (count($this_students)>0)
                    @foreach ($this_students as $student)
                        <div class="flex w-full justify-between p-3 items-center">
                            <p>{{$student->name}}</p>
                            <button class="bg-green-500 p-3 rounded-lg text-white" wire:click="remove_student({{$student->id}})">Remover</button>
                        </div>
                    @endforeach
                @else
                    <p class="text-xs">No tienes estudiantes asignados a este curso.</p>                    
                @endif
            </div>
            <div class="border-2 border-gray-200 rounded-md p-1">
                <p class="text-xl">Estudiantes disponibles</p>
                @if (count($students_disp)>0)
                    @foreach ($students_disp as $student)
                        <div class="flex w-full justify-between p-3 items-center">
                            <p>{{$student->name}}</p>
                            <button class="bg-green-500 p-3 rounded-lg text-white" wire:click="asign_student({{$student->id}})">Asignar</button>
                        </div>
                    @endforeach
                @else
                    <p class="text-xs">No tienes estudiantes disponibles para este curso.</p>                    
                @endif
            </div>
        </div>
        <button class="bg-gray-800 text-white p-3 rounded-lg absolute top-0 right-0 m-3" @click="open=false">Cerrar</button>    
    </div>
</div>
