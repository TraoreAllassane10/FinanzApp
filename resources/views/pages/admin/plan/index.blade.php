@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <div class="mb-6 flex flex-col items-center justify-between lg:flex-row">
        <h1 class="text-2xl font-bold">Gestion des Plans d'abonnement</h1>

        <a href="{{ route('plan.create') }}" class="rounded-full bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600">
            Ajouter un plan
        </a>
    </div>

    <!-- Message de succès -->
    <div class="w-full bg-green-400 p-3 text-center text-white">
        Plan ajouté avec succès !
    </div>

    <!-- Subscription Table -->
    <div class="overflow-x-auto rounded-lg bg-white p-2 shadow-md">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Nom du plan
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Durée
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-2 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Nombre Cartes Autorisées
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-2 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Nombre Poches Autorisées
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-2 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Nombre Transactions Autorisées
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Montant
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm">
                        <span class="rounded-md bg-blue-200 px-3 py-1 text-xs font-semibold text-blue-700">
                            Plan Premium
                        </span>
                    </td>
                    <td class="border-b border-gray-200 px-4 py-4 text-sm">
                        <span class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-green-700">
                            1 an
                        </span>
                    </td>
                    <td class="border-b border-gray-200 px-2 py-4 text-sm">
                        <span class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-green-700">
                            5
                        </span>
                    </td>
                    <td class="border-b border-gray-200 px-2 py-4 text-sm">
                        <span class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-green-700">
                            10
                        </span>
                    </td>
                    <td class="border-b border-gray-200 px-3 py-4 text-sm">
                        <span class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-green-700">
                            100
                        </span>
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm">
                        $100.00
                    </td>
                    <td class="flex items-center border-b border-gray-200 px-6 py-4 text-sm">
                        <a href="#" class="rounded-full bg-blue-200 px-3 py-1 text-sm font-semibold text-green-700">
                            📝
                        </a>
                        <form method="POST" action="#">
                            <button class="rounded-full bg-red-200 px-3 py-1 text-sm font-semibold text-green-700"
                                type="submit">
                                🗑️
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
