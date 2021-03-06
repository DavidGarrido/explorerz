<div x-data="{
isUploading : false,
charget: false,
progress: 0,
successfull:false,
document: '',
progressBar(){document.getElementById('progressBar').style.width = this.progress+'%'},
reset(){
    const certificate = document.getElementById('certificate');
    certificate.value = '';
    this.isUploading = false;
    this.document = '';
    this.successfull = false;
},
preview(){
    const certificate = document.getElementById('certificate');
    this.document = certificate.files[0].name;
    const ruta = certificate.value;
    const extAccept = /(.pdf)$/i;
    document.getElementById('progressBar').innerHTML = '¡Documento Cargado!';
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
}}" class="w-full flex justify-center text-gray-500"
x-on:livewire-upload-start="isUploading = true, progress = 0"
x-on:livewire-upload-finish=" charget = true, preview(), successfull = true"
x-on:livewire-upload-error="isUploading = false"
x-on:livewire-upload-progress="progress = $event.detail.progress, progressBar()">  

    <div class="w-full h-full">
        <div class="w-full h-full flex flex-col items-center">
            <p class="font-bold text-white text-2xl p-3">Certificado del último Grado aprovado.</p>  
            <div x-show="!isUploading" class="w-full py-2">
                <input type="file" wire:model="certificated" accept="application/pdf" id="certificate" class="hidden">
                <label for="certificate" class="p-3 cursor-pointer   border-2 border-white border-dashed w-full h-full flex items-center justify-center rounded-lg flex-col opacity-50 hover:opacity-75">
                    <p class="text-3xl text-white">Seleccionar Archivo</p>
                </label>
            </div>
            <div x-show="isUploading" class="w-full rounded-lg flex flex-col items-center text-white text-2xl py-5" >
                <p x-show="!successfull" class="font-bold">Estamos Cargando el Certificado <i class="fas fa-smile-beam"></i> </p>
                <div x-show="!successfull" class="flex w-full justify-center gap-3">                            
                    <p x-text="progress"></p>
                </div>
                <div class="w-full h-10 rounded-lg overflow-hidden ">                            
                    <div id="progressBar" class="bg-green-500 h-10 rounded-lg w-0 flex items-center justify-center text-lg"></div>
                </div>
            </div>
            <div class="w-full text-white flex flex-col items-center justify-center gap-3 p-3" x-show="successfull">
                <div class="flex gap-5">
                    <i class="fas fa-file-pdf text-5xl"></i>
                    <p x-text="document"></p>
                </div>
                <a href="#" @click.prevent="reset()" wire:click="$set('certificated', null)">Cambiar</a>
            </div>
            <div  class="flex flex-col gap-2 w-full">
                {{--  <p class="text-white text-2xl font-bold" x-text="progress"></p>  --}}
                @error('certificated')
                    <p class="text-white text-xs">* Selecciona un archivo válido.</p>
                @enderror
                <h1 class="text-center text-white text-xl font-bold p-3">Necesitamos Algunos Datos</h1>
                <input type="text" wire:model="full_name" placeholder="Nombre completo" class="p-2 rounded-lg w-full outline-none">
                <div class="flex flex-col grid-cols-2 bg-white p-3 rounded-lg">
                    <p class="w-full">Tipo de documento:</p>
                    <div>
                        <input type="radio" wire:model="type_document" value="c.c" id="cc">
                        <label for="cc">Cedula de ciudadania</label>
                    </div>
                    <div>
                        <input type="radio" wire:model="type_document" value="t.i" id="ti">
                        <label for="ti">Tarjeta de identidad</label>
                    </div>
                    <div>
                        <input type="radio" wire:model="type_document" value="r.c" id="rc">
                        <label for="rc">Registro Civil</label>
                    </div>
                    <div>
                        <input type="radio" wire:model="type_document" value="c.e" id="ce">
                        <label for="ce">Cedula de Extranjeria</label>
                    </div>
                </div>
                <input type="number" wire:model="number_document" placeholder="Numero de documento" class="p-2 rounded-lg w-full outline-none">
                <p class="text-white text-sm">Fecha de Nacimiento:</p>
                <input type="date" wire:model="utc_nacimiento" class="p-2 rounded-lg w-full outline-none">
                <input type="number" wire:model="age" maxlength="2" placeholder="Edad" class="p-2 rounded-lg w-full outline-none">
                <div class="bg-white p-2 rounded-lg flex flex-col gap-1">
                    <p>Genero</p>
                    <div class="flex items-center gap-2">
                        <input type="radio"  value="male" id="male" wire:model="sex">
                        <label for="male">Masculino</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio"  value="female" id="female" wire:model="sex">
                        <label for="female">Femenino</label>
                    </div>
                </div>
                <p class="text-white text-sm">Talla:</p>
                <select wire:model="size" class="p-2 rounded-lg w-full outline-none">
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="8">8</option>
                    <option value="10">10</option>
                    <option value="12">12</option>
                    <option value="14">14</option>
                    <option value="16">16</option>
                    <option value="xs">xs</option>
                    <option value="s">s</option>
                    <option value="m">m</option>
                    <option value="l">l</option>
                    <option value="xl">xl</option>
                </select>
                <input type="text" wire:model="eps" placeholder="E.P.S" class="p-2 rounded-lg w-full outline-none">
                <button wire:click="save()" class="bg-orange-500 text-white p-3 rounded-lg">Guardar</button>
            </div>
        </div>
    </div>
</div>
