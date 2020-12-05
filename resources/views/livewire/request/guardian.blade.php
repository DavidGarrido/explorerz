<div class="h-full flex">
    <div class="w-1/2">
        <img src="{{asset('img/parents.jpg')}}" alt="student" class="object-cover h-full">
    </div>
    <div class="w-1/2 relative p-3 flex flex-col justify-between">
        <i class="fas fa-times absolute top-5 right-5 cursor-pointer hover:text-gray-400" @click="open=false"></i>
        <p class="text-xl">Asistente</p>
        <div>
            <p>¿Eres el asistente de uno de nuestros estudiantes?</p>
            <p>Solicita el acceso a nuestra plataforma y podras llevar el control del proceso de aprendizaje de el estudiante.</p>
        </div>
        <button wire:click="$emitTo('select-role','request',[3,1])" class="bg-blue-500 text-white rounded-lg p-3 hover:bg-blue-600">Solicitar Acceso</button>
    </div>
</div>