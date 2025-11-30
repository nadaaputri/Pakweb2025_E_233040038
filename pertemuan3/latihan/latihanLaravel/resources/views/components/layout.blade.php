<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Tambahkan slot baru dengan nama $title --}}
    <title>{{ $title }}</title>
</head>

<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/blog">Blog</a>
        <a href="/categories">Categories</a>
        <a href="/posts">Posts</a>
        <a href="/contact">Contact</a>
    </nav>
    
    {{-- Area ini nantinya akan diisi oleh konten dari halaman lain (Slot) --}}
    {{ $slot }} 
    <footer>
        <hr>
        <p>&copy; 2025 Nada</p>
    </footer>
</body>

</html>