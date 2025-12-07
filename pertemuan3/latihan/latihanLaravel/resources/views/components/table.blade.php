<div class="relative overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200">
    
    <div class="px-6 py-4 flex flex-col md:flex-row justify-between items-center gap-4 bg-gray-50 border-b border-gray-200">
        <form method="GET" action="{{ route('dashboard.index') }}" class="flex-1 w-full md:max-w-md relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" name="search" id="search" value="{{ request('search') }}"
                class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Search posts...">
        </form>

        <a href="{{ route('dashboard.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
            </svg>
            Add Post
        </a>
    </div>

    {{-- Table --}}
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Title</th>
                <th scope="col" class="px-6 py-3">Image</th>
                <th scope="col" class="px-6 py-3">Category</th>
                <th scope="col" class="px-6 py-3">Published At</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4">
                        {{ $posts->firstItem() + $loop->index }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $post->title }}
                    </th>
                    <td class="px-6 py-4">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-16 h-auto rounded">
                        @else
                            <span class="text-gray-500">No Image</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->category->name ?? 'Uncategorized' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('dashboard.show', $post->slug) }}" class="font-medium text-blue-600 hover:underline">View</a>
                        {{-- Tombol Edit --}}
                        <a href="{{ route('dashboard.edit', $post->slug) }}" class="font-medium text-yellow-500 hover:underline">Edit</a>
                        {{-- Tombol Delete --}}
                        <form action="{{ route('dashboard.destroy', $post->slug) }}" method="POST" class="inline-block">
                            @method('delete')
                            @csrf
                            <button class="font-medium text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        No posts yet. <a href="{{ route('dashboard.create') }}" class="text-blue-600 hover:underline">Create one</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="p-4">
        {{ $posts->links() }}
    </div>
</div>