<div class="flex w-full">
    <div class="fixed flex justify-center items-center text-5xl text-white font-bold inset-0 w-full h-screen bg-white bg-opacity-25 z-50 transform scale-0" wire:loading.class="transform scale-100">
        <p>Cargando...</p>
    </div>
    <nav class="w-64 h-full bg-blue-600 flex flex-col items-start text-sm text-gray-300">
        <ul class=" w-full flex flex-col divide-y divide-blue-700">
            <li class="hover:bg-blue-700"><a class="block p-4 " wire:click.prevent="$set('content', '')" href="#">Inicio</a></li>
            <li class="hover:bg-blue-700">
                <a class="block p-4 " wire:click.prevent="$set('content', 'cursos')" href="#">Cursos</a>
            </li>
            <li class="hover:bg-blue-700">
                <a class="block p-4 " wire:click.prevent="$set('content', 'clubes')" href="#">Clubes</a>
            </li>
            @can('haveaccess', 'user.index')
                <li class="hover:bg-blue-700">
                    <a href="#" class="block p-4" wire:click.prevent="$set('content', 'students')">Estudiantes</a>
                </li>
                <li class="hover:bg-blue-700">
                    <a href="#" class="block p-4" wire:click.prevent="$set('content', 'teachers')">Profesores</a>
                </li>   
                <li class="hover:bg-blue-700">
                    <a href="#" class="block p-4" wire:click.prevent="$set('content', 'parents')">Padres</a>
                </li>             
            @endcan
            <li class="hover:bg-blue-700">
                <a class="block p-4 " wire:click.prevent="$set('content', 'settings')" href="#">Configuración</a>
            </li>
        </ul>
    </nav>
    <div class="bg-gray-100 h-full overflow-auto flex-1">
        @switch($content)
            @case('')
                {{auth()->user()->usertable}}
                @break
            @case('cursos')
                @livewire('course.create')
                @break
            @case('settings')
                @livewire('settings')
                @break
            @case('clubes')
                @livewire('clubes')
                @break
            @case('students')
                @livewire('students')
                @break
            @case('teachers')
                @livewire('teachers')
                @break
            @case('parents')
                @livewire('parents')
                @break
            @default
                <p>Pagina no encontrada</p>
                
        @endswitch
    </div>
</div>
