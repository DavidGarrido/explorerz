<div class="text-white w-full lg:w-1/4 p-3">
    @if (auth()->user()->children()->count() > 0)
        <div class="flex gap-2 justify-center">
            @foreach (auth()->user()->children as $children)
                <div class="bg-white p-3 overflow-hidden text-gray-400 rounded-lg flex-1 flex flex-col items-center justify-between gap-3 transform hover:scale-105 hover:shadow-lg cursor-pointer">
                    <div class="rounded-full overflow-hidden">
                        <img src="{{$children->profile_photo_url}}" alt="children avatar">
                    </div>
                    <p class="text-center w-full">{{$children->name}}</p>
                    <p class="text-center w-full text-xs">{{$children->email}}</p>
                </div>
            @endforeach
        </div>
    @endif
    @if ($show == 'button')
        <a class="bg-white text-blue-500 p-3 rounded-lg hover:shadow-lg w-full flex justify-center my-3" href="#" wire:click.prevent="$set('show','new_student')">Matricular Nuevo Estudiante</a>
    @endif
    @if ($show == 'new_student')
        <div class="flex flex-col gap-2 text-gray-500">
            <p class="font-bold text-white">Registrar Nuevo estudiante</p>
            @if ($errors->any())
                <div class="bg-red-200 rounded-lg p-3 text-gray-700">
                    <div class="font-medium">{{ __('¡Uy! Algo salió mal.') }}</div>

                    <ul class="mt-3 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="email" wire:model.defer="email" class="p-2 rounded-lg border border-gray-300" placeholder="Correo Electronico">
            <input type="text" wire:model.defer="name" class="p-2 rounded-lg border border-gray-300" placeholder="Nombre">
            <input type="password" wire:model.defer="password" class="p-2 rounded-lg border border-gray-300" placeholder="Contraseña" >
            <input type="password" wire:model.defer="password_2" class="p-2 rounded-lg border border-gray-300" placeholder="Confirmar Contraseña" >
            <select wire:model.defer="typdoc" class="p-2 rounded-lg border border-gray-300">
                <option value="c.c">Cedula de Ciudadania</option>
                <option value="r.c">Registro Civil</option>
                <option value="t.i">Tarjeta de identidad</option>
            </select>
            <input type="number" wire:model.defer="number_doc" class="p-2 rounded-lg border border-gray-300" placeholder="Numero de documento">
            <div class="flex justify-between text-white">
                <a href="#" wire:click.prevent="$set('show','button')">Cancelar</a>
                <a href="#" wire:click.prevent="store">Registrar</a>
            </div>
        </div>
    @endif
</div>
