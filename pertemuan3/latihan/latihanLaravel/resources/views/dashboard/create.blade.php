<x-dashboard-layout>
    <x-slot:title>
        Create New Post - Dashboard
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Create New Post</h1>
        </div>

        {{-- Form Card --}}
        <div class="relative bg-white border border-gray-200 rounded-lg shadow-sm p-4 md:p-6">
            
            <div class="flex items-center justify-between border-b border-gray-200 pb-4 md:pb-5 mb-4 md:mb-6">
                <h3 class="text-lg font-medium text-gray-900">
                    Post Information
                </h3>
            </div>

            {{-- Import Form Component --}}
            {{-- Kita memanggil komponen form yang akan kita buat di Langkah 2 --}}
            <x-posts.form :categories="$categories" />
            
        </div>
    </div>
</x-dashboard-layout>