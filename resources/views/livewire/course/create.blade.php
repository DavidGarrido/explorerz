<div class="w-full p-3  bg-gray-100 flex flex-col justify-end gap-2 relative">
    <div class="fixed inset-0 w-full h-16 flex justify-center items-center transform scale-0" wire:loading.class="transform scale-100">
        <p class="text-red-500">Cargando...</p>
    </div>
    
    {{auth()->user()->parent}}

    @if (auth()->user()->roles[0]->id == 2)
        @for ($i = 1; $i < 7; $i++)
            @switch($i)
                @case(1) @php $day='Lunes' @endphp @break
                @case(2) @php $day='Martes' @endphp @break
                @case(3) @php $day='Miercoles' @endphp @break
                @case(4) @php $day='Jueves' @endphp @break
                @case(5) @php $day='Viernes' @endphp @break
                @case(6) @php $day='Sabado' @endphp @break
            @endswitch
            <div class="w-full flex border-2 border-gray-200 shadow-sm bg-white">
                <div class="w-1/12 flex items-center justify-center bg-gray-200">
                    <p>{{$day}}</p>
                </div>
                <div class="w-11/12 flex flex-col divide-y divide-gray-200">
                    @foreach (auth()->user()->schedule->where('day', $i)->sortBy('start') as $schedule)
                        <div class="flex divide-x divide-gray-200">
                            <p class="p-3 w-1/12">{{$this->hour($schedule->start)}}</p>
                            <p class="p-3 w-2/12">{{$this->dimension_name($schedule->dimension)}}</p>
                            <p class="p-3 w-2/12">{{$schedule->courses[0]->model->group}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endfor        
    @endif

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
            <div class="w-full p-3 rounded-lg  mt-3">
                <h1 class="text-xl">Mis Cursos</h1>
                @if (count($allcourses) > 0)
                    <div class="flex flex-wrap gap-2">
                        @foreach ($allcourses as $course)
                            <div class="flex gap-3 w-52 h-52 divide-x divide-gray-200 items-center justify-center p-2 cursor-pointer bg-white rounded-lg shadow-lg" wire:click="show_course({{$course->id}})">
                                <p class="font-bold  p-2 ">{{$course->model->group}}</p>
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
