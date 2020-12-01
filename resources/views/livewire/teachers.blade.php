<div class="w-full h-full ">
    
    <p class="text-2xl font-bold h-1/12 flex items-center px-5">Profesores</p>
    <div class="w-full h-1/12 px-5 font-bold flex  items-center bg-gray-200 shadow-md">
        <div class="w-1/12">Id</div>
        <div class="w-3/12">Nombre</div>
        <div class="flex-1">Email</div>
    </div>
    <div class=" divide-y divide-gray-200  h-10/12 overflow-auto shadow-md">
        @foreach ($teachers as $teacher)
            <div class=" w-full h-16 px-5  flex  items-center cursor-pointer hover:bg-gray-200">
                <p class="w-1/12 font-bold">{{$teacher->id}}</p>
                <p class="w-3/12">{{$teacher->name}}</p>
                <p class="flex-1">{{$teacher->email}}</p>
            </div>
        @endforeach
    </div>
</div>