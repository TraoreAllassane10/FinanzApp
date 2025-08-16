@extends('layouts.app')

@section('contents')
<!-- Page Heading -->
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center">
        <h1 class="text-2xl font-bold">Gestion des Transactions</h1>
        <p>
            Il vous reste : <span class="text-red-400">5</span> Transactions
            possibles
        </p>
    </div>

    <a href="{{route("transaction.create")}}"
        class="rounded-full bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600"
    >
        Ajouter une transaction
    </a>
</div>

<!-- Success Message -->
<div class="w-full bg-green-400 p-3 text-center text-white">
    Transaction ajoutée avec succès
</div>

<!-- Transactions Table -->
<div class="overflow-x-auto rounded-lg bg-white shadow-md">
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
                    Type
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Description
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Source
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Destination
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                >
                    Montant
                </th>
                <th
                    class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                ></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td
                    class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600"
                >
                    2025-01-06 10:30:00
                </td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">
                    <span
                        class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-blue-700"
                    >
                        Crédit
                    </span>
                </td>
                <td
                    class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600"
                >
                    Transaction de dépôt
                </td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">
                    <span
                        class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-green-700"
                    >
                        Compte A
                    </span>
                </td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">
                    <span
                        class="rounded-md bg-blue-200 px-3 py-1 text-xs font-semibold text-blue-700"
                    >
                        Compte B
                    </span>
                </td>
                <td
                    class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600"
                >
                    200
                </td>
                <td
                    class="flex items-center border-b border-gray-200 px-6 py-4 text-sm"
                >
                    <a
                        href="/transaction/edit/1"
                        class="rounded-full bg-blue-200 px-3 py-1 text-sm font-semibold text-green-700"
                    >
                        📝
                    </a>
                    <form action="/transaction/destroy/1" method="POST">
                        <button
                            class="rounded-full bg-red-200 px-3 py-1 text-sm font-semibold text-green-700"
                        >
                            🗑️
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection