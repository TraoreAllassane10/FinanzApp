@extends('layouts.app')

@section('contents')
    <div class="mb-6 grid grid-cols-1 gap-4 lg:grid-cols-3">
        <!-- Balance Card -->
        <div class="rounded-lg bg-white p-4 shadow">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-500">Nombre total d'utilisateurs</h3>
                <span class="rounded-full bg-yellow-100 p-2">💰</span>
            </div>
            <p class="mt-2 text-3xl font-semibold">25,000</p>
        </div>

        <!-- Income Card -->
        <div class="rounded-lg bg-white p-4 shadow">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-500">Nombre total de transactions</h3>
                <span class="rounded-full bg-green-100 p-2">📈</span>
            </div>
            <p class="mt-2 text-3xl font-semibold">12,345</p>
        </div>

        <div class="rounded-lg bg-white p-4 shadow">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-500">Revenu Total</h3>
                <span class="rounded-full bg-red-100 p-2">📉</span>
            </div>
            <p class="mt-2 text-3xl font-semibold">$125,345.67</p>
        </div>

        <div class="rounded-lg bg-white p-4 shadow">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-500">Nombre total d'abonnements</h3>
                <span class="rounded-full bg-red-100 p-2">👤</span>
            </div>
            <p class="mt-2 text-3xl font-semibold">8,765</p>
        </div>

        <div class="rounded-lg bg-white p-4 shadow">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-500">Nombre total d'abonnés gratuits</h3>
                <span class="rounded-full bg-red-100 p-2">👤</span>
            </div>
            <p class="mt-2 text-3xl font-semibold">4,321</p>
        </div>

        <div class="rounded-lg bg-white p-4 shadow">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-500">Revenu de ce mois</h3>
                <span class="rounded-full bg-red-100 p-2">📈</span>
            </div>
            <p class="mt-2 text-3xl font-semibold">$15,678</p>
        </div>
    </div>

    <!-- Subscription Table -->
    <div class="overflow-x-auto rounded-lg bg-white p-2 shadow-md">
        <h3 class="my-2 text-lg font-bold">Nouvelles inscriptions</h3>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Prenom & Nom
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Type d'abonnement
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Debut
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Fin
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Status du paiement
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                        Jean Dupont
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm">
                        <span class="rounded-md bg-blue-200 px-3 py-1 text-xs font-semibold text-blue-700">Premium</span>
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                        2025-01-01
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                        2025-12-31
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm">
                        <span class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-700">Payé</span>
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm">
                        <span class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-700">Actif</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
