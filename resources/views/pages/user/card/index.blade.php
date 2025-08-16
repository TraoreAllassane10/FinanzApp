@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center">
        <h1 class="mr-4 text-2xl font-bold">Mes Cartes</h1>
        <p>
            Il vous reste : <span class="text-red-400">3</span> Cartes possible
        </p>
    </div>
    <!-- Condition: Si le nombre de cartes restantes est supérieur à 0 -->
    <a
        href="{{route('card.create')}}"
        class="rounded-full bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600"
    >
        Ajouter une carte
    </a>
    <!-- Sinon -->
    <buttons
        class="mt-4 rounded bg-red-300 px-4 py-2 font-bold text-red-700"
        disabled
    >
        Max de carte épuisé, il faut mettre à niveau
    </buttons>
    <a
        href="/"
        class="rounded-full bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600"
    >
        Mettre à niveau
    </a>
</div>

<!-- Message de succès -->
<div class="w-full bg-green-400 p-3 text-center text-white">
    Carte ajoutée avec succès !
</div>

<!-- Cards Section -->
<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
    <!-- Card 1 -->
    <div
        class="card rounded-lg bg-gradient-to-r from-blue-500 to-purple-500 p-4 text-white shadow-lg"
    >
        <h2 class="mb-4 text-lg font-semibold">Carte Visa</h2>
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600">**** **** **** 1234</p>
                <p class="text-sm text-gray-700">Expire: 12/25</p>
            </div>
            <span class="text-bold text-lg">$1,200.00</span>
        </div>
        <div class="mt-4 flex justify-end space-x-2">
            <a
                href="/card/1/edit"
                class="rounded border border-blue-600 px-2 py-1 text-blue-700 hover:text-blue-800"
                aria-label="Edit Card"
            >
                Modifier
            </a>
            <form method="POST" action="/card/1/delete">
                <button
                    type="submit"
                    class="rounded border border-red-600 px-2 py-1 text-red-600 hover:text-red-700"
                >
                    Supprimer
                </button>
            </form>
        </div>
    </div>
    <!-- Card 2 -->
    <div
        class="card rounded-lg bg-gradient-to-r from-blue-500 to-purple-500 p-4 text-white shadow-lg"
    >
        <h2 class="mb-4 text-lg font-semibold">Carte MasterCard</h2>
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600">**** **** **** 5678</p>
                <p class="text-sm text-gray-700">Expire: 08/26</p>
            </div>
            <span class="text-bold text-lg">$850.50</span>
        </div>
        <div class="mt-4 flex justify-end space-x-2">
            <a
                href="/card/2/edit"
                class="rounded border border-blue-600 px-2 py-1 text-blue-700 hover:text-blue-800"
                aria-label="Edit Card"
            >
                Modifier
            </a>
            <form method="POST" action="/card/2/delete">
                <button
                    type="submit"
                    class="rounded border border-red-600 px-2 py-1 text-red-600 hover:text-red-700"
                >
                    Supprimer
                </button>
            </form>
        </div>
    </div>
</div>
@endsection