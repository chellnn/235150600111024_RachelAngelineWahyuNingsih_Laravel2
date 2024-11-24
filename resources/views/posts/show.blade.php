@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-pink-100">
    <div class="w-full max-w-4xl bg-white rounded-lg shadow-md">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-t-lg">
        @endif

        <div class="p-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $post->title }}</h1>
            <p class="text-gray-600 text-sm mt-2">
                By {{ $post->user->name }} - {{ $post->created_at->format('F j, Y') }}
            </p>

            <!-- Kurangi jarak antara 'By...' dan paragraf -->
            <div class="mt-4 text-gray-800 leading-relaxed break-words whitespace-pre-line">
                {!! nl2br(e($post->content)) !!}
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('posts.index') }}" class="inline-block px-6 py-2 text-white bg-pink-400 rounded-md hover:bg-pink-500 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:ring-offset-2">
                    {{ __('Kembali') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
