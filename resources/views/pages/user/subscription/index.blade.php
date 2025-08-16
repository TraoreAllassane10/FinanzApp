@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-bold">Mes abonnements</h1>
</div>

<!-- Subscription Table -->
<div class="overflow-x-auto rounded-lg bg-white p-2 shadow-md">
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Date
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Abonnement
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Début
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Fin
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Montant
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Statut de paiement
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-3 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Statut
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                ></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td
                    class="border-b border-gray-200 px-3 py-4 text-sm text-gray-600"
                >
                    2025-01-06
                </td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">
                    <span
                        class="rounded-md bg-blue-200 px-3 py-1 text-xs font-semibold text-blue-700"
                    >
                        Plan Premium
                    </span>
                </td>
                <td
                    class="border-b border-gray-200 px-3 py-4 text-sm text-gray-600"
                >
                    <span
                        class="rounded-md bg-yellow-200 px-3 py-1 text-xs font-semibold text-yellow-700"
                    >
                        2025-01-01
                    </span>
                </td>
                <td class="border-b border-gray-200 px-3 py-4 text-sm">
                    <span
                        class="rounded-md bg-red-200 px-3 py-1 text-xs font-semibold text-red-700"
                    >
                        2025-12-31
                    </span>
                </td>
                <td class="border-b border-gray-200 px-4 py-4 text-sm">$100</td>
                <td class="border-b border-gray-200 px-4 py-4 text-sm">
                    <span
                        class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-blue-700"
                    >
                        Payé
                    </span>
                </td>
                <td class="border-b border-gray-200 px-3 py-4 text-sm">
                    <span
                        class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-700"
                    >
                        Actif
                    </span>
                </td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">
                    <button
                        class="rounded-full bg-red-200 px-3 py-1 text-sm font-semibold text-red-700"
                    >
                        📝 Annuler
                    </button>
                </td>
            </tr>
            <tr>
                <td
                    class="border-b border-gray-200 px-3 py-4 text-sm text-gray-600"
                >
                    2025-01-05
                </td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">
                    <span
                        class="rounded-md bg-blue-200 px-3 py-1 text-xs font-semibold text-blue-700"
                    >
                        Plan Standard
                    </span>
                </td>
                <td
                    class="border-b border-gray-200 px-3 py-4 text-sm text-gray-600"
                >
                    <span
                        class="rounded-md bg-yellow-200 px-3 py-1 text-xs font-semibold text-yellow-700"
                    >
                        2025-01-01
                    </span>
                </td>
                <td class="border-b border-gray-200 px-3 py-4 text-sm">
                    <span
                        class="rounded-md bg-red-200 px-3 py-1 text-xs font-semibold text-red-700"
                    >
                        2025-06-30
                    </span>
                </td>
                <td class="border-b border-gray-200 px-4 py-4 text-sm">$50</td>
                <td class="border-b border-gray-200 px-4 py-4 text-sm">
                    <span
                        class="rounded-full bg-yellow-200 px-3 py-1 text-xs font-semibold text-yellow-700"
                    >
                        En attente
                    </span>
                </td>
                <td class="border-b border-gray-200 px-3 py-4 text-sm">
                    <span
                        class="rounded-full bg-red-200 px-3 py-1 text-xs font-semibold text-red-700"
                    >
                        Expiré
                    </span>
                </td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">
                    <button
                        class="rounded-full bg-red-200 px-3 py-1 text-sm font-semibold text-red-700"
                    >
                        📝 Annuler
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection