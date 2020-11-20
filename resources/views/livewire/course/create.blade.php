<div class="w-full p-3 rounded-lg bg-white flex flex-col justify-end gap-2">
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
    <div class="w-full p-3 rounded-lg bg-white mt-3">
        <h1 class="text-xl">Mis Cursos</h1>
        @if (count($allcourses) > 0)
            <div class="flex flex-col gap-2">
                @foreach ($allcourses as $course)
                    <div class="flex gap-3 divide-x divide-gray-200 items-center  hover:bg-gray-300 p-2 ">
                        <p class="font-bold w-3/12 p-2">{{$course->model->group}}</p>
                        @livewire('course.show', ['course' => $course], key($course->id))
                    </div>
                @endforeach
            </div>
        @else
            <p class="py-5">No tienes cursos creados.</p>          
        @endif
    </div>
</div>
