@extends('layouts.app')

@section('contents')
<!-- Page Heading -->
<div class="mb-6 flex flex-col items-center justify-between lg:flex-row">
    <h1 class="text-2xl font-bold">Gestion des Plans d'abonnement</h1>
    <button
        class="rounded bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600"
    >
        Annuler
    </button>
</div>

<!-- Message d'erreur -->
<div class="w-full bg-red-400 p-3 text-center text-white">
    Erreur : Champ manquant !
</div>

<!-- Subscription Form -->
<div class="w-full">
    <div class="rounded-lg bg-white p-6">
        <h2 class="mb-4 text-xl font-bold">Ajouter un Plan</h2>
        <form method="POST" action="#">
            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >Nom du plan</label
                >
                <input
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    type="text"
                    name="name"
                    placeholder="Nom du plan"
                />
                <p class="mt-2 text-red-500">Ce champ est requis.</p>
            </div>

            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >Prix</label
                >
                <input
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    type="number"
                    min="0"
                    name="price"
                    placeholder="0.00"
                />
            </div>

            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >Durée</label
                >
                <select
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    name="duration"
                >
                    <option value="1">1 mois</option>
                    <option value="3">3 mois</option>
                    <option value="12">1 an</option>
                </select>
            </div>

            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >Maximum de Cartes</label
                >
                <input
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    type="number"
                    name="maxCards"
                    placeholder="Nombre maximal de cartes"
                />
            </div>

            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >Maximum de Poches</label
                >
                <input
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    type="number"
                    name="maxPocket"
                    placeholder="Nombre maximal de poches"
                />
            </div>

            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >Maximum de Transactions</label
                >
                <input
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    type="number"
                    name="maxTransaction"
                    placeholder="Nombre maximal de transactions"
                />
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