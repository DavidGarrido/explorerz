<div class="w-full xl:w-1/2 flex flex-col">
    {{--  {{$activity}}  --}}
    {{--  {{print_r($documentos)}}  --}}
    @foreach ($documentos as $doc)
        <div class="flex justify-between h-10">
            <p> <i class="fas fa-file-pdf"></i> {{$doc[1]}}</p>
            <a href="#" wire:click.prevent="download('{{$doc[0]}}')">
                <i class="fas fa-download"></i>
            </a>
        </div>
    @endforeach
</div>
