<div>
    <p>Vista de curso {{$course->id}} para teacher</p>
    @foreach ($course->schedule as $schedule)
        @if ($schedule->user_id == auth()->user()->id)
            {{$schedule}}
        @endif
    @endforeach
</div>
