<div class="w-full h-full flex flex-col items-center gap-5 overflow-auto" x-data="{show: @if($show) true @else false @endif}">
    <div class="fixed inset-0 z-20 bg-white bg-opacity-50 flex items-center justify-center" x-show="show">
        <div class="absolute cursor-pointer top-5 right-5" wire:click="$set('show',false)">
            <i class="fas fa-times text-3xl text-gray-600"></i>
        </div>
        <img src="{{$img_selected}}" alt="img" class=" shadow-xl">
    </div>
    @foreach ($imagenes_file as $file)
        @php
            $img = explode('/',$file[0]);
        @endphp
        <div class="flex flex-col w-1/2 p-2 bg-gray-100 gap-3 rounded-md cursor-pointer hover:shadow-lg" wire:click="show_img('{{route('img',$img[1])}}')">
            <img src="{{route('img', $img[1])}}" alt="img">
            <p class="text-sm">{{$file[1]}}</p>
        </div>
    @endforeach
    @foreach ($imagenes_url as $url)
    <div class="flex flex-col w-1/2 p-2 bg-gray-100 gap-3 rounded-md cursor-pointer hover:shadow-lg" wire:click="show_img('{{$url[0]}}')">
        <img src="{{$url[0]}}" alt="image externa">
        <p class="text-sm">{{$url[1]}}</p>
    </div>
    @endforeach
    {{$img_selected}}
</div>
