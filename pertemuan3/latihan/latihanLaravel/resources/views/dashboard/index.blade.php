<x-dashboard-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome, {{ auth()->user()->name }}</h1>
    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">Success!</span> {{ session('success') }}
        </div>
    @endif
   @include('components.table')
</x-dashboard-layout>