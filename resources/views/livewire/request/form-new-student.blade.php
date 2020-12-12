<div class="h-full flex flex-col md:flex-row">
    <div class="w-full h-6/12 md:w-1/2 md:h-full">
        <img src="{{asset('img/student-new.jpg')}}" alt="student" class="object-cover h-full">
    </div>
    <div class="w-full md:w-1/2 h-6/12 md:h-full relative flex flex-col justify-between p-3 overflow-auto">
        <i class="fas fa-times absolute top-5 right-5 cursor-pointer hover:text-gray-400" @click="open=false"></i>
        <p class="text-xl">Estudiante Nuevo</p>
        <p class="text-xs sm:text-sm">Si nunca has estado registrado en nuesta institución y quieres empezar tu proceso de aprendizaje puedes solicitar tu vinculación en esta seccion, seguido a esto debes hacer la carga de los documentos solicitados y uno de nuestros administradores se encargará de verificar tu solicitud.</p>
        <button wire:click="$emitTo('select-role','request',[4,1])" class="bg-blue-500 text-white rounded-lg p-3 hover:bg-blue-600 w-full">Hacer solicitud</button>
    </div>
</div>
