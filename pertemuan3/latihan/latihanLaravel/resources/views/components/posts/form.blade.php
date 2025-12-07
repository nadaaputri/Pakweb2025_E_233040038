@props(['categories', 'post' => null])

{{-- Logika: Kalau ada $post, berarti mode EDIT (pakai route update). Kalau tidak, mode CREATE (pakai route store) --}}
<form action="{{ $post ? route('dashboard.update', $post->slug) : route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($post)
        @method('PUT') {{-- HTML form cuma support GET/POST, jadi kita tipu pakai PUT untuk update --}}
    @endif

    <div class="grid gap-4 grid-cols-2">

        {{-- Title --}}
        <div class="col-span-2">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
            <input type="text" name="title" id="title" 
                value="{{ old('title', $post->title ?? '') }}" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
                placeholder="Enter post title">
            @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category --}}
        <div class="col-span-2">
            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
            <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">Select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image --}}
        <div class="col-span-2 my-4">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Post Image</label>

            {{-- Tampilkan gambar lama jika ada --}}
            @if($post && $post->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $post->image) }}" class="w-32 h-auto rounded border border-gray-200">
                    <p class="text-xs text-gray-500 mt-1">Current Image</p>
                </div>
            @endif

            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="image" name="image" type="file">
            <p class="mt-1 text-sm text-gray-500">Leave empty if you don't want to change the image.</p>
            @error('image')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Excerpt --}}
        <div class="col-span-2">
            <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-900">Excerpt</label>
            <textarea name="excerpt" id="excerpt" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
            @error('excerpt')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Body --}}
        <div class="col-span-2">
            <label for="body" class="block mb-2 text-sm font-medium text-gray-900">Content</label>
            <textarea name="body" id="body" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('body', $post->body ?? '') }}</textarea>
            @error('body')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Buttons --}}
        <div class="col-span-2 flex items-center space-x-4 border-t border-gray-200 pt-4 mt-4">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                {{ $post ? 'Update Post' : 'Create Post' }}
            </button>
            <a href="{{ route('dashboard.index') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5">
                Cancel
            </a>
        </div>
    </div>
</form>