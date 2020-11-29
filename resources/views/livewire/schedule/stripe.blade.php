<div class=" bg-green-800 text-xs relative z-40 w-full  text-white font-bold  hover:text-white select-none">
    <div x-show="open" class=" w-full bottom-0 bg-blue-500  p-3 z-50">
        <p>{{$stripe->start}}</p>
        <i class="fas fa-times-circle absolute top-1 right-1 cursor-pointer hover:text-white"></i>
    </div>
    <div class="resize relative flex justify-center items-center w-full bg-yellow-300 h-8">
        @switch($stripe->dimension)
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
    </div>
</div>