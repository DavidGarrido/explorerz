<div class=" w-full h-full grid grid-cols-3 grid-rows-1">
    <div class=" col-start-1 col-end-3 h-full row-start-1 row-end-2 bg-cover bg-center" style="background-image: url({{asset('img/teacher-new.jpg')}})">

    </div>
    <div class=" h-full col-start-2 col-end-3 row-start-1 row-end-2">
        <svg class="block h-full min-w-48 text-blue-500 " fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
          <polygon points="50,0 100,0 100,100 25,100" />
        </svg>
    </div>

    <div class="bg-blue-500 text-white h-full col-start-3 col-end-4 row-start-1 row-end-2 flex flex-col items-center overflow-auto p-3">
        <p class=" font-roboto title w-full text-right">Información</p>
        
        @livewire('teacher.form-data')
    </div>
</div>