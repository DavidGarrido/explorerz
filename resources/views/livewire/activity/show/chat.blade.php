<div class="w-full h-full flex flex-col">
    <div class="h-11/12 flex flex-col  overflow-auto">
        @if (count($comments)>0)
            <div class="flex flex-col gap-2">
                @foreach ($comments as $comment_user)
                        @if ($comment_user->user->id == auth()->user()->id)
                            <div class="flex gap-3 items-start justify-end">
                                <p class="w-8/12 text-white p-3 rounded-lg" style="background-color: {{$activity->schedule[0]->courses[0]->color}}">{{$comment_user->body}}</p>
                                <div class="rounded-full overflow-hidden">
                                    <img src="{{$comment_user->user->profile_photo_url}}" alt="profile photo">
                                </div>
                            </div>
                        @else
                            <div class="flex gap-3 items-start">
                                <div class="rounded-full overflow-hidden justify-start">
                                    <img src="{{$comment_user->user->profile_photo_url}}" alt="profile photo">
                                </div>
                                <p class="w-8/12" class="p-3 rounded-lg bg-gray-200">{{$comment_user->body}}</p>
                            </div>
                        @endif
                @endforeach
            </div>
        @else
            <p class="w-full h-full flex justify-center text-gray-400 text-sm items-center">Sé el primero en comentar esta actividad.</p>            
        @endif
    </div>
    <div class="h-1/12 flex gap-3">
        <div class="w-11/12 flex flex-col justify-center">
            <input type="text" wire:model="comment" class="border-2 border-gray-200 p-3 rounded-full outline-none" placeholder="Escribe tu comentario" wire:keydown.enter="send">
        </div>
        <div class="w-1/12 flex items-center justify-center">
            <div class="w-10 h-10 flex items-center justify-center rounded-full cursor-pointer hover:shadow-lg" style="background-color: {{$activity->schedule[0]->courses[0]->color}}" wire:click="send">
                <i class="fas fa-paper-plane text-white"></i>
            </div>
        </div>
    </div>
</div>
