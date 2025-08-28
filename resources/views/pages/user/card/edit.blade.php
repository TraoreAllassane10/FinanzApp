@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Gestion des cartes</h1>
        <a href="./edit-card.html" class="rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
            Annuler
        </a>
    </div>

    <div class="w-full">
        <div class="rounded-lg bg-white p-6 shadow-lg">
            <h2 class="mb-4 text-lg font-semibold"> {{ isset($card) ? 'Modifier' : 'Ajouter' }} une carte bancaire</h2>
            <form id="cardForm" method="POST"
                action="{{ isset($card) ? route('card.update', $card) : route('card.store') }}">
                <!-- CSRF Token -->
                @csrf

                @if (isset($card))
                    @method('PUT')
                @endif

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-bold text-gray-700">Nom sur la carte</label>
                    <input
                        class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                        type="text" name="name" value="{{old("name", isset($card) ? $card->name : '')}}" />
                    @error('name')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-bold text-gray-700">Type</label>
                    <select
                        class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                        name="type">

                        @foreach ($card_types as $item)
                            <option @if (isset($card)) @selected($card->type == $item) @endif
                                value="{{ $item }}">{{ $item }}</option>
                        @endforeach

                    </select>
                    @error('type')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-bold text-gray-700">Numéro de la carte</label>
                    <input
                        class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                        type="number" name="card_number" value="{{old("card_number", isset($card) ? $card->card_number : '')}}" />
                    @error('card_number')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-bold text-gray-700">Date d'expiration</label>
                    <input
                        class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                        type="date" name="expiry_date" value="{{old("expiry_date", isset($card) ? $card->expiry_date : '')}}" />
                    @error('expiry_date')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <label class="mb-2 block text-sm font-bold text-gray-700">CVV</label>
                    <input
                        class="focus:shadow-outline block w-full appearance-none rounded border border-gray-300 bg-gray-200 px-4 py-2 text-gray-700 focus:outline-none"
                        type="number" name="cvv" value="{{old("cvv", isset($card) ? $card->cvv : '')}}" />
                    @error('cvv')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-8 text-right">
                    <button class="w-full rounded bg-gray-700 px-4 py-2 font-bold text-white hover:bg-gray-600">
                        {{ isset($card) ? 'Modifier' : 'Créer' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
