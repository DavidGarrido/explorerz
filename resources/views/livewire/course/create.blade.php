<div class="w-full p-3 rounded-lg bg-white flex flex-col justify-end gap-2">
    <input class="w-full border-2 border-gray-100 rounded-md mt-3 p-2" type="text" wire:model="title" placeholder="{{__('Course Title')}}">
    <textarea class="w-full border-2 border-gray-100 rounded-md mt-3 p-2" wire:model="description" placeholder="{{__('Description')}}"></textarea>
    <div class="flex items-center gap-2">
        <label for="capacity">
            <p>Capacidad</p>
        </label>
        <input type="number" wire:model="capacity" class="w-40 p-2 border-2 border-gray-100 text-right" id="capacity">
    </div>
    <button class="bg-gray-800 hover:bg-gray-900 p-2 rounded-md text-white w-40" wire:click="create">Crear</button>
    {{-- @foreach ($students as $student)
        <div class="flex text-gray-500 flex-wrap">
            <p class="w-1/3">{{$student->name}}</p>
            <p class="w-2/3">{{$student->email}}</p>
        </div>
    @endforeach --}}
    <div class="w-full p-3 rounded-lg bg-white mt-3">
        <h1 class="text-xl">Mis Cursos</h1>
        @foreach ($allcourses as $course)
            <div class="flex gap-3 divide-x divide-gray-200 ">
                <p class="font-bold w-3/12 p-2">{{$course->title}}</p>
                <p class="w-9/12  p-2">{{$course->description}}</p>
            </div>
        @endforeach
    </div>
</div>
