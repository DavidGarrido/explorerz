<div class="h-full w-full flex overflow-auto scroll items-center flex-col gap-3 p-3">
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
        @if ($course_selected == 'none')
            <p class="font-bold text-white text-2xl p-3">¡Estamos listos para Empezar!</p>
            <p>Gracias por confiar en nosotros.</p>
        @else
            <p class="font-bold text-white text-2xl p-3">Sube el certificado de {{$course->group}}.</p>            
            <div
                class="w-full h-full  flex justify-center items-center"
                x-data="data()"
                x-on:livewire-upload-start="isUploading = true, progress = 0, before = false, during = true"
                x-on:livewire-upload-finish=" charget = true, preview(), isUploading = false, during = false, after = true"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress, progressBar()"
            >
                <div class="w-full h-full flex items-center justify-center">                
                    <input type="file" wire:model="cretificated" accept="application/pdf" id="certificate" class="hidden">
                    <label
                        x-show="before" 
                        for="certificate" 
                        class="p-3 cursor-pointer   border-2 border-white border-dashed w-1/2 h-6/12 flex items-center justify-center rounded-lg flex-col opacity-50 hover:opacity-75"
                        >
                        <p class="text-3xl text-white" x-show="!isUploading">Seleccionar Archivo</p>
                    </label>
                    <div x-show="during" class="w-full rounded-lg flex flex-col items-center text-white text-2xl p-5" x-show="isUploading">
                        <p class="font-bold">Estamos Cargando el Certificado <i class="fas fa-smile-beam"></i> </p>
                        <div class="flex w-full justify-center gap-3">                            
                            <p x-text="progress"></p>
                            <p x-show="isUploading">%</p>
                        </div>
                        <div class="w-full h-10 rounded-lg overflow-hidden ">                            
                            <div id="progressBar" class="bg-green-500 h-10 rounded-lg w-0"></div>
                        </div>
                    </div>
                    <div x-show="after">
                        <p class="text-white text-2xl font-bold" x-text="progress"></p>
                    </div>
                </div>
            </div>
        @endif
        <a class="bg-orange-500 text-white p-3 rounded-xl" href="#" wire:click.prevent="$set('course_selected', '')">Volver atras</a>
    @endif
    <script>
        function data(){
            return{
                isUploading : false,
                charget: false,
                progress: 0,
                before:true,
                during:false,
                after:false,
                progressBar(){document.getElementById('progressBar').style.width = this.progress+'%'},
                preview(){
                    const certificate = document.getElementById('certificate');
                    const ruta = certificate.value;
                    const extAccept = /(.pdf)$/i;
                    this.progress = '¡Documento Cargado!';
                    document.getElementById('progressBar').style.width = '100%';
                    if(!extAccept.exec(ruta))
                    {
                        alert('Selecciona un archivo permitido');
                        certificate.value = '';
                        return false;
                    }
                    else
                    {

                    }
                }
            }
        }
    </script>
</div>
