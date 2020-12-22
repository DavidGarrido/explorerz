<div class=" w-full flex md:items-center justify-center relative z-0 overflow-auto bg-blue-500" x-data="{open:false}">
    @if (count(auth()->user()->request)>0)
        @switch(auth()->user()->request[0]->state)
            @case(1)
                @if (auth()->user()->request[0]->type == 1)
                    @switch(auth()->user()->request[0]->role->id)
                        @case(2)
                            @livewire('teacher.data')
                            @break
                        @case(3)
                            @livewire('parent.data')
                            @break
                        @case(4)
                            @livewire('student.data')
                            @break
                    @endswitch
                @else
                    <div>
                        <p>Tienes una Solicitud de {{__(auth()->user()->request[0]->role->name)}} pendiente</p>
                    </div>
                @endif                
                @break
            @case(3)
                <p>Tu solicitud fue rechazada</p>                
                @break
            @case(4)
                <p>Tu cuenta esta suspendida</p>
                @break
                
        @endswitch
    @else
        <div x-show="open" class="absolute bg-black bg-opacity-50 inset-0 z-50 flex justify-center items-center">
            <div class="bg-white rounded-lg w-10/12 xl:w-1/2 h-10/12 xl:h-6/12 overflow-hidden shadow-2xl relative">
                <div class="absolute inset-0 flex z-50 transform scale-0 items-center justify-center bg-white" wire:loading.class="transform scale-100">
                    <img src="{{asset('img/loader.gif')}}" alt="loader">
                </div>
                @switch($show)
                    @case('new-student')                        
                        @livewire('request.form-new-student')
                        @break
                    @case('new-teacher')
                        @livewire('request.form-new-teacher')
                        @break
                    @case('registered-student')
                        @livewire('request.registered-student')
                        @break
                    @case('linked-teacher')
                        @livewire('request.linked-teacher')
                        @break
                    @case('guardian')
                        @livewire('request.guardian')
                        @break
                    @default
                        
                @endswitch
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 overflow-auto md:overflow-visible  w-full">
            <p class="col-start-1 col-end-2 md:col-end-4  text-center py-5 uppercase text-white roboto font-bold text-2xl">Gracias por tu registro.</p>
            <p class="col-start-1 col-end-w md:col-end-4 w-full text-center p-3 text-white"> Selecciona tu método de ingreso al <span class="font-bold">Aula Virtual</span></p>

            <div class="flex justify-center xl:justify-end">
                <div class="w-full m-3 md:w-56 h-96 rounded-lg shadow-xl bg-white overflow-hidden transition duration-300 ease-in-out transform md:hover:scale-110 ">
                    <div class="h-6/12 w-full bg-gray-400 overflow-hidden">
                        <img src="{{asset('img/student.jpg')}}" alt="students" class="w-full md:h-full  object-cover">
                    </div>
                    <p class="font-bold h-2/12 w-full flex items-center justify-center text-lg">Estudiante</p>
                    <div class="h-2/12 w-full flex justify-center items-center py-1 px-2">
                        <a href="#" wire:click.prevent="$set('show','registered-student')" class="bg-blue-500 text-white rounded-lg h-full w-full flex items-center justify-center cursor-pointer hover:bg-blue-600" @click="open=true">Matriculado</a>
                    </div>
                    <div class="h-2/12 w-full flex justify-center items-center py-1 px-2">
                        <a href="#" wire:click.prevent="$set('show','new-student')" class="bg-orange-500 text-white rounded-lg h-full w-full flex items-center justify-center hover:bg-orange-600 cursor-pointer" @click="open=true">Nuevo</a>
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <div class="w-full m-3 md:w-56 h-96 rounded-lg shadow-xl bg-white overflow-hidden transition duration-300 ease-in-out transform md:hover:scale-110">
                    <div class="h-6/12 w-full bg-gray-400 overflow-hidden">
                        <img src="{{asset('img/teacher.jpg')}}" alt="teachers" class="w-full md:h-full  object-cover">
                    </div>
                    <p class="font-bold h-2/12 w-full flex items-center justify-center text-lg">Profesor</p>
                    <div class="h-2/12 w-full flex justify-center items-center py-1 px-2">
                        <a href="#" wire:click.prevent="$set('show','linked-teacher')" class="bg-blue-500 text-white rounded-lg h-full w-full flex items-center justify-center cursor-pointer hover:bg-blue-600" @click="open=true">Vinculado</a>
                    </div>
                    <div class="h-2/12 w-full flex justify-center items-center py-1 px-2">
                        <a href="#" wire:click.prevent="$set('show','new-teacher')" class="bg-orange-500 text-white rounded-lg h-full w-full flex items-center justify-center hover:bg-orange-600 cursor-pointer" @click="open=true">Nuevo</a>
                    </div>
                </div>
            </div>

            <div class="flex justify-center xl:justify-start">
                <div class="w-full m-3 md:w-56 h-96 rounded-lg shadow-xl bg-white overflow-hidden transition duration-300 ease-in-out transform md:hover:scale-110">
                    <div class="h-6/12 w-full bg-gray-400 overflow-hidden">
                        <img src="{{asset('img/parents.jpg')}}" alt="parents" class="w-full md:h-full  object-cover">
                    </div>
                    <p class="font-bold h-2/12 w-full flex items-center justify-center text-lg">Asistente</p>
                    <div class="h-4/12 w-full flex justify-center items-center py-1 px-2">
                        <a href="#" wire:click.prevent="$set('show','guardian')" class="bg-blue-500 h-6/12 text-white rounded-lg  w-full flex items-center justify-center cursor-pointer hover:bg-blue-600" @click="open=true">Solicitar</a>
                    </div>
                    {{-- <div class="h-2/12 w-full flex justify-center items-center py-1 px-2">
                        <a href="#" wire:click.prevent="" class="bg-blue-500 text-white rounded-lg h-full w-full flex items-center justify-center">Enlace</a>
                    </div> --}}
                </div>

            </div>
        </div>
    @endif
</div>
