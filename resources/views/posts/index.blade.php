@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Blog Posts</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @auth
        <div class="mb-6 text-right">
            <a href="{{ route('posts.create') }}" class="bg-pink-400 hover:bg-pink-500 text-white font-bold py-2 px-4 rounded">
                Buat blog baru
            </a>
        </div>
    @endauth

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse ($posts as $post)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                    <p class="text-gray-600 text-sm">By {{ $post->user->name }} - {{ $post->created_at->diffForHumans() }}</p>
                    <p class="mt-2 text-gray-800 line-clamp-3">{{ Str::limit($post->content, 100) }}</p>

                    <div class="mt-4">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-pink-400 hover:underline">Read More</a>
                    </div>

                    @auth
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        @empty
            <p class="col-span-3 text-center text-gray-500">Tidak ada postingan blog.</p>
        @endforelse
    </div>
</div>
@endsection
