<div class="h-full w-full flex  items-center flex-col  bg-cover bg-center" style="background-image: url({{asset('./img/student-new.jpg')}})">
    @if (!isset(auth()->user()->usertable->last_certificated) || auth()->user()->usertable->last_certificated == null)
        @if ($course_selected == '')
            <p class="text-3xl text-white py-5">Selecciona el último grado aprovado</p>
            <div class="grid grid-cols-3 items-center gap-2 w-1/2 mx-auto">    
                @foreach ($courses as $course)
                    @if ($course->id != 14)                    
                        <input type="radio" wire:model="course_selected" value="{{$course->id}}" class="hidden last_course" id="course{{$course->id}}">
                        <label for="course{{$course->id}}" class="bg-white w-full p-3 text-gray-400 rounded-lg cursor-pointer hover:bg-orange-500 hover:text-white flex justify-center items-center">{{$course->group}}</label>
                    @endif
                @endforeach
                <input type="radio" wire:model="course_selected" value="none" class="hidden last_course" id="none">
                <label for="none" class="bg-white w-full p-3 text-gray-400 rounded-lg cursor-pointer hover:bg-orange-500 hover:text-white flex justify-center items-center">Ninguno anterior.</label>
            </div>
        @else
            <div class="w-full h-full overflow-auto flex justify-center bg-black bg-opacity-50 p-3">
                @if ($course_selected == 'none')
                    <p class="font-bold text-white text-2xl p-3">¡Estamos listos para Empezar!</p>
                    <p>Gracias por confiar en nosotros.</p>
                @else 
                    <div class="w-1/4 relative">
                        <a class="bg-orange-500 text-white py-3 px-10 rounded-xl absolute top-0 right-full text-center" href="#" wire:click.prevent="$set('course_selected', '')">
                            <i class="fas fa-arrow-left"></i>
                        </a>       
                        @livewire('student.form-data')
                    </div>
                @endif
            </div>
        @endif
    @else
        <div class="flex h-full w-full items-center justify-center">
            <div class="flex flex-col items-center">
                <p class="text-5xl font-roboto font-bold text-white">Gracias por tu Inscripción</p>
                <p class="text-white font-roboto text-2xl">Tu solicitud está siendo validada.</p>
            </div>
            {{--  <button wire:click="download('{{auth()->user()->usertable->last_certificated}}')">Descargar</button>  --}}
        </div>
    @endif
</div>
