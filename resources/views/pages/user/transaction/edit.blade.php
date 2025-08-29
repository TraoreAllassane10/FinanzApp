@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Gestion des transactions</h1>
        <a href="./edit-card.html" class="rounded bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600">
            Annuler
        </a>
    </div>

    <!-- Error Message -->
    @error('error')
        <div class="w-full bg-red-400 p-3 text-center text-white">
            {{ session('error') }}
        </div>
    @enderror

    <div id="cardPopup" class="w-full">
        <div class="rounded-lg bg-white p-6 shadow-lg">
            <h2 class="mb-4 text-lg font-semibold"> {{isset($transaction) ? "Modifier" : "Ajouter"}}  une transaction</h2>
            <form action=" {{isset($transaction) ? route('transaction.update', $transaction) : route('transaction.store')}} " method="POST">
                @csrf
                @if (isset($transaction))
                    @method('PUT')
                @endif
                
                <!-- Type de Transaction -->
                <div class="mb-4">
                    <label for="type" class="mb-2 block font-bold text-gray-700">Type de Transaction</label>
                    <select name="type" id="type" required
                        class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none">
                        <option value="">Sélectionnez un type</option>
                        @foreach ($types as $type)
                            <option @if (isset($transaction)) @selected($transaction->type === $type) @endif
                                value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    @error('type')
                        <div class="mt-2 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Source -->
                <div class="mb-4">
                    <label for="source" class="mb-2 block font-bold text-gray-700">Source</label>
                    <select name="source_id" id="source"
                        class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none">
                        <option value="">
                            Sélectionnez une source (si applicable)
                        </option>
                        <optgroup label="Cartes">
                            @foreach ($cards as $card)
                                <option @if (isset($transaction) && $transaction->type != null) @selected($transaction->type->id == $card->id) @endif
                                    value="{{ $card->id }}" data-type="card">{{ $card->name }} (${{ $card->balance }})
                                </option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Poches">
                            @foreach ($source_pockets as $pocket)
                                <option @if (isset($pocket) && $pocket->type != null) @selected($pocket->type->id == $card->id) @endif
                                    value="{{ $pocket->id }}" data-type="pocket">{{ $pocket->name }}
                                    (${{ $pocket->balance }})</option>
                            @endforeach
                        </optgroup>
                    </select>
                    @error('source_id')
                        <div class="mt-2 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Destination -->
                <div class="mb-4">
                    <label for="destination" class="mb-2 block font-bold text-gray-700">Destination</label>
                    <select name="destination_id" id="destination"
                        class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none">
                        <option value="">
                            Sélectionnez une destination (si applicable)
                        </option>
                        <optgroup label="Cartes">
                            @foreach ($cards as $card)
                                <option @if (isset($transaction) && $transaction->type != null) @selected($transaction->type->id == $card->id) @endif
                                    value="{{ $card->id }}" data-type="card">{{ $card->name }}
                                    (${{ $card->balance }})</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Poches">
                            @foreach ($dest_pockets as $pocket)
                                <option @if (isset($pocket) && $pocket->type != null) @selected($pocket->type->id == $card->id) @endif
                                    value="{{ $pocket->id }}" data-type="pocket">{{ $pocket->name }}
                                    (${{ $pocket->balance }})</option>
                            @endforeach
                        </optgroup>
                    </select>
                    @error('destination_id')
                        <div class="mt-2 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="mb-2 block font-bold text-gray-700">Description</label>
                    <input type="text" name="description" id="description" required value="{{old( "description", isset($transaction) ? $transaction->description : '')}}"
                        class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none" />
                    @error('description')
                        <div class="mt-2 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Montant -->
                <div class="mb-4">
                    <label for="amount" class="mb-2 block font-bold text-gray-700">Montant</label>
                    <input type="number" name="amount" id="amount" required value="{{old( "amount", isset($transaction) ? $transaction->amount : '')}}"
                        class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none" />
                    @error('amount')
                        <div class="mt-2 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bouton Soumettre -->
                <div class="text-right">
                    <button type="submit"
                        class="w-full rounded bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600">
                        {{isset($transaction) ? "Modifier" : "Ajouter"}} Transaction
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
