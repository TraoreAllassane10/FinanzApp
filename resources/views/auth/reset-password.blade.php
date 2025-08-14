@extends('layouts.auth')

@section('auth-form')
    <form method="POST" action="{{ route('password.reset') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}" />

        <div class="mt-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Addresse Email</label>
            <input
                class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                type="email" name="email" value="" required autofocus />
                 @error('email')
                <span class="text-red-500 mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nouveau Mot passe</label>
            <input
                class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                type="password" name="password" required autofocus />
                 @error('password')
                <span class="text-red-500 mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Confirmer votre mot passe</label>
            <input
                class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                type="password" name="password_confirmation" required autofocus />
                 @error('password_confirmation')
                <span class="text-red-500 mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-8">
            <button class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">
                Reinitialiser le mot de passe
            </button>
        </div>
    </form>
@endsection
