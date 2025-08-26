@extends('layouts.app')

@section('contents')
    <!-- Page Heading -->
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Détails de l'abonnement</h1>
    </div>

    <div class="overflow-x-auto rounded-lg bg-white p-2 shadow-md">
        <div class="flex flex-col">
            <div class="flex flex-row justify-between">
                <div class="flex flex-col">
                    <div class="flex flex-row">
                        <span class="font-semibold">Prénom & Nom:</span>
                        <span class="ml-2">{{$subscription->subscriber->first_name}} {{$subscription->subscriber->last_name}}</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Type d'abonnement:</span>
                        <span class="ml-2">{{$subscription->plan->name}}</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Début:</span>
                        <span class="ml-2">{{$subscription->start_date}}</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Fin:</span>
                        <span class="ml-2">{{$subscription->end_date}}</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Statut du paiement:</span>
                        <span class="ml-2">{{$subscription->payment_status}}</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Statut:</span>
                        <span class="ml-2">{{$subscription->status}}</span>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-row">
                        <span class="font-semibold">Nombre de cartes ajoutées:</span>
                        <span class="ml-2">{{$subscription->card_count}}</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Nombre de poches créées:</span>
                        <span class="ml-2">{{$subscription->pocket_count}}</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Nombre de transactions effectuées:</span>
                        <span class="ml-2">{{$subscription->transaction_count}}</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Montant:</span>
                        <span class="ml-2">{{$subscription->amount}} €</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
