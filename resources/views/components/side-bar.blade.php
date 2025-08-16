<!-- Sidebar -->
<aside id="sidebar"
    class="bg-white w-64 h-full p-6 shadow-md fixed top-0 left-0 flex flex-col lg:translate-x-0 -translate-x-full transform transition-transform duration-300 ease-in-out">
    <button class="text-gray-500 mb-4 lg:hidden" onclick="toggleSidebar()" aria-label="Close Sidebar">
        <i class="fas fa-times"></i>
    </button>
    <h1 class="text-2xl font-bold text-blue-600 mb-6">FinanzApp</h1>
    <nav class="space-y-4 flex-grow">
        <a href="{{ auth()->user()->role == 'admin' ? route('admin.home') : route('user.home') }}"
            class="flex items-center space-x-2 text-gray-700">
            🏠
            <span>Dashboard</span>
        </a>

        @if (auth()->user()->role == 'admin')
            <a href="{{route('plan.index')}}" class="flex items-center space-x-2 text-gray-700">
                📝
                <span>Plans d'abonnement</span>
            </a>
            <a href="{{ route('admin.subscription') }}" class="flex items-center space-x-2 text-gray-700">
                🔗
                <span>Abonnements</span>
            </a>
            <a href="{{route('admin.user')}}" class="flex items-center space-x-2 text-gray-700">
                👥
                <span>Gerer Utilisateurs</span>
            </a>
            <a href="{{route('admin.transaction')}}" class="flex items-center space-x-2 text-gray-700">
                💱
                <span>Transactions</span>
            </a>
        @else
            <a href="{{route("card.index")}}" class="flex items-center space-x-2 text-gray-700">
                💳
                <span>Mes Cartes</span>
            </a>
            <a href="{{route("pocket.index")}}" class="flex items-center space-x-2 text-gray-700">
                💸
                <span>Gestion des Poches</span>
            </a>
            <a href="{{route("transaction.index")}}" class="flex items-center space-x-2 text-gray-700">
                💱
                <span>Transactions</span>
            </a>
            <a href="{{route("stats.index")}}" class="flex items-center space-x-2 text-gray-700">
                📈
                <span>Statistics</span>
            </a>
            <a href="{{route("subscription.index")}}" class="flex items-center space-x-2 text-gray-700">
                🔗
                <span>Mes Abonnements</span>
            </a>
        @endif

    </nav>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="mt-auto text-red-500 flex items-center space-x-2 w-full">
            <span>Deconnexion</span>
        </button>
    </form>
</aside>
