@extends('layouts.app')

@section('contents')
    <!-- Page Header -->
    <h1 class="text-3xl font-bold mb-6">Profil Utilisateur</h1>

    <!-- Message de Statut -->
    @session('status')
        <span class="p-3 w-full justify-center bg-green-400 text-white rounded-md" id="status-message">
            {{ session('status') }}
        </span>
    @endsession

    <!-- Profile Section -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <!-- Informations Utilisateur -->
        <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Photo de Profil -->
            <div class="flex flex-col items-center mb-6">
                <div class="relative w-32 h-32">
                    <img id="profileImage" src="{{ $user->image ? $user->getImageUrl() : 'https://via.placeholder.com/40' }}" alt="Photo de Profil"
                        class="rounded-full w-full h-full object-cover" />
                    <label for="uploadPhoto"
                        class="absolute bottom-0 right-0 bg-blue-600 p-2 rounded-full cursor-pointer text-white">
                        <i class="fas fa-camera"></i>
                    </label>
                    <input type="file" id="uploadPhoto" accept="image/*" class="hidden" onchange="previewPhoto(event)"
                        name="image" />
                </div>

                @error('image')
                    <p class="text-red-500 mt-2" id="image-error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Form Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Prenom</label>
                    <input
                        class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                        type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" />
                    @error('first_name')
                        <p class="text-red-500 mt-2" id="image-error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                    <input
                        class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                        type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" />
                    @error('last_name')
                        <p class="text-red-500 mt-2" id="image-error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input
                    class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                    type="email" name="email" value="{{ old('email', $user->email) }}" />
                @error('email')
                    <p class="text-red-500 mt-2" id="image-error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton Enregistrer les Modifications -->
            <div class="mt-8 text-right">
                <button type="submit" class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">
                    Enregistrer les Modifications
                </button>
            </div>
        </form>

        <!-- Changer de Mot de Passe -->
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')
            
            <!-- Modification de Mot de Passe -->
            <div class="mt-6 border-t pt-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">
                    Modifier le Mot de Passe
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Mot de passe actuel</label>
                        <input
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="password" name="current_password" />
                        @error('current_password')
                            <p class="text-red-500 mt-2" id="image-error-message">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nouveau mot de passe</label>
                        <input
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="password" name="password" />
                        @error('password')
                            <p class="text-red-500 mt-2" id="image-error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Confirmer le nouveau mot de passe</label>
                        <input
                            class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none"
                            type="password" name="password_confirmation" />
                        @error('password_confirmation')
                            <p class="text-red-500 mt-2" id="image-error-message">{{ $message }}</p>
                        @enderror

                    </div>
                </div>
            </div>

            <!-- Bouton Modifier le Mot de Passe -->
            <div class="mt-8 text-right">
                <button type="submit" class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">
                    Modifier le mot de passe
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function previewPhoto(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const profileImage = document.getElementById("profileImage");
                profileImage.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
