@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-bold">Gestion des cartes</h1>
    <a
        href="./edit-card.html"
        class="rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700"
    >
        Annuler
    </a>
</div>

<div class="w-full">
    <div class="rounded-lg bg-white p-6 shadow-lg">
        <h2 class="mb-4 text-lg font-semibold">Ajouter une carte bancaire</h2>
        <form id="cardForm" method="POST" action="/card/store">
            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="csrf_token_placeholder" />

            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >Nom sur la carte</label
                >
                <input
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    type="text"
                    name="name"
                    value="John Doe"
                />
                <p class="mt-2 text-red-500">Nom invalide</p>
            </div>

            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >Type</label
                >
                <select
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    name="type"
                >
                    <option value="Visa">Visa</option>
                    <option value="MasterCard" selected>MasterCard</option>
                    <option value="Amex">Amex</option>
                </select>
                <p class="mt-2 text-red-500">Type invalide</p>
            </div>

            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >Numéro de la carte</label
                >
                <input
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    type="number"
                    name="cardNumber"
                    value="1234567890123456"
                />
                <p class="mt-2 text-red-500">Numéro invalide</p>
            </div>

            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >Date d'expiration</label
                >
                <input
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    type="date"
                    name="expiry_date"
                    value="2025-12-31"
                />
                <p class="mt-2 text-red-500">Date invalide</p>
            </div>

            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >CVV</label
                >
                <input
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    type="number"
                    name="cvv"
                    value="123"
                />
                <p class="mt-2 text-red-500">CVV invalide</p>
            </div>

            <div class="mt-8 text-right">
                <button
                    class="w-full rounded bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600"
                >
                    Créer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection