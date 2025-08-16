@extends('layouts.app')

@section('contents')
    <!-- Page Header -->
<h1 class="mb-6 text-3xl font-bold text-blue-600">Statistiques Financières</h1>

<!-- Graphs Grid -->
<div class="grid grid-cols-1 gap-6 md:grid-cols-2">
    <!-- Revenu vs Dépenses -->
    <div class="h-80 rounded-lg bg-white p-4 shadow">
        <h2 class="mb-4 text-xl font-semibold text-gray-700">
            Revenus vs Dépenses
        </h2>
        <canvas id="incomeExpenseChart" class="h-full"></canvas>
    </div>

    <!-- Catégories de Dépenses -->
    <div class="h-80 rounded-lg bg-white p-4 shadow">
        <h2 class="mb-4 text-xl font-semibold text-gray-700">
            Répartition des Dépenses
        </h2>
        <canvas id="expenseCategoryChart" class="h-full"></canvas>
    </div>

    <!-- Solde Mensuel -->
    <div class="h-80 rounded-lg bg-white p-4 shadow">
        <h2 class="mb-4 text-xl font-semibold text-gray-700">
            Évolution du Solde Mensuel
        </h2>
        <canvas id="monthlyBalanceChart" class="h-full"></canvas>
    </div>

    <!-- Poches Graphique -->
    <div class="h-80 rounded-lg bg-white p-4 shadow">
        <h2 class="mb-4 text-xl font-semibold text-gray-700">
            Progrès des Poches
        </h2>
        <canvas id="pocketProgressChart" class="h-full"></canvas>
    </div>
</div>


@endsection

@section('scripts')
    <script>
    function toggleSidebar() {
        const sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("-translate-x-full");
    }

    // Configuration du graphique Revenus vs Dépenses
    const incomeExpenseCtx = document
        .getElementById("incomeExpenseChart")
        .getContext("2d");
    new Chart(incomeExpenseCtx, {
        type: "line",
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
            datasets: [
                {
                    label: "Revenus",
                    data: [
                        5000, 7000, 8000, 5600, 9000, 10000, 7500, 8200, 9100,
                        9700, 8800, 10500,
                    ],
                    borderColor: "rgba(75, 192, 192, 1)",
                    backgroundColor: "rgba(75, 192, 192, 0.2)",
                    fill: true,
                },
                {
                    label: "Dépenses",
                    data: [
                        3000, 4500, 6000, 3500, 7000, 6500, 4000, 6000, 7000,
                        7800, 6500, 8000,
                    ],
                    borderColor: "rgba(255, 99, 132, 1)",
                    backgroundColor: "rgba(255, 99, 132, 0.2)",
                    fill: true,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        },
    });

    // Configuration du graphique Catégories de Dépenses
    const expenseCategoryCtx = document
        .getElementById("expenseCategoryChart")
        .getContext("2d");
    new Chart(expenseCategoryCtx, {
        type: "doughnut",
        data: {
            labels: [
                "Nourriture",
                "Transport",
                "Logement",
                "Loisirs",
                "Santé",
                "Autres",
            ],
            datasets: [
                {
                    data: [2000, 1500, 3000, 1000, 800, 500],
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56",
                        "#4BC0C0",
                        "#9966FF",
                        "#FF9F40",
                    ],
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        },
    });

    // Configuration du graphique Solde Mensuel
    const monthlyBalanceCtx = document
        .getElementById("monthlyBalanceChart")
        .getContext("2d");
    new Chart(monthlyBalanceCtx, {
        type: "bar",
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
            datasets: [
                {
                    label: "Solde",
                    data: [
                        1500, 2500, 3200, 4000, 3500, 3800, 4200, 4500, 4700,
                        5000, 5300, 5800,
                    ],
                    backgroundColor: "rgba(54, 162, 235, 0.6)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        },
    });

    // Configuration du graphique Progrès des Poches
    const pocketProgressCtx = document
        .getElementById("pocketProgressChart")
        .getContext("2d");
    new Chart(pocketProgressCtx, {
        type: "bar",
        data: {
            labels: ["Éducation", "Voyage", "Fonds d'Urgence"],
            datasets: [
                {
                    label: "Pourcentage de Réalisation",
                    data: [
                        (25000 / 50000) * 100, // Pourcentage pour Éducation
                        (5000 / 40000) * 100, // Pourcentage pour Voyage
                        (15000 / 35000) * 100, // Pourcentage pour Fonds d'Urgence
                    ],
                    backgroundColor: [
                        "#4CAF50", // Couleur pour Éducation
                        "#FFC107", // Couleur pour Voyage
                        "#F44336", // Couleur pour Fonds d'Urgence
                    ],
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true,
                },
                y: {
                    beginAtZero: true,
                    max: 100,
                    title: {
                        display: true,
                        text: "Pourcentage (%)",
                    },
                },
            },
        },
    });
</script>
@endsection