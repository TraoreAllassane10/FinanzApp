@extends('layouts.auth')

@section('auth-form')
    <div class="mt-4 flex items-center justify-between">
        <span class="w-1/5 border-b lg:w-1/4"></span>
        <p>
            Vous avez oublié votre mot de passe ? Aucun problème. Communiquez-nous
            simplement votre adresse e-mail et nous vous enverrons par e-mail un
            lien de réinitialisation de mot de passe qui vous permettra d'en choisir
            un nouveau.
        </p>
        <span class="w-1/5 border-b lg:w-1/4"></span>
    </div>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mt-4">
            <label class="mb-2 block text-sm font-bold text-gray-700">Addresse Email</label>
            <input
                class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                type="email" name="email" required autofocus />
            @error('email')
                <span class="text-red-500 mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-8">
            <button class="w-full rounded bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600">
                Recevoir le lien
            </button>
        </div>
        <div class="mt-4 flex items-center justify-between">
            <span class="w-1/5 border-b md:w-1/4"></span>
            <a href="#" class="text-xs uppercase text-gray-500">ou se connecter'</a>
            <span class="w-1/5 border-b md:w-1/4"></span>
        </div>
    </form>
@endsection
