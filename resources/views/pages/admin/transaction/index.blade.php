@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-bold">Gestion des transactions</h1>
</div>

<div class="overflow-x-auto rounded-lg bg-white p-2 shadow-md">
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Date
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Prénom & Nom
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Nom Transaction
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Type
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Montant
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td
                    class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600"
                >
                    2025-01-05
                </td>
                <td
                    class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600"
                >
                    Alice Martin
                </td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">
                    <span
                        class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-green-700"
                    >
                        Paiement abonnement
                    </span>
                </td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">
                    <span
                        class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-green-700"
                    >
                        Crédit
                    </span>
                </td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">$50</td>
            </tr>
            <tr>
                <td
                    class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600"
                >
                    2025-01-04
                </td>
                <td
                    class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600"
                >
                    Bob Dupont
                </td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">
                    <span
                        class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-green-700"
                    >
                        Achat de services
                    </span>
                </td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">
                    <span
                        class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-green-700"
                    >
                        Débit
                    </span>
                </td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">$30</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection