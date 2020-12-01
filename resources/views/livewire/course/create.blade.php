<div class="w-full p-3  bg-gray-100 flex flex-col justify-end gap-2 relative">
    <div class="fixed inset-0 w-full h-16 flex justify-center items-center transform scale-0" wire:loading.class="transform scale-100">
        <p class="text-red-500">Cargando...</p>
    </div>
    
    {{auth()->user()->parent}}
    @foreach (auth()->user()->children as $student)
        <p>{{$student->courses}}</p>
    @endforeach
    @switch($show)
        @case('all')
            @can('haveaccess', 'course.create')
                <select wire:model="model">
                    @foreach ($models as $model)
                        <option value="{{$model->id}}">{{$model->group}}</option>
                    @endforeach
                </select>
                @error('title')
                    <p class="text-red-600">{{$message}}</p>    
                @enderror
                @error('description')
                    <p class="text-red-600">{{$message}}</p>
                @enderror
                <button class="bg-gray-800 hover:bg-gray-900 p-2 rounded-md text-white w-40" wire:click="create">Crear</button>  
            @endcan   
            <div class="w-full p-3 rounded-lg bg-white mt-3">
                <h1 class="text-xl">Mis Cursos</h1>
                @if (count($allcourses) > 0)
                    <div class="flex flex-col gap-2">
                        @foreach ($allcourses as $course)
                            <div class="flex gap-3 divide-x divide-gray-200 items-center  hover:bg-gray-300 p-2 cursor-pointer" wire:click="show_course({{$course->id}})">
                                <p class="font-bold w-3/12 p-2">{{$course->model->group}}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="py-5">No tienes cursos asignados.</p>          
                @endif
            </div>            
            @break
        @case('course')
            <a class=" bg-gray-200 fixed top-0 left-64 w-16 h-16 text-gray-500 flex items-center justify-center text-2xl" href="#" wire:click.prevent="all">
                <i class="fas fa-angle-left"></i>
            </a>
            @livewire('course.show', ['course' => $course], key($course->id))
            @break;
    @endswitch
</div>
