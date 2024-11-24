@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-pink-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md">
        <div class="bg-pink-400 text-white text-center py-4 rounded-t-lg">
            <h2 class="text-2xl font-bold">{{ __('Register') }}</h2>
        </div>
        <div class="p-6">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                    <input 
                        id="name" 
                        type="text" 
                        class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm focus:ring-pink-400 focus:border-pink-400 @error('name') border-red-500 @enderror" 
                        name="name" 
                        value="{{ old('name') }}" 
                        required 
                        autocomplete="name" 
                        autofocus 
                        placeholder="Masukkan nama anda">

                    @error('name')
                        <span class="text-sm text-red-500 mt-1 block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                    <input 
                        id="email" 
                        type="email" 
                        class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm focus:ring-pink-400 focus:border-pink-400 @error('email') border-red-500 @enderror" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autocomplete="email" 
                        placeholder="Masukkan email anda">

                    @error('email')
                        <span class="text-sm text-red-500 mt-1 block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input 
                        id="password" 
                        type="password" 
                        class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm focus:ring-pink-400 focus:border-pink-400 @error('password') border-red-500 @enderror" 
                        name="password" 
                        required 
                        autocomplete="new-password" 
                        placeholder="Masukkan password anda">

                    @error('password')
                        <span class="text-sm text-red-500 mt-1 block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                    <input 
                        id="password-confirm" 
                        type="password" 
                        class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm focus:ring-pink-400 focus:border-pink-400" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password" 
                        placeholder="Konfirmasi ulang password anda">
                </div>

                <div>
                    <button 
                        type="submit" 
                        class="w-full px-4 py-2 text-white bg-pink-400 rounded-md hover:bg-pink-500 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:ring-offset-2">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
        <div class="text-center text-sm text-gray-500 py-4 border-t">
            Sudah mempunyai akun?
            <a href="{{ route('login') }}" class="text-pink-500 hover:underline">{{ __('Login') }}</a>
        </div>
    </div>
</div>
@endsection
