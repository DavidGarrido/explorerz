<div class=" w-full h-full grid grid-cols-3 grid-rows-1" x-data="actions()">
    <div class=" col-start-1 col-end-3 h-full row-start-1 row-end-2 bg-cover bg-center" style="background-image: url({{asset('img/teacher-new.jpg')}})">

    </div>
    <div class=" h-full col-start-2 col-end-3 row-start-1 row-end-2">
        <svg class="block h-full min-w-48 text-blue-500 " fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
          <polygon points="50,0 100,0 100,100 25,100" />
        </svg>
    </div>

    <div x-show="open" class="fixed inset-0 z-50 text-white">
        <div class="absolute inset-0 z-20 p-5 flex justify-end items-end">
            <a href="#" class="p-3 bg-blue-500 hover:bg-blue-600" @click.prevent="open = false">Entendido</a>
        </div>
        
        <div class="absolute w-36 h-36 z-10 rounded-full pointer profile overflow-visible">
            <div class="absolute top-full text-white font-roboto right-full w-96  ">
                <p class="text-4xl text-right font-dokdo">Ingresa a tu perfil</p>
            </div>
        </div>
    </div>
    <div class="bg-blue-500 text-white h-full col-start-3 col-end-4 row-start-1 row-end-2 flex flex-col items-center overflow-auto p-3">
        <p class=" font-roboto title w-full text-right">Información</p>
        <form wire:submit.prevent="save" enctype="multipart/form-data" class="w-full flex flex-col gap-4">
            <div class="w-full flex items-center  h-10  overflow-hidden border-b border-white">
                <p class="h-10 flex items-center justify-start px-3  w-2/12  font-roboto font-bold">Género:</p>
                <div class="w-10/12 h-10 flex items-center gap-3">
                    <label for="men" class="cursor-pointer">{{__('Men')}}</label>
                    <input type="radio" wire:model="sex" value="men" id="men">
                    <label for="women" class="cursor-pointer">{{__('Women')}}</label>
                    <input type="radio" wire:model="sex" value="women" id="women">
                </div>
            </div>
            <div class="w-full flex items-center  h-10  overflow-hidden border-b border-white">
                <p class="h-10 flex items-center justify-start px-3  w-2/12  font-roboto font-bold">Dirección:</p>
                <div class="w-10/12 h-10 flex items-center">
                    <input type="text" wire:model="address" class="h-10 w-full bg-blue-500 outline-none px-3 ">
                </div>
            </div>
            <div class="w-full flex items-center  h-10  overflow-hidden border-b border-white">
                <p class="h-10 flex items-center justify-start px-3  w-2/12  font-roboto font-bold">Teléfono:</p>
                <div class="w-10/12 h-10 flex items-center">
                    <input type="text" wire:model="phone" x-on:keyup="sync_phone($event)" x-model="phone" class="h-10 w-full bg-blue-500 outline-none px-3 ">
                </div>
                
            </div>
            <div class="w-full flex items-center  h-10  overflow-hidden ">
                <p class="h-10 flex items-center justify-start px-3  w-3/12  font-roboto font-bold">Departamento:</p>
                <div class="w-9/12 h-10 flex items-center">
                    <select class="border-2 border-gray-200 flex-1  p-2 outline-none text-gray-600 " type="text" wire:model="id_departamento">
                        @foreach (App\Models\Departamento::all() as $dep)
                            <option value="{{$dep->id}}">{{$dep->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="w-full flex items-center  h-10  overflow-hidden ">
                <p class="h-10 flex items-center justify-start px-3  w-3/12  font-roboto font-bold">Municiipio:</p>
                <div class="w-9/12 h-10 flex items-center">
                    <select class="border-2 border-gray-200 flex-1  p-2 outline-none text-gray-600 " type="text" wire:model="municipio">
                        @foreach ($data_departamento->municipio as $mun)
                            <option value="{{$mun->id}}">{{$mun->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('photo') <span class="error">{{ $message }}</span> @enderror
            <div
            class="flex"
            x-data="data()"
            x-on:livewire-upload-start="isUploading = true, progress = 0"
            x-on:livewire-upload-finish=" charget = true, preview()"
            x-on:livewire-upload-error="isUploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress, bar()"
            >
                @if ( isset(auth()->user()->usertable->hv) && auth()->user()->usertable->hv != null)
                    <a target="_blank" href="{{storage_path()}}" class="flex flex-col items-center gap-1 hover:text-gray-200">
                        <i class="fas fa-file-pdf text-6xl"></i>
                        <span class="text-xs">Hoja de vida.pdf</span>
                    </a>
                @else
                    <!-- File Input -->
                    <p>Hoja de vida:</p>
                    <input type="file" class="transform scale-0 absolute " wire:model="hv" id="file" accept="application/pdf" >
                    <label for="file" class="relative border border-dashed rounded-lg border-indigo-400 cursor-pointer bg-white text-indigo-400 flex justify-center items-center overflow-hidden h-10 opacity-75 hover:opacity-100  ">
                        <p>Seleccionar Archivo</p>
                        <div class="w-full h-full absolute inset-0 ">
                            <div id="bar" class="h-full bg-green-500 flex items-center justify-center text-white overflow-hidden  @if($hv) w-full @else w-0 @endif "  x-text="progress">
                            </div>
                        </div>
                    </label>
                    <button type="submit" x-show="charget">Guardar</button>
                @endif
                <div id="visor_modal" class="fixed  inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center p-20" x-show="visor">
                    <p>Documento cargado:</p>
                    <i class="fas fa-times absolute top-10 right-10 cursor-pointer" @click="visor=false"></i>
                    <div id="visor" class="w-full h-full"></div>
                </div>
            </div>
        </form>
    </div>
        <script>
            function actions(){
                return {
                    open: false,
                    phone:null,
                    sync_phone(e)
                    {
                        console.log(e.key)
                        if (!isNaN(e.key)) {
                            if (this.phone.length == 3) {
                                console.log('es numero')
                                this.phone = this.phone+'-'
                            }                            
                        }else{
                            this.phone = this.phone.slice(0,-1)
                        }
                    }
                }
            }
            function data(){
                return { 
                    isUploading: false,
                    charget: false,
                    visor: false,
                    progress: 0,
                    bar(){ document.getElementById('bar').style.width = this.progress+'%' },
                    preview()
                    {
                        const archivoInput = document.getElementById('file');
                        const ruta = archivoInput.value;
                        const extPermitidas = /(.pdf)$/i;
                        this.progress = 'Cargado',
                        document.getElementById('bar').style.width = '100%';
                        if(!extPermitidas.exec(ruta))
                        {
                            alert('No has seleccionado un archivo permitido');
                            archivoInput.value = '';
                            return false;
                        }
                        else
                        {
                            if(archivoInput.files && archivoInput.files[0])
                            {
                                const visor = new FileReader();
                                visor.onload= function(e)                                
                                {
                                    document.getElementById('visor').innerHTML = `<embed class="h-full w-full" src="${e.target.result}" >`
                                }
                                visor.readAsDataURL(archivoInput.files[0])
                                this.visor = true
                            }
                        }
                    },
                    
                }
            }
        </script>
</div>