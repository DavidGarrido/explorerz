<x-app-layout>
    @if (count(auth()->user()->roles)>0)
        @livewire('navigation')
    @else
        @livewire('select-role')        
    @endif
</x-app-layout>
