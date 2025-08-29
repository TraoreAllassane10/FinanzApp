@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <div class="mb-6 flex items-center justify-between">
        <div class="flex items-center">
            <h1 class="text-2xl font-bold">Gestion des Transactions</h1>
            <p>
                Il vous reste : <span class="text-red-400">{{ $remaining_transactions }}</span> Transactions
                possibles
            </p>
        </div>

        @if ($remaining_transactions > 0)
            <a href="{{ route('transaction.create') }}"
                class="rounded-full bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600">
                Ajouter une transaction
            </a>
        @else
            <!-- Sinon -->
            <button class="mt-4 rounded bg-red-300 px-4 py-2 font-bold text-red-700" disabled>
                Max de transaction épuisée, il faut mettre à niveau
            </button>
            <a href="/" class="rounded-full bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600">
                Mettre à niveau
            </a>
        @endif
    </div>

    <!-- Success Message -->
    @error('success')
        <div class="w-full bg-green-400 p-3 text-center text-white">
            {{ session('success') }}
        </div>
    @enderror

    <!-- Transactions Table -->
    <div class="overflow-x-auto rounded-lg bg-white shadow-md">
        <table class="min-w-full bg-white">
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
                        Description
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
                    <th
                        class="border-b-2 border-gray-300 bg-gray-100 px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $item)
                    <tr>
                        <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                            {{ $item->created_at }}
                        </td>
                        <td class="border-b border-gray-200 px-6 py-4 text-sm">
                            <span class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-blue-700">
                                {{ $item->type }}
                            </span>
                        </td>
                        <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                            {{ $item->description }}
                        </td>
                        <td class="border-b border-gray-200 px-6 py-4 text-sm">
                            <span class="rounded-md bg-green-200 px-3 py-1 text-xs font-semibold text-green-700">
                                {{ $item->source?->name }}
                            </span>
                        </td>
                        <td class="border-b border-gray-200 px-6 py-4 text-sm">
                            <span class="rounded-md bg-blue-200 px-3 py-1 text-xs font-semibold text-blue-700">
                                {{ $item->destination?->name }}
                            </span>
                        </td>
                        <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">
                            {{ $item->amount }}
                        </td>
                        <td class="flex items-center border-b border-gray-200 px-6 py-4 text-sm">
                            <a href="{{ route('transaction.edit', $item) }}"
                                class="rounded-full bg-blue-200 px-3 py-1 text-sm font-semibold text-green-700">
                                📝
                            </a>
                            <form action="{{ route('transaction.destroy', $item) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="rounded-full bg-red-200 px-3 py-1 text-sm font-semibold text-green-700">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
