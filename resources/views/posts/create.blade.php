@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-pink-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md">
        <div class="bg-pink-400 text-white text-center py-4 rounded-t-lg">
            <h1 class="text-2xl font-bold">{{ __('Buat Blog Baru') }}</h1>
        </div>
        <div class="p-6">
            @if ($errors->any())
                <div class="mb-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Judul') }}</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm focus:ring-pink-400 focus:border-pink-400 @error('title') border-red-500 @enderror" 
                        value="{{ old('title') }}" 
                        required 
                        placeholder="Masukkan Judul">

                    @error('title')
                        <span class="text-sm text-red-500 mt-1 block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Content Field -->
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">{{ __('Isi') }}</label>
                    <textarea 
                        name="content" 
                        id="content" 
                        rows="5" 
                        class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm focus:ring-pink-400 focus:border-pink-400 @error('content') border-red-500 @enderror" 
                        required 
                        placeholder="Isi Blog">{{ old('content') }}</textarea>

                    @error('content')
                        <span class="text-sm text-red-500 mt-1 block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">{{ __('Gambar') }}</label>
                    <input required
                        type="file" 
                        name="image" 
                        id="image" 
                        class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm focus:ring-pink-400 focus:border-pink-400">
                </div>

                <div class="text-center">
                    <button 
                        type="submit" 
                        class="w-full px-4 py-2 text-white bg-pink-400 rounded-md hover:bg-pink-500 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:ring-offset-2">
                        {{ __('Simpan') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
