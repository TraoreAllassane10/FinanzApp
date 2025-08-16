@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-bold">Gestion des transactions</h1>
    <a
        href="./edit-card.html"
        class="rounded bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600"
    >
        Annuler
    </a>
</div>

<!-- Error Message -->
<div class="w-full bg-red-400 p-3 text-center text-white">
    Erreur: Veuillez vérifier vos données
</div>

<div id="cardPopup" class="w-full">
    <div class="rounded-lg bg-white p-6 shadow-lg">
        <h2 class="mb-4 text-lg font-semibold">Ajouter une transaction</h2>
        <form action="/transaction/store" method="POST">
            <input type="hidden" name="_token" value="CSRF_TOKEN" />

            <!-- Type de Transaction -->
            <div class="mb-4">
                <label for="type" class="mb-2 block font-bold text-gray-700"
                    >Type de Transaction</label
                >
                <select
                    name="type"
                    id="type"
                    required
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                >
                    <option value="">Sélectionnez un type</option>
                    <option value="Crédit">Crédit</option>
                    <option value="Débit">Débit</option>
                </select>
            </div>

            <!-- Source -->
            <div class="mb-4">
                <label for="source" class="mb-2 block font-bold text-gray-700"
                    >Source</label
                >
                <select
                    name="source_id"
                    id="source"
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                >
                    <option value="">
                        Sélectionnez une source (si applicable)
                    </option>
                    <optgroup label="Cartes">
                        <option value="1">Carte 1 ($100)</option>
                        <option value="2">Carte 2 ($50)</option>
                    </optgroup>
                    <optgroup label="Poches">
                        <option value="3">Poche 1 ($200)</option>
                        <option value="4">Poche 2 ($150)</option>
                    </optgroup>
                </select>
            </div>

            <!-- Destination -->
            <div class="mb-4">
                <label
                    for="destination"
                    class="mb-2 block font-bold text-gray-700"
                    >Destination</label
                >
                <select
                    name="destination_id"
                    id="destination"
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                >
                    <option value="">
                        Sélectionnez une destination (si applicable)
                    </option>
                    <optgroup label="Cartes">
                        <option value="1">Carte 1 ($100)</option>
                        <option value="2">Carte 2 ($50)</option>
                    </optgroup>
                    <optgroup label="Poches">
                        <option value="3">Poche 1 ($200)</option>
                        <option value="4">Poche 2 ($150)</option>
                    </optgroup>
                </select>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label
                    for="description"
                    class="mb-2 block font-bold text-gray-700"
                    >Description</label
                >
                <input
                    type="text"
                    name="description"
                    id="description"
                    required
                    value=""
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                />
            </div>

            <!-- Montant -->
            <div class="mb-4">
                <label for="amount" class="mb-2 block font-bold text-gray-700"
                    >Montant</label
                >
                <input
                    type="number"
                    name="amount"
                    id="amount"
                    required
                    value=""
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                />
            </div>

            <!-- Bouton Soumettre -->
            <div class="text-right">
                <button
                    type="submit"
                    class="w-full rounded bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600"
                >
                    Ajouter Transaction
                </button>
            </div>
        </form>
    </div>
</div>
@endsection