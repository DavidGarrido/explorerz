<div class="w-full flex flex-col">
    <div class="flex flex-col h-0 overflow-hidden relative" style="padding-top: 56.25%">
        @if (count($videos) > 0)
            <div class="absolute inset-0">
                <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{$video_selected}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                        
            </div>
        @endif
    </div>
    <div class="flex-1 py-2 overflow-auto">
        <div class="flex flex-wrap gap-3">
            @foreach ($videos as $video)                
                <div wire:click="$set('video_selected','{{$video}}')" class="cursor-pointer">
                    <img src="https://img.youtube.com/vi/{{$video}}/default.jpg" alt="video" >
                </div>
            @endforeach
        </div>
    </div>
</div>