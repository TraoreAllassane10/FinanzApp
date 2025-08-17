<!-- Toggle Button for Mobile -->
<button class="lg:hidden mb-4 p-2 bg-blue-600 text-white rounded-lg" onclick="toggleSidebar()" aria-label="Open Sidebar">
    <i class="fas fa-bars"></i>
</button>

<div class="flex flex-col lg:flex-row justify-between items-center mb-6">
    <input type="text" placeholder="Rechercher" class="w-full lg:w-1/3 p-2 rounded-lg border border-gray-300" />
    <div class="flex items-center space-x-4 mt-4 lg:mt-0">
        <div class="flex items-center space-x-2">
            <img src="{{ Auth::user()->image ? Auth::user()->getImageUrl() : 'https://via.placeholder.com/40' }}" alt="Profile" class="rounded-full w-10 h-10" />
            <a href="{{ route("profile.edit") }}">
                <h3 class="text-gray-800">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h3>
                <p class="text-gray-500 text-sm">{{auth()->user()->email}}</p>
            </a>
        </div>
    </div>
</div>
