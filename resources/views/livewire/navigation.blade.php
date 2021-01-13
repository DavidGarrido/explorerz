<div class="flex w-full">
    <div class="fixed flex justify-center items-center text-5xl text-white font-bold inset-0 w-full h-screen bg-white bg-opacity-25 z-50 transform scale-0" wire:loading.class="transform scale-100">
        <p>Cargando...</p>
    </div>
    <nav class="w-64 h-full bg-blue-700 hidden md:flex flex-col items-start text-sm text-gray-500">
        <ul class=" w-full flex flex-col pl-5 text-white font-bold">
            <li class="@if($content == '')bg-white text-blue-700 @endif relative rounded-tl-full rounded-bl-full @if($content != '') hover:bg-blue-800 @endif">
                @if ($content == '')
                    <div class="absolute w-5 h-5 right-0 bottom-full overflow-hidden">
                        <div class=" h-10 w-10 rounded-full absolute right-0 bottom-0 pointer"></div>
                    </div>
                    <div class="absolute w-5 h-5 right-0 top-full overflow-hidden z-10">
                        <div class=" h-10 w-10 rounded-full absolute right-0 top-0 pointer"></div>
                    </div>                    
                @endif
                <a class="block p-4 " wire:click.prevent="$set('content', '')" href="#">Inicio</a>
            </li>
            <li class="@if($content == 'cursos')bg-white text-blue-700 @endif relative rounded-tl-full rounded-bl-full @if($content != 'cursos') hover:bg-blue-800 @endif">
                @if ($content == 'cursos')
                    <div class="absolute w-5 h-5 right-0 bottom-full overflow-hidden">
                        <div class=" h-10 w-10 rounded-full absolute right-0 bottom-0 pointer"></div>
                    </div>
                    <div class="absolute w-5 h-5 right-0 top-full overflow-hidden z-10">
                        <div class=" h-10 w-10 rounded-full absolute right-0 top-0 pointer"></div>
                    </div>                    
                @endif
                <a class="block p-4 " wire:click.prevent="$set('content', 'cursos')" href="#">Cursos</a>
            </li>
            <li class="@if($content == 'clubes')bg-white text-blue-700 @endif relative rounded-tl-full rounded-bl-full @if($content != 'clubes') hover:bg-blue-800 @endif">
                @if ($content == 'clubes')
                    <div class="absolute w-5 h-5 right-0 bottom-full overflow-hidden">
                        <div class=" h-10 w-10 rounded-full absolute right-0 bottom-0 pointer"></div>
                    </div>
                    <div class="absolute w-5 h-5 right-0 top-full overflow-hidden z-10">
                        <div class=" h-10 w-10 rounded-full absolute right-0 top-0 pointer"></div>
                    </div>                    
                @endif
                <a class="block p-4 " wire:click.prevent="$set('content', 'clubes')" href="#">Clubes</a>
            </li>
            @can('haveaccess', 'user.index')
                <li class="@if($content == 'students')bg-white text-blue-700 @endif relative rounded-tl-full rounded-bl-full @if($content != 'students') hover:bg-blue-800 @endif">
                    @if ($content == 'students')
                        <div class="absolute w-5 h-5 right-0 bottom-full overflow-hidden">
                            <div class=" h-10 w-10 rounded-full absolute right-0 bottom-0 pointer"></div>
                        </div>
                        <div class="absolute w-5 h-5 right-0 top-full overflow-hidden z-10">
                            <div class=" h-10 w-10 rounded-full absolute right-0 top-0 pointer"></div>
                        </div>                    
                    @endif
                    <a href="#" class="block p-4" wire:click.prevent="$set('content', 'students')">Estudiantes</a>
                </li>
                <li class="@if($content == 'teachers')bg-white text-blue-700 @endif relative rounded-tl-full rounded-bl-full @if($content != 'teachers') hover:bg-blue-800 @endif">
                    @if ($content == 'teachers')
                        <div class="absolute w-5 h-5 right-0 bottom-full overflow-hidden">
                            <div class=" h-10 w-10 rounded-full absolute right-0 bottom-0 pointer"></div>
                        </div>
                        <div class="absolute w-5 h-5 right-0 top-full overflow-hidden z-10">
                            <div class=" h-10 w-10 rounded-full absolute right-0 top-0 pointer"></div>
                        </div>                    
                    @endif
                    <a href="#" class="block p-4" wire:click.prevent="$set('content', 'teachers')">Profesores</a>
                </li>   
                <li class="@if($content == 'parents')bg-white text-blue-700 @endif relative rounded-tl-full rounded-bl-full @if($content != 'parents') hover:bg-blue-800 @endif">
                    @if ($content == 'parents')
                        <div class="absolute w-5 h-5 right-0 bottom-full overflow-hidden">
                            <div class=" h-10 w-10 rounded-full absolute right-0 bottom-0 pointer"></div>
                        </div>
                        <div class="absolute w-5 h-5 right-0 top-full overflow-hidden z-10">
                            <div class=" h-10 w-10 rounded-full absolute right-0 top-0 pointer"></div>
                        </div>                    
                    @endif
                    <a href="#" class="block p-4" wire:click.prevent="$set('content', 'parents')">Padres</a>
                </li>          
                <li class="@if($content == 'request')bg-white text-blue-700 @endif relative rounded-tl-full rounded-bl-full @if($content != 'request') hover:bg-blue-800 @endif">
                    @if ($content == 'request')
                        <div class="absolute w-5 h-5 right-0 bottom-full overflow-hidden">
                            <div class=" h-10 w-10 rounded-full absolute right-0 bottom-0 pointer"></div>
                        </div>
                        <div class="absolute w-5 h-5 right-0 top-full overflow-hidden z-10">
                            <div class=" h-10 w-10 rounded-full absolute right-0 top-0 pointer"></div>
                        </div>                    
                    @endif
                    <a href="#" class="p-4 flex justify-between" wire:click.prevent="$set('content', 'request')">
                        <p>Solicitudes</p>
                        @if (count($request) > 0)                            
                            <p class="bg-gray-800 flex h-5 w-5 justify-center items-center text-xs rounded-md text-white">{{count($request)}}</p>
                        @endif
                    </a>                    
                </li>
            @endcan
            <li class="@if($content == 'settings')bg-white text-blue-700 @endif relative rounded-tl-full rounded-bl-full @if($content != 'settings') hover:bg-blue-800 @endif">
                    @if ($content == 'settings')
                        <div class="absolute w-5 h-5 right-0 bottom-full overflow-hidden">
                            <div class=" h-10 w-10 rounded-full absolute right-0 bottom-0 pointer"></div>
                        </div>
                        <div class="absolute w-5 h-5 right-0 top-full overflow-hidden z-10">
                            <div class=" h-10 w-10 rounded-full absolute right-0 top-0 pointer"></div>
                        </div>                    
                    @endif
                <a class="block p-4 " wire:click.prevent="$set('content', 'settings')" href="#">Configuración</a>
            </li>
        </ul>
    </nav>
    <div class="bg-blue-700 h-full overflow-auto flex-1 pr-3 pb-3">
        @switch($content)
            @case('')
                @livewire('init')
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
            @case('request')
                @livewire('request')
                @break
            @default
                <p>Pagina no encontrada</p>
                
        @endswitch
    </div>
</div>
