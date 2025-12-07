<x-dashboard-layout>
    <x-slot:title>
        {{ $post->title }} - Dashboard
    </x-slot:title>

    <article class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <header class="mb-8 border-b border-gray-200 pb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>

            <div class="flex items-center text-sm text-gray-500 mb-4">
                <span class="mr-4 font-semibold text-gray-900">By {{ $post->author->name ?? auth()->user()->name }}</span>
                <span class="mr-4 px-2.5 py-0.5 rounded bg-blue-100 text-blue-800 font-medium">
                    {{ $post->category->name ?? 'Uncategorized' }}
                </span>
                <span>{{ $post->created_at->format('d M Y') }}</span>
            </div>

            {{-- Tempat Gambar (Nanti diaktifkan di pertemuan Storage) --}}
            @if ($post->image)
                <div class="overflow-hidden rounded-lg max-h-96">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full object-cover">
                </div>
            @endif
        </header>

        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed mb-6">
            {!! nl2br(e($post->body)) !!}
        </div>

        <footer class="mt-8 pt-8 border-t border-gray-200">
            <a href="{{ route('dashboard.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium hover:underline transition duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Dashboard
            </a>
        </footer>
    </article>
</x-dashboard-layout>