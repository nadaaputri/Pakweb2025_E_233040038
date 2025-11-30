<x-layout>
    {{-- Cara memanggil slot $title yang telah dibuat --}}
    <x-slot:title>
        Posts
    </x-slot:title>
    
    <h1>Daftar Posts</h1>
    @foreach ($posts as $post)
        <article>
            <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
            <p>{{ $post->excerpt }}</p>
        </article>
    @endforeach 
</x-layout>