<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Bulletin - Purok Domingo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 p-6">

    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Barangay Bulletin</h1>

        <!-- Step 17: The Filter Form -->
        <form method="GET" action="{{ route('posts.index') }}" class="flex flex-col sm:flex-row gap-2 mb-8 bg-white p-4 rounded shadow">
            <input name="q" value="{{ request('q') }}" placeholder="Search title" class="border p-2 rounded flex-1">
            
            <select name="category" class="border p-2 rounded">
                <option value="">All Categories</option>
                @foreach ($categories as $c)
                    <option value="{{ $c }}" {{ request('category') == $c ? 'selected' : '' }}>
                        {{ $c }}
                    </option>
                @endforeach
            </select>
            
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filter</button>
        </form>

        <!-- Step 17: The Posts Loop -->
        @forelse ($posts as $post)
            <div class="bg-white p-4 rounded shadow mb-4">
                <h2 class="text-xl font-semibold">
                    <!-- The Link to the show page -->
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline">
                        {{ $post->title }}
                    </a>
                </h2>
                
                <div class="text-sm text-gray-500 mt-2 flex gap-2 items-center">
                    <span class="bg-gray-200 px-2 py-1 rounded">{{ $post->category }}</span>
                    <span>Published: {{ $post->published_at ? $post->published_at->format('M d, Y') : 'N/A' }}</span>
                    <span>Views: {{ $post->views }}</span>
                    
                    <!-- The Pinned Badge -->
                    @if ($post->is_pinned)
                        <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded font-bold">Pinned</span>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">No posts match your search.</p>
        @endforelse

        <!-- Step 17: Pagination -->
        <div class="mt-6">
            {{ $posts->links() }}
            <p class="text-sm text-gray-600 mt-2">
                Showing {{ $posts->firstItem() }}-{{ $posts->lastItem() }} of {{ $posts->total() }} posts
            </p>
        </div>
    </div>

</body>
</html>