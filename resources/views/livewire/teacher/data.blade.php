<div class=" w-full h-full grid grid-cols-3 grid-rows-1">
    <div class=" col-start-1 col-end-3 h-full row-start-1 row-end-2 bg-cover bg-center" style="background-image: url({{asset('img/teacher-new.jpg')}})">

    </div>
    <div class=" h-full col-start-2 col-end-3 row-start-1 row-end-2">
        <svg class="block h-full min-w-48 text-blue-500 " fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
          <polygon points="50,0 100,0 100,100 25,100" />
        </svg>
    </div>

    <div class="bg-blue-500 text-white h-full col-start-3 col-end-4 row-start-1 row-end-2 flex flex-col items-center overflow-auto p-3">
        @if (!isset(auth()->user()->usertable->hv) || auth()->user()->usertable->hv == null)            
            <p class=" font-roboto title w-full text-right">Información</p>
            <div class="text-gray-600 w-full">
                @livewire('teacher.form-data')
            </div>
        @else
            <h1>Tenemos tu Información</h1>
            <p>Tu solicitud está en proceso de validación.</p>
        @endif
        @if (auth()->user()->request[0]->type == 1)
            <p>Agregar Experiencia</p>
            @if (count($laboralCertificate)>0)
                @for ($i = 0; $i < count($laboralCertificate); $i++)
                    <div class="flex gap-3 text-gray-600 w-full flex-col py-3">
                        <input type="text" wire:model="laboralCertificate.{{$i}}.company" placeholder="Compañia" class="p-2 rounded-md outline-none">
                        <input type="date" wire:model="laboralCertificate.{{$i}}.utc_inicio" class="p-2 rounded-md outline-none">
                        <input type="date" wire:model="laboralCertificate.{{$i}}.utc_fin" class="p-2 rounded-md outline-none">
                        <input type="text" wire:model="laboralCertificate.{{$i}}.position" placeholder="Cargo" class="p-2 rounded-md outline-none">
                        <input type="file" accept="application/pdf" wire:model="laboralCertificate.{{$i}}.location">
                    </div>
                @endfor                
            @endif
        @endif
        <a href="#" wire:click.prevent="addExperience()">Agregar</a>
    </div>
</div>