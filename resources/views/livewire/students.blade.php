<div class=" w-full   h-full " x-data="{open: @if(isset($student->id)) true @else false @endif}">
    <div x-show="open" class="w-full bg-black fixed inset-0 h-screen bg-opacity-50 flex items-center justify-center">
        <div class="bg-white shadow-md w-1/2">
                @if (isset($student->id))
                    @livewire('student.show', ['student' => $student], key($student->id))
                @endif 
        </div>
    </div>   
    <p class="text-2xl font-bold h-1/12 flex items-center px-5">Estudiantes</p>
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
