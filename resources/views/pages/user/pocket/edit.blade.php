@extends('layouts.app')

@section('contents')
    <div class="mb-6 flex flex-col items-center justify-between lg:flex-row">
    <h1 class="text-2xl font-bold">Gestion des Poches</h1>
    <button
        class="rounded bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600"
    >
        Annuler
    </button>
</div>

<div class="w-full">
    <div class="rounded-lg bg-white p-6">
        <h2 class="mb-4 text-xl font-bold">Ajouter une Poche</h2>
        <form method="POST" action="/pocket/store">
            <!-- Static form values -->
            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700">
                    Nom de la poche
                </label>
                <input
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    type="text"
                    name="name"
                    value="Poche de vacances"
                />
            </div>

            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >Echéance</label
                >
                <input
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    type="date"
                    name="dueDate"
                    value="2025-12-31"
                />
            </div>

            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >Objectif min $500</label
                >
                <input
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    type="number"
                    name="balanceGoal"
                    value="500"
                />
            </div>

            <div class="mt-4">
                <label class="mb-2 block text-sm font-bold text-gray-700"
                    >Statut</label
                >
                <select
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                    id="blocked"
                    name="isBlocked"
                >
                    <option selected value="0">Bloqué</option>
                    <option value="1">Ouvert</option>
                </select>
            </div>
            <div class="mt-8 text-right">
                <button
                    class="w-full rounded bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600"
                    type="submit"
                >
                    Créer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection