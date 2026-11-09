<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Barangay Bulletin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 p-6">

    <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow mt-10">
        
        <a href="{{ route('posts.index') }}" class="text-blue-600 hover:underline mb-6 inline-block font-medium">&larr; Back to Bulletin</a>

        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
        
        <div class="text-sm text-gray-500 mb-6 flex flex-wrap gap-4 border-b pb-4 items-center">
            <span class="bg-gray-100 px-3 py-1 rounded"><strong>Category:</strong> {{ $post->category }}</span>
            <span><strong>Published:</strong> {{ $post->published_at ? $post->published_at->format('M d, Y') : 'N/A' }}</span>
            <span><strong>Views:</strong> {{ $post->views }}</span>
            
            @if($post->is_pinned)
                <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded font-bold">Pinned</span>
            @endif
        </div>

        <div class="text-gray-700 leading-relaxed text-lg">
            {!! nl2br(e($post->body)) !!}
        </div>

    </div>

</body>
</html>