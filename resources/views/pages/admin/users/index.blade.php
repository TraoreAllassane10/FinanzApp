@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <div class="mb-6 flex flex-col items-center justify-between lg:flex-row">
        <h1 class="text-2xl font-bold">Gestion des utilisateurs</h1>
    </div>

    <div class="overflow-x-auto rounded-lg bg-white p-2 shadow-md">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Date
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Prénom & Nom
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Abonnement
                    </th>
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                        Statut d'abonnement
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Transaction Row 1 -->
                <tr>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                        2025-01-05
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                        Alice Martin
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm">
                        <span class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-green-700">
                            Premium
                        </span>
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm">
                        <span class="rounded-md bg-blue-200 px-3 py-1 text-xs font-semibold text-blue-700">
                            Actif
                        </span>
                    </td>
                </tr>
                <!-- Transaction Row 2 -->
                <tr>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                        2025-01-03
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                        Bob Dupont
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm">
                        <span class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-green-700">
                            Standard
                        </span>
                    </td>
                    <td class="border-b border-gray-200 px-6 py-4 text-sm">
                        <span class="rounded-md bg-blue-200 px-3 py-1 text-xs font-semibold text-blue-700">
                            Inactif
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
