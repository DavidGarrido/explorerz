<x-app-layout>
    @can('haveaccess', 'course.create')
            @livewire('course.create')
    @endcan
</x-app-layout>