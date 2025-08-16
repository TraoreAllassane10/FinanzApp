@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Gestion des Abonnements</h1>
    </div>

    <!-- Subscription Table -->
    <div class="overflow-x-auto rounded-lg bg-white p-2 shadow-md">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Prénom & Nom
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Type d'abonnement
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Début
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Fin
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Statut du paiement
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Statut
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Exemple de ligne de données -->
                <tr>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                        Jean Dupont
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm">
                        <span class="rounded-md bg-blue-200 px-3 py-1 text-xs font-semibold text-blue-700">Premium</span>
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                        01/01/2025
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                        01/01/2026
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm">
                        <span class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-700">Payé</span>
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm">
                        <span class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-700">Actif</span>
                    </td>
                    <td class="flex items-center border-b border-gray-200 px-6 py-4 text-sm">
                        <a href="{{ route('admin.subscription.show') }}" class="rounded-full bg-blue-200 px-3 py-1 text-xs font-semibold text-blue-700">👁️
                            Voir</a>
                        <a href="#"
                            class="ml-2 rounded-full bg-red-200 px-2 py-1 text-xs font-semibold text-red-700">🚫 Bloquer</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
