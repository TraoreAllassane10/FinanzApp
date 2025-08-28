@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <div class="mb-6 flex flex-col items-center justify-between lg:flex-row">
        <div class="flex items-center">
            <h1 class="text-2xl font-bold">Gestion des Poches</h1>
            <p>
                Il vous reste : <span class="text-red-400">{{ $remaining_pockets }}</span> poches possibles
            </p>
        </div>

        @if ($remaining_pockets > 0)
            <a href="{{ route('pocket.create') }}"
                class="rounded-full bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600">
                Ajouter une poche
            </a>
        @else
            <!-- Sinon -->
            <button class="mt-4 rounded bg-red-300 px-4 py-2 font-bold text-red-700" disabled>
                Max de poche épuisé, il faut mettre à niveau
            </button>
            <a href="/" class="rounded-full bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600">
                Mettre à niveau
            </a>
        @endif
    </div>

    <!-- Success Message -->
    @session('success')
        <div class="w-full bg-green-400 p-3 text-center text-white">
            {{ session('success') }}
        </div>
    @endsession

    <!-- Pockets Cards -->
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        <!-- Example Pocket -->

        @foreach ($pockets as $pocket)
            <div class="rounded-lg bg-white p-4 shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <h2 class="mb-2 text-lg font-bold text-gray-800">
                            {{$pocket->name}}
                        </h2>
                        <p class="mb-4 text-sm text-gray-500">Échéance : {{$pocket->due_date}}</p>
                    </div>
                    <span class="text-bold {{$pocket->is_blocked == 0 ? "bg-red-400" : "bg-green-400"}}  rounded-md p-2 text-sm text-white">{{$pocket->is_blocked == 0 ? "Bloque" : "Ouvert"}}</span>
                </div>
                <div class="z-10 pt-1">
                    <div class="mb-2 flex items-center justify-between">
                        <span class="inline-block text-xs font-semibold text-gray-600">
                            Objectif : ${{$pocket->balance_goal}}
                        </span>
                        <span class="inline-block text-xs font-semibold text-gray-600">{{$pocket->progression}}%</span>
                    </div>
                    <div class="z-0 h-2 w-full rounded-full bg-gray-200">
                        <div class="h-2 rounded-full bg-blue-600" style="width: {{$pocket->progression}}%"></div>
                    </div>
                </div>
                <div class="mt-4 flex justify-between">
                    <a href="/transaction/create" class="rounded-md px-3 text-green-600 hover:bg-green-200">
                        Charger la Poche
                    </a>
                    <a href="{{route('pocket.edit', $pocket)}}" class="rounded-md px-3 text-blue-600 hover:bg-blue-200">
                        Modifier
                    </a>
                    <form method="POST" action="{{route('pocket.destroy', $pocket)}}">
                        @csrf
                        @method("delete")
                        <button type="submit" class="rounded-md px-3 text-red-600 hover:bg-red-200">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
@endsection
