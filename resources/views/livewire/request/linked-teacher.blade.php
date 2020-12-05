<div class="h-full flex">
    <div class="w-1/2">
        <img src="{{asset('img/linked-teacher.jpg')}}" alt="student" class="object-cover h-full">
    </div>
    <div class="w-1/2 relative p-3 flex flex-col justify-between">
        <i class="fas fa-times absolute top-5 right-5 cursor-pointer hover:text-gray-400" @click="open=false"></i>
        <p class="text-xl">Instructor Vinculado</p>
        <div>
            <p>¿Estas vinculado a la institución y no tienes acceso a nuesta <span class="font-bold">Aula Virtual</span>?</p>
            <p>Solicita aquí tu ingreso y un administrador se encargará de verificar tu solicitud.</p>
        </div>
        <button wire:click="$emitTo('select-role','request',[2,2])" class="bg-blue-500 text-white rounded-lg p-3 hover:bg-blue-600">Solicitar Acceso</button>
    </div>
</div>