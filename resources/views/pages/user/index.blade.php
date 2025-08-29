@extends('layouts.app')

@section('contents')
    <div class="mb-6 grid grid-cols-1 gap-4 lg:grid-cols-3">
        <!-- Balance Card -->
        <div class="rounded-lg bg-white p-4 shadow">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-500">Mon Solde</h3>
                <span class="rounded-full bg-yellow-100 p-2">💰</span>
            </div>
            <p class="mt-2 text-3xl font-semibold">${{number_format($totalBalance, 2, ",")}}</p>
        </div>

        <!-- Income Card -->
        <div class="rounded-lg bg-white p-4 shadow">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-500">Revenus de ce mois</h3>
                <span class="rounded-full bg-green-100 p-2">📈</span>
            </div>
            <p class="mt-2 text-3xl font-semibold">${{number_format($currentMonthIncome, 2, ",")}}</p>
        </div>

        <!-- Expenses Card -->
        <div class="rounded-lg bg-white p-4 shadow">
            <div class="flex items-center justify-between">
                <h3 class="text-gray-500">Dépenses de ce mois</h3>
                <span class="rounded-full bg-red-100 p-2">📉</span>
            </div>
            <p class="mt-2 text-3xl font-semibold">{{number_format($currentMonthExpenses, 2, ",")}}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
        <!-- Main Content Left -->
        <div class="lg:col-span-2">
            <!-- Cash Flow Report -->
            <div class="mb-6 rounded-lg bg-white p-6 shadow">
                <h3 class="text-gray-700">Rapport de flux de trésorerie</h3>
                <div class="mt-4">
                    <canvas id="cashFlowChart" class="w-full"></canvas>
                </div>
            </div>

            <!-- Transaction History -->
            <div class="overflow-x-auto rounded-lg bg-white p-6 shadow">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-700">
                        Historique des transactions
                    </h3>
                </div>

                <table class="mt-4 w-full min-w-[600px]">
                    <thead>
                        <tr>
                            <th
                                class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Date
                            </th>
                            <th
                                class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Type
                            </th>
                            <th
                                class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Source
                            </th>
                            <th
                                class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Destination
                            </th>
                            <th
                                class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Montant
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($lastTransactions as $transaction)
                         <tr>
                            <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                                {{$transaction->created_at}}
                            </td>
                            <td class="border-b border-gray-200 px-6 py-4 text-sm">
                                <span
                                    class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-blue-700">{{$transaction->type}}</span>
                            </td>
                            <td class="border-b border-gray-200 px-6 py-4 text-sm">
                                <span class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-green-700">{{$transaction->source?->type}}</span>
                            </td>
                            <td class="border-b border-gray-200 px-6 py-4 text-sm">
                                {{$transaction->destination?->type}}
                            </td>
                            <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                                ${{$transaction->amount}}
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-4">
            <!-- My Cards -->
            <div class="my-cards-container rounded-lg bg-white p-6 shadow-md">
                <h2 class="mb-4 text-xl font-semibold">Mes Cartes</h2>
                <p class="mb-4 text-gray-600">Gérez vos cartes</p>
                <div class="card-wrapper">
                    <div class="card rounded-lg bg-gradient-to-r from-blue-500 to-purple-500 p-4 shadow-lg">
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-semibold text-white">{{$latestCard->type}}</span>
                        </div>
                        <div class="mt-2 text-2xl text-white">
                            **** **** **** {{substr($latestCard->card_number, -4)}}
                        </div>
                        <div class="mt-4 flex justify-between text-white">
                            <span>{{$latestCard->name}}</span>
                            <span>{{\Carbon\Carbon::parse($latestCard->expiry_date)->format("m/y")}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection

@section('scripts')
 
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("-translate-x-full");
        }

        // Configuration du graphique de flux de trésorerie
        const ctx = document.getElementById("cashFlowChart").getContext("2d");
        const cashFlowChart = new Chart(ctx, {
            type: "bar", // Type de graphique : barre
            data: {
                labels: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                datasets: [{
                        label: "Revenus",
                        data: {!! json_encode(array_values($monthlyIncome ?? [])) !!},
                        backgroundColor: "rgba(75, 192, 192, 0.6)",
                        borderColor: "rgba(75, 192, 192, 1)",
                        borderWidth: 1,
                    },
                    {
                        label: "Dépenses",
                        data: {!! json_encode(array_values($monthlyExpenses ?? [])) !!},
                        backgroundColor: "rgba(255, 99, 132, 0.6)",
                        borderColor: "rgba(255, 99, 132, 1)",
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                responsive: true,
                maintainAspectRatio: false,
            },
        });
    </script>
@endsection
