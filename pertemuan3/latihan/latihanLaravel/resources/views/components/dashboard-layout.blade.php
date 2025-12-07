<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Tambahkan slot baru dengan nama $title --}}
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</head>

<body>
    <div>
        <nav class="bg-gray-500 p-4 flex justify-between items-center text-white mb-6">
            <div class="flex space-x-4">
                <a href="/">Home</a>
                <a href="/about">About</a>
                <a href="/blog">Blog</a>
                <a href="/categories">Categories</a>
                <a href="/posts">Posts</a>
                <a href="/contact">Contact</a>
            </div>

             <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-4 py-2">
                    Logout
                </button>
            </form>
        </nav>
    </div>
    
    {{-- Area ini nantinya akan diisi oleh konten dari halaman lain (Slot) --}}
    {{ $slot }} 
    <footer>
        <hr>
        <p>&copy; 2025 Nada</p>
    </footer>
</body>

</html>