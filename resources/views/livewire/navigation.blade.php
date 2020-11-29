<div class="flex w-full">
    <nav class="w-64 h-full bg-blue-600 flex flex-col items-start text-sm text-gray-300">
        <ul class=" w-full flex flex-col divide-y divide-blue-700">
            <li class="hover:bg-blue-700"><a class="block p-4 " wire:click.prevent="$set('content', '')" href="#">Inicio</a></li>
            <li class="hover:bg-blue-700">
                <a class="block p-4 " wire:click.prevent="$set('content', 'cursos')" href="#">Cursos</a>
            </li>
            <li class="hover:bg-blue-700">
                <a class="block p-4 " wire:click.prevent="$set('content', 'settings')" href="#">Configuración</a>
            </li>
        </ul>
    </nav>
    <div class="bg-gray-100 h-full overflow-auto flex-1">
        @switch($content)
            @case('')
                <p>Página de inicio</p>
                @break
            @case('cursos')
                @livewire('course.create')
                @break
            @case('settings')
                @livewire('settings')
                @break
            @default
                <p>Pagina no encontrada</p>
                
        @endswitch
    </div>
</div>
