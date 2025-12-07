<x-dashboard-layout>
    <x-slot:title>Edit Category</x-slot:title>

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-2xl font-bold mb-6">Edit Category</h2>

        <form action="/dashboard/categories/{{ $category->slug }}" method="POST">
            @method('put')
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Category Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Update Category</button>
        </form>
    </div>
</x-dashboard-layout>