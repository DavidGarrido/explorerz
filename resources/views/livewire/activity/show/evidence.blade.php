<div class="flex items-center gap-3">
    <div class="flex">
        {{$calification}}
        <input type="range" wire:model="calification" min="0" max="{{$evidence->task->punctuation}}" step="0.1">
    </div>
    @if ($file != null)
        @php
            $archivo = explode('/',$file);
        @endphp
        <a href="{{route('evidence',[$archivo[1],$archivo[2]])}}" target="blanck">Ver</a>
    @endif
    @if ($url != null)
        <a href="{{$url}}" target="blanck">Ver</a>
    @endif
</div>
