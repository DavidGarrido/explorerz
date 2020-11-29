<div class="text-gray-500">
    @if ($autorize != null)
        @switch(auth()->user()->roles[0]->id)
            @case(1)
                @livewire('course.show.admin', ['course' => $course], key($course->id))
                @break
            @case(2)
                @livewire('course.show.teacher', ['course' => $course], key($course->id))
                @break
            @case(3)
                @livewire('course.show.parents', ['course' => $course], key($course->id))
                @break
            @case(4)
                @livewire('course.show.student', ['course' => $course], key($course->id))
                @break
            @default
                
        @endswitch
    @else
        <p>No estas autorizado a ver este curso</p>
    @endif
</div>
