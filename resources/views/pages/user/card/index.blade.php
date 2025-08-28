@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <div class="mb-6 flex items-center justify-between">
        <div class="flex items-center">
            <h1 class="mr-4 text-2xl font-bold">Mes Cartes</h1>
            <p>
                Il vous reste : <span class="text-red-400">{{ $remaningCards }}</span> Cartes possible
            </p>
        </div>

        <!-- Condition: Si le nombre de cartes restantes est supérieur à 0 -->
        @if ($remaningCards)
            <a href="{{ route('card.create') }}"
                class="rounded-full bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600">
                Ajouter une carte
            </a>
        @else
            <!-- Sinon -->
            <button class="mt-4 rounded bg-red-300 px-4 py-2 font-bold text-red-700" disabled>
                Max de carte épuisé, il faut mettre à niveau
            </button>
            <a href="/" class="rounded-full bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600">
                Mettre à niveau
            </a>
        @endif


    </div>

    <!-- Message de succès -->
    @session('success')
        <div class="w-full bg-green-400 p-3 text-center text-white">
            {{ session('success') }}
        </div>
    @endsession


    <!-- Cards Section -->
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($cards as $item)
            <div class="card rounded-lg bg-gradient-to-r from-blue-500 to-purple-500 p-4 text-white shadow-lg">
                <h2 class="mb-4 text-lg font-semibold">{{ $item->name }}</h2>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600">Type: {{ $item->type }}</p>
                        <p class="text-gray-600">**** **** **** {{ substr($item->card_number, -4) }}</p>
                        <p class="text-sm text-gray-700">Expire:
                            {{ Carbon\Carbon::parse($item->expiry_date)->format('m-Y') }}</p>
                        <p class="text-sm text-gray-700">CVV:
                            {{ $item->cvv }}</p>
                    </div>
                    <span class="text-bold text-lg">${{ $item->balance }}</span>
                </div>
                <div class="mt-4 flex justify-end space-x-2">
                    <a href="{{route('card.edit', $item)}}"
                        class="rounded border border-blue-600 px-2 py-1 text-blue-700 hover:text-blue-800"
                        aria-label="Edit Card">
                        Modifier
                    </a>
                    <form method="POST" action="{{route('card.destroy', $item)}}">
                        @csrf
                        @method('delete')
                        <button type="submit"
                            class="rounded border border-red-600 px-2 py-1 text-red-600 hover:text-red-700">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
@endsection
