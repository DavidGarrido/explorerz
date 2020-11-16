<div class="w-full my-3">
    {{--  <button class="p-3 rounded-lg bg-gray-800 text-white" wire:click="create">Agregar Horario</button>  --}}
    {{--  <p>{{$course->schedule}}</p>  --}}
    <div class="flex w-full gap-1">
        <div class="flex flex-col flex-1 gap-1">
            <p class="p-2 bg-green-300 text-white font-bold">Hora</p>
            @for($h = 6; $h < 18; $h++ )
                <p class="p-2 bg-green-200 text-xs">{{$h}}</p>
            @endfor
        </div>
        @for ($i = 1; $i < 7; $i++)
            <div class="flex flex-col flex-1 gap-1">
                @switch($i)
                    @case(1)
                        <p class="p-2 bg-green-300 text-white">{{__('Monday')}}</p>
                        @break
                    @case(2)
                        <p class="p-2 bg-green-300 text-white">{{__('Tuesday')}}</p>
                        @break
                    @case(3)
                        <p class="p-2 bg-green-300 text-white">{{__('Wednesday')}}</p>
                        @break
                    @case(4)
                        <p class="p-2 bg-green-300 text-white">{{__('Thursday')}}</p>
                        @break
                    @case(5)
                        <p class="p-2 bg-green-300 text-white">{{__('Friday')}}</p>
                        @break
                    @case(6)
                        <p class="p-2 bg-green-300 text-white">{{__('Saturday')}}</p>
                        @break
                        
                @endswitch
                @for($h = 6; $h < 18; $h++ )
                    <p class="p-2 bg-green-100 text-xs cursor-pointer hover:bg-green-400 hover:text-white">{{$h}}</p>
                @endfor
            </div>
        @endfor
    </div>
</div>
