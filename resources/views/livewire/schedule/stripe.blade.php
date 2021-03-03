<div class="flex gap-3 items-center">
    {{-- {{$stripe}} --}}
    <div class=" w-full">
            <p class="text-2xl">
            @switch($stripe->dimension)
                {{--  dimension  --}}
                @case(1)  Corporal @break                                                
                @case(2)  Cognitiva @break                                                
                @case(3)  Comunicativa @break
                @case(4)  Etica @break
                @case(5)  Estetica @break
                @case(6)  Actitudinal @break
                @case(7)  Valorativa @break
                @case(8)  Matemáticas @break
                @case(9)  Humanidades @break
                @case(10) Ciencias Naturales @break
                @case(11) Ciencias Sociales @break
                @case(12) Educación Artística @break
                @case(13) Educación Etica @break
                @case(14) Educación Fisica @break
                @case(15) Educación Religiosa @break
                @case(16) Tecnologia e informatica @break
                @case(17) Ciencias Politicas @break
                @case(18) Filosofia @break
            @endswitch
        </p>
    </div>
    <p>Instructor:</p>
    <select wire:model.lazy="teacher" class="p-2 rounded-md border border-gray-300">
        @foreach ($teachers as $teacher)
            @if ($teacher->roles[0]->id == 2 || $teacher->roles[0]->id == 1)
                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
            @endif
        @endforeach
    </select>

    <input type="time" wire:model="end">
    {{$end}}
    
    <div class="lds-ellipsis" wire:loading wire:target="teacher"><div style="background-color: {{$stripe->courses[0]->color}}"></div><div style="background-color: {{$stripe->courses[0]->color}}"></div><div style="background-color: {{$stripe->courses[0]->color}}"></div><div style="background-color: {{$stripe->courses[0]->color}}"></div></div>
    {{--  <button wire:click="save" class="text-white p-3 rounded-md" style="background-color: {{$stripe->courses[0]->color}}">Guardar</button>  --}}
        
</div>