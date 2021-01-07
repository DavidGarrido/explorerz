<div class="w-full   overflow-auto justify-end gap-2 relative h-full">
    <div class="fixed inset-0 w-full h-16 flex justify-center items-center transform scale-0" wire:loading.class="transform scale-100">
        <p class="text-red-500">Cargando...</p>
    </div>
    
    {{auth()->user()->parent}}

    @if (auth()->user()->roles[0]->id == 2)
        <div class="h-1/12 flex gap-3 p-3 items-center w-full">
            @php
                if(date('L')){
                    $dias = 366;
                }else{
                    $dias = 365;
                }
                $limit = $utc_final+(($dias-(gmdate('z',$utc_final)+1))*86400);
            @endphp
            <p>Semana:</p>
            <select wire:model="show_init" class="p-2 rounded-md outline-none">
                @for ($i = $utc_inicial; $i < $limit; $i+=604800)
                    <option value="{{$i}}">{{date('d',$i).' '.__(date('F',$i)).' '.date('Y',$i)}} - {{date('d',($i+604800)).' '.__(date('F',($i+604800))).' '.date('Y',($i+604800))}}</option>
                @endfor
            </select>
        </div>
        <div class="flex gap-2 h-7/12" x-data="{create_activity:@if($create_activity) true @else false @endif}">
            <div class="fixed inset-0 bg-black bg-opacity-25 z-50 flex justify-center p-20 items-start" x-show="create_activity">
                @if (isset($schedule->start))
                    <div class="bg-white w-1/3 py-3 rounded-lg flex flex-col h-full">
                        <div class="flex justify-between items-center h-1/12 p-3">
                            <p>Agregar Actividad</p>
                            <i class="fas fa-times cursor-pointer hover:text-gray-600 text-gray-400" wire:click="cancel_activity()"></i>
                        </div>
                        <div class="flex flex-col gap-3 px-3 h-10/12 overflow-auto">
                            <div class="flex justify-between items-center h-12 ">
                                <p style="color: {{$schedule->courses[0]->color}}" class="text-xl font-bold">{{$schedule->courses[0]->model->group}}</p>
                                <p>{{__(date('l',$activity_day))}} - {{date('d',$activity_day)}} de {{__(date('F',$activity_day))}}.</p>
                            </div>
                            <div class="flex gap-3">
                                <div class="flex flex-col w-1/2 gap-1 bg-gray-100 p-2 rounded-md">
                                    <p class="text-gray-700 text-sm">Inicio de actividad:</p>
                                    <input type="datetime-local" wire:model="start">
                                    @error('start') <p class="text-sm text-red-500">Campo Obligatorio.</p> @enderror
                                </div>
                                <div class="flex flex-col w-1/2 gap-1 bg-gray-100 p-2 rounded-md">
                                    <p class="text-gray-700 text-sm">Fin de actividad:</p>
                                    <input type="datetime-local" wire:model="end">
                                    @error('end') <p class="text-sm text-red-500">Campo Obligatorio.</p> @enderror
                                </div>
                            </div>
                            <input type="text" wire:model="title" placeholder="Titulo de la Actividad" class="p-2 border border-gray-200 rounded-md">
                            @error('title') <p class="text-sm text-red-500">Campo Obligatorio.</p> @enderror
                            <div class="h-36 w-full">
                                <textarea wire:model="description" class="p-2 border border-gray-200 rounded-md h-full w-full" placeholder="Descripción de la actividad."></textarea>
                                @error('description') <p class="text-sm text-red-500">Campo Obligatorio.</p> @enderror
                            </div>
                            <div class="border border-gray-200 p-2 rounded-lg flex flex-col gap-2">
                                <div class="flex justify-between items-center">
                                    <p style="color: {{$schedule->courses[0]->color}}">Material de apoyo.</p>
                                    <a href="#" wire:click.prevent="agg_material()" class="text-xs text-right underline" style="color: {{$schedule->courses[0]->color}}">
                                        <i class="fas fa-plus-circle text-2xl"></i>
                                    </a>
                                </div>
                                @if (count($materials)>0)                                
                                    @for ($i = 0; $i < count($materials); $i++)                                        
                                        <div class="flex flex-col gap-3">
                                            <div class="flex items-center gap-2">
                                                <input type="text" wire:model="material.{{$i}}.url" class="p-2 border border-gray-300 rounded-md flex-1 outline-none" placeholder="url">
                                                <i class="fas fa-times cursor-pointer hover:text-gray-600 text-gray-400" wire:click="remove_material({{$i}})"></i>
                                            </div>
                                            <input type="file" wire:model="material.{{$i}}.file" accept="image/*,.pdf">
                                            <textarea wire:model="material.{{$i}}.description" cols="30" rows="5" class="border border-gray-300 rounded-md outline-none p-2" placeholder="Comentarios"></textarea>
                                        </div>
                                    @endfor
                                @else
                                    <p class="w-full h-20 flex items-center justify-center">No tienes material de apoyo.</p>
                                @endif
                            </div>
                            <div class="border border-gray-200 p-2 rounded-lg flex flex-col gap-2">
                                <div class="flex justify-between items-center">
                                    <h1 style="color: {{$schedule->courses[0]->color}}">Tareas:</h1>
                                    <a href="#" wire:click.prevent="agg_tasks()" class="text-xs text-right underline" style="color: {{$schedule->courses[0]->color}}">
                                        <i class="fas fa-plus-circle text-2xl"></i>
                                    </a>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    @if (count($tasks) > 0)
                                        @for ($i = 0; $i < count($tasks); $i++)
                                            <div class="py-3 flex flex-col gap-2">
                                                <p>Tarea {{$i+1}}</p>
                                                <textarea wire:model="tasks.{{$i}}.work" placeholder="Descripción" class="border border-gray-200 p-2 rounded-lg w-full h-32"></textarea>
                                                <div class="flex gap-2">
                                                    <div class="flex gap-2 items-center w-4/12 rounded-full border border-gray-200 p-1">
                                                        <p style="color: {{$schedule->courses[0]->color}}" class="text-sm">Evidencias:</p>
                                                        <label for="yes{{$i}}">Si</label>
                                                        <input type="radio" wire:model="tasks.{{$i}}.file" value="yes" id="yes{{$i}}" style="color: {{$schedule->courses[0]->color}}">
                                                        <label for="no{{$i}}">No</label>
                                                        <input type="radio" wire:model="tasks.{{$i}}.file" value="no" id="no{{$i}}" style="color: {{$schedule->courses[0]->color}}">
                                                    </div>
                                                    <div class="flex gap-2 items-center w-8/12 rounded-full border border-gray-200 p-1">
                                                        <p style="color: {{$schedule->courses[0]->color}}" class="text-sm">Evaluable:</p>
                                                        <label for="ev_yes{{$i}}">Si</label>
                                                        <input type="radio" wire:model="tasks.{{$i}}.evaluate" value="yes" id="ev_yes{{$i}}" style="color: {{$schedule->courses[0]->color}}">
                                                        <label for="ev_no{{$i}}">No</label>
                                                        <input type="radio" wire:model="tasks.{{$i}}.evaluate" value="no" id="ev_no{{$i}}" style="color: {{$schedule->courses[0]->color}}">
                                                        @if ($tasks[$i]['evaluate'] == 'yes')
                                                            <div class="flex flex-1 flex-wrap">
                                                                <p class="text-sm w-1/4">Max.</p>
                                                                <p class="w-3/4" style="color: {{$schedule->courses[0]->color}}">
                                                                    {{$tasks[$i]['points']}}
                                                                </p>
                                                                <input class="w-full" type="range" wire:model="tasks.{{$i}}.points" min="0" max="5" step="0.1">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    @else
                                        <p class="w-full h-20 flex items-center justify-center">No has programado tareas.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="h-1/12 px-3 flex justify-between items-center">
                            <a href="#" wire:click.prevent="cancel_activity()" class="text-xs text-right underline" style="color: {{$schedule->courses[0]->color}}">Cancelar</a>
                            <button class="p-3 rounded-lg text-white" style="background-color: {{$schedule->courses[0]->color}}" wire:click="activity_store()">Crear</button>
                        </div>
                    </div>
                @endif
            </div>
            @for ($i = $show_init+86400; $i < ($show_init+604800); $i+=86400)
                <div class="w-full flex flex-col rounded-lg shadow-sm bg-white h-full">
                    <div class="w-full flex items-center justify-center  h-1/12">
                        <p class="p-3">{{__(date('l',$i))}} - {{date('d',$i)}} </p>
                    </div>
                    <div class="w-full h-11/12 overflow-auto p-1">
                        @foreach (auth()->user()->schedule->where('day', date('N',$i))->sortBy('start') as $schedule)
                            <div class="flex flex-col relative rounded-lg overflow-hidden px-2 py-1 mb-1 border" style="border-color: {{$schedule->courses[0]->color}}">
                                <div class="absolute text-xs text-white px-2 rounded-full top-2 right-2" style="background-color: {{$schedule->courses[0]->color}}">
                                    <p class="p-1 w-full">{{$schedule->courses[0]->model->group}}</p>
                                </div>
                                <p class="p-1 w-full">{{$this->hour($schedule->start)}}</p>
                                <p class="p-1 w-full">{{$this->dimension_name($schedule->dimension)}}</p>
                                <div class="flex flex-col">
                                    <p style="color: {{$schedule->courses[0]->color}}">Actividades</p>
                                    @foreach ($schedule->activities()->where('day',($i+($schedule->start*3600)))->get() as $item)
                                        <p>{{$item->name}}</p>
                                    @endforeach
                                </div>
                                <div class="flex justify-end items-center">
                                    <a href="#" wire:click.prevent="activity_agree({{$schedule->id}},{{$i}})" class="text-xs underline" style="color:{{$schedule->courses[0]->color}}">Agregar Actividad</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endfor       
        </div> 
    @endif
    @if (auth()->user()->roles[0]->id == 4)
        <div class="h-1/12 flex gap-3 p-3 items-center w-full">
            @php
                if(date('L')){
                    $dias = 366;
                }else{
                    $dias = 365;
                }
                $limit = $utc_final+(($dias-(gmdate('z',$utc_final)+1))*86400);
            @endphp
            <p>Semana:</p>
            <select wire:model="show_init" class="p-2 rounded-md outline-none">
                @for ($i = $utc_inicial; $i < $limit; $i+=604800)
                    <option value="{{$i}}">{{date('d',$i).' '.__(date('F',$i)).' '.date('Y',$i)}} - {{date('d',($i+604800)).' '.__(date('F',($i+604800))).' '.date('Y',($i+604800))}}</option>
                @endfor
            </select>
        </div>
        <div class="flex gap-2 h-7/12">
            @for ($i = $show_init+86400; $i < ($show_init+604800); $i+=86400)
                <div class="w-full flex flex-col border-2 border-gray-200 shadow-sm bg-white h-full">
                    <div class="w-full flex items-center justify-center bg-gray-200 h-1/12">
                        <p class="p-3">{{__(date('l',$i))}} - {{date('d',$i)}} </p>
                    </div>
                    <div class="w-full h-11/12 overflow-auto p-1">
                        @foreach (auth()->user()->courses[0]->schedule()->where('day', date('N',$i))->orderBy('start','ASC')->get() as $schedule)
                            <div class="border rounded-md p-1 my-1 relative" style="border-color: {{$schedule->courses[0]->color}}">
                                <div class="flex justify-between items-center">
                                    <p class="p-1 text-white rounded-md text-xs" style="background-color: {{$schedule->courses[0]->color}}">{{$this->hour($schedule->start)}}</p>
                                    <p class="p-1 text-white rounded-md text-xs" style="background-color: {{$schedule->courses[0]->color}}">{{$this->dimension_name($schedule->dimension)}}</p>
                                </div>
                                <div class="flex flex-col">
                                    <p style="color: {{$schedule->courses[0]->color}}">Actividades</p>
                                    <div class="bg-gray-100 py-2 px-1">
                                        @if (count($schedule->activities()->where('day',($i+($schedule->start*3600)))->get()) > 0)
                                            @foreach ($schedule->activities()->where('day',($i+($schedule->start*3600)))->get() as $item)
                                                <div class="flex flex-col gap-3">
                                                    <div class="flex justify-between items-center">
                                                        <a href="#" class="underline">{{$item->name}}</a>
                                                        @if (time()>$item->utc_inicial && time()<$item->utc_final)
                                                            <p class="text-xs font-bold uppercase" style="color: {{$schedule->courses[0]->color}}">En curso</p>
                                                        @endif
                                                        @if (time()<$item->utc_inicial)
                                                            <p class="text-xs font-bold uppercase">A futúro</p>
                                                        @endif
                                                    </div>
                                                    <div class="flex flex-col text-xs gap-2">
                                                        <div class="flex gap-1">
                                                            <p style="color: {{$schedule->courses[0]->color}}">Inicio:</p>
                                                            <p>{{date('d-m-y H:m a',$item->utc_inicial)}}</p>
                                                        </div>
                                                        <div class="flex gap-1">
                                                            <p style="color: {{$schedule->courses[0]->color}}">Fin:</p>
                                                            <p>{{date('d-m-y H:m a',$item->utc_final)}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="p-1 text-xs text-gray-400">No hay actividades programadas.</p>                                            
                                        @endif
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <p style="color:  {{$schedule->courses[0]->color}}">Profesor:</p>
                                    <p>{{$schedule->user->name}}</p>
                                </div>
                            </div>
                        @endforeach
                        @foreach (auth()->user()->schedule->where('day', date('N',$i))->sortBy('start') as $schedule)
                            <div class="flex flex-col relative rounded-lg overflow-hidden px-2 py-1 mb-1 border" style="border-color: {{$schedule->courses[0]->color}}">
                                <div class="absolute text-xs text-white px-2 rounded-full top-2 right-2" style="background-color: {{$schedule->courses[0]->color}}">
                                    <p class="p-1 w-full">{{$schedule->courses[0]->model->group}}</p>
                                </div>
                                <p class="p-1 w-full">{{$this->hour($schedule->start)}}</p>
                                <p class="p-1 w-full">{{$this->dimension_name($schedule->dimension)}}</p>
                                <div class="flex flex-col">
                                    <p style="color: {{$schedule->courses[0]->color}}">Actividades</p>
                                    @foreach ($schedule->activities()->where('day',($i+($schedule->start*3600)))->get() as $item)
                                        <p>{{$item->name}}</p>
                                    @endforeach
                                </div>
                                <div class="flex justify-end items-center">
                                    <a href="#" wire:click.prevent="activity_agree({{$schedule->id}},{{$i}})" class="text-xs underline" style="color:{{$schedule->courses[0]->color}}">Agregar Actividad</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endfor       
        </div> 
    @endif

    @foreach (auth()->user()->children as $student)
        <p>{{$student->courses}}</p>
    @endforeach
    @switch($show)
        @case('all')
            @can('haveaccess', 'course.create')
                <div class="flex justify-start items-start gap-3 p-3">
                    <select wire:model="model" class="p-2 outline-none rounded-md">
                        @foreach ($models as $model)
                            <option value="{{$model->id}}">{{$model->group}}</option>
                        @endforeach
                    </select>
                    <div class="flex gap-2 p-3 items-center bg-white rounded-lg">
                        <label for="color">Color:</label>
                        <input type="color" wire:model="color" id="color" class="rounded-md outline-none">
                        <p>
                            {{$color}}
                        </p>
                    </div>
                    @error('title')
                        <p class="text-red-600">{{$message}}</p>    
                    @enderror
                    @error('description')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror
                    <button class="bg-gray-800 hover:bg-gray-900 p-2 rounded-md text-white w-40" wire:click="create">Crear</button>  
                </div>
            @endcan   
            <div class="w-full p-3 rounded-lg  mt-3">
                <h1 class="text-xl">Mis Cursos</h1>
                @if (count($allcourses) > 0)
                    <div class="flex flex-wrap gap-2">
                        @foreach ($allcourses as $course)
                            <div class="flex gap-3 w-52 h-52 divide-x divide-gray-200 items-center justify-center p-2 cursor-pointer  rounded-lg shadow-lg relative" wire:click="show_course({{$course->id}})">
                                <div class="absolute w-5 h-5 rounded-full top-2 right-2" style="background-color: {{$course->color}}"></div>
                                <p class="font-bold  p-2 ">{{$course->model->group}}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="py-5">No tienes cursos asignados.</p>          
                @endif
            </div>            
            @break
        @case('course')
            <a class=" bg-gray-200 fixed top-0 left-64 w-16 h-16 text-gray-500 flex items-center justify-center text-2xl" href="#" wire:click.prevent="all">
                <i class="fas fa-angle-left"></i>
            </a>
            @livewire('course.show', ['course' => $course], key($course->id))
            @break;
    @endswitch
</div>
