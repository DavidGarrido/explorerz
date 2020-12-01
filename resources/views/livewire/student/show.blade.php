<div>
    <div class="bg-gray-200 h-16 w-full flex items-center justify-between px-5">
        <div class="flex gap-3 items-center">
            <div class="w-10 h-10 overflow-hidden rounded-full"> 
                <img class="w-10 h-10" src="{{$student->profile_photo_url}}">               
            </div>
            <p class="font-bold">{{$student->name}}</p>
        </div>        
        <i class="fas fa-times cursor-pointer hover:text-blue-500" @click="open=false"></i>
    </div>
    <div class="bg-white p-3 max-h-72 overflow-auto">
        <p>{{$student->usertable}}</p>
        @if ($student->parent_id == null)
            <input class="p-1 border-2 border-gray-200" placeholder="Seleccionar Acudiente" type="email" wire:model="parent">
            <div>
                @if (count($parents) > 0)
                    @foreach ($parents as $parent)
                    <div class="flex gap-3 h-16 items-center cursor-pointer" wire:click="sync_parent({{$parent->id}})">
                        <p>{{$parent->name}}</p>
                        <p>{{$parent->email}}</p>
                    </div>
                    @endforeach
                @else
                    <p>No hay elementos asociados a este email</p>
                @endif
            </div>
        @else
            <div class="flex flex-wrap">
                <p class="w-full text-sm text-gray-700 font-bold">Acudiente:</p>
                <div class="w-1/2 flex gap-2">
                    <p class="font-bold">Nombre:</p>
                    <p>{{$student->parent->name}}</p>
                </div>
                <div class="w-1/2 flex gap-2">
                    <p class="font-bold">Email:</p>
                    <p>{{$student->parent->email}}</p>
                </div>
                <div class="w-1/2 flex gap-2">
                    <p class="font-bold">Celular:</p>
                    <p>{{$student->parent->usertable->cel_one}}</p>
                </div>
                <div class="w-1/2 flex gap-2">
                    <p class="font-bold">Celular 2:</p>
                    <p>{{$student->parent->usertable->cel_two}}</p>
                </div>
                <div class="w-1/2 flex gap-2">
                    <p class="font-bold">Vinculo:</p>
                    <p>{{$student->parent->usertable->relationship}}</p>
                </div>
                <div class="w-1/2 flex gap-2">
                    <p class="font-bold">Dirección:</p>
                    <p>{{$student->parent->usertable->address}}</p>
                </div>
            </div>
        @endif
    </div>
    <div class="bg-gray-200 h-16 w-full flex items-center justify-between px-5">
    </div>
</div>
