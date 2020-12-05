<div class="h-full flex">
    <div class="w-1/2">
        <img src="{{asset('img/teacher-new.jpg')}}" alt="student" class="object-cover h-full">
    </div>
    <div class="w-1/2 relative p-3 flex flex-col justify-between">
        <i class="fas fa-times absolute top-5 right-5 cursor-pointer hover:text-gray-400" @click="open=false"></i>
        <p class="text-xl">Instructor Nuevo</p>
        <div>
            <p>¿Quieres ser parte de nuestro equipo de instructores?</p>
            <p>¿Cumples con los requisitos para aplicar a este cargo?</p>
            <p>No lo pienses mas, has tu solicitud y llena el formulario que encontraras en el siguiente paso, uno de nuestros administradores se encargará de verificar tus documentos y se pondra en contacto con tigo.</p>
        </div>
        <button wire:click="$emitTo('select-role','request',[2,1])" class="bg-blue-500 text-white rounded-lg p-3 hover:bg-blue-600">Aplicar al cargo</button>
    </div>
</div>
