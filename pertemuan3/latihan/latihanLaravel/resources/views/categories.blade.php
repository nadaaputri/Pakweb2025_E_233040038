<x-layout>
    {{-- Cara memanggil slot $title yang telah dibuat --}}
    <x-slot:title>
        Categories
    </x-slot:title>

     <h1>Daftar Categories</h1>
    @foreach ($categories as $category)
        <article>
            <h3><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></h3>
        </article>    
    @endforeach 
</x-layout>
