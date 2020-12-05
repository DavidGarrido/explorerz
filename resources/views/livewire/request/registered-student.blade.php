<div class="h-full flex">
    <div class="w-1/2">
        <img src="{{asset('img/registered-student.jpg')}}" alt="student" class="object-cover h-full">
    </div>
    <div class="w-1/2 relative p-3 flex flex-col justify-between">
        <i class="fas fa-times absolute top-5 right-5 cursor-pointer hover:text-gray-400" @click="open=false"></i>
        <p class="text-xl">Estudiante Matriculado</p>
        <div>
            <p>¿Estas Vinculado a nuestra institución y aún no tienes acceso?</p>
            <p>No esperes mas para empezar una nueva esperiencia en nuestra <span class="font-bold">Aula Virtual.</span></p>
            <p>Has tu solicitud y uno de nuestros administradores se encargara de habilitarte el acceso a la plataforma.</p>
        </div>
            <button wire:click="$emitTo('select-role','request',[4,2])" class="bg-blue-500 text-white rounded-lg p-3 hover:bg-blue-600">Hacer solicitud</button>
    </div>
</div>
