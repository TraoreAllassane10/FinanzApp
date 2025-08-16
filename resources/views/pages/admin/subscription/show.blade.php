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
                        <span class="ml-2">Jean Dupont</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Type d'abonnement:</span>
                        <span class="ml-2">Premium</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Début:</span>
                        <span class="ml-2">2025-01-01</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Fin:</span>
                        <span class="ml-2">2025-12-31</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Statut du paiement:</span>
                        <span class="ml-2">Payé</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Statut:</span>
                        <span class="ml-2">Actif</span>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-row">
                        <span class="font-semibold">Nombre de cartes ajoutées:</span>
                        <span class="ml-2">10</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Nombre de poches créées:</span>
                        <span class="ml-2">5</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Nombre de transactions effectuées:</span>
                        <span class="ml-2">20</span>
                    </div>
                    <div class="flex flex-row">
                        <span class="font-semibold">Montant:</span>
                        <span class="ml-2">1000 €</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
