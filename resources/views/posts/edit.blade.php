@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-pink-100">
    <div class="w-full max-w-lg bg-white rounded-lg shadow-md">
        <div class="bg-pink-400 text-white text-center py-4 rounded-t-lg">
            <h2 class="text-2xl font-bold">{{ __('Edit Post') }}</h2>
        </div>
        <div class="p-6">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Judul') }}</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm focus:ring-pink-400 focus:border-pink-400 @error('title') border-red-500 @enderror" 
                        value="{{ old('title', $post->title) }}" 
                        required>

                    @error('title')
                        <span class="text-sm text-red-500 mt-1 block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">{{ __('Isi') }}</label>
                    <textarea 
                        name="content" 
                        id="content" 
                        rows="5" 
                        class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm focus:ring-pink-400 focus:border-pink-400 @error('content') border-red-500 @enderror" 
                        required>{{ old('content', $post->content) }}</textarea>

                    @error('content')
                        <span class="text-sm text-red-500 mt-1 block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">{{ __('Gambar') }}</label>
                    <input 
                        type="file" 
                        name="image" 
                        id="image" 
                        class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm focus:ring-pink-400 focus:border-pink-400">
                    
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="mt-4 w-full h-48 object-cover rounded-lg">
                    @endif
                </div>

                <div class="text-center">
                    <button 
                        type="submit" 
                        class="w-full px-4 py-2 bg-pink-400 hover:bg-pink-500 text-white font-bold rounded-md focus:outline-none focus:ring-2 focus:ring-pink-300 focus:ring-offset-2">
                        {{ __('Update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
