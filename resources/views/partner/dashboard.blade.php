<!-- resources/views/partner/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord partenaire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-lg font-medium mb-4">
                        Bienvenue, {{ auth()->user()->name }} ({{ $partner->nom_agence }})
                    </div>

                    <div class="mb-4">
                        <h3 class="text-md font-medium">Informations de l'agence</h3>
                        <p class="mt-2"><strong>Adresse:</strong> {{ $partner->adresse }}</p>
                        <p><strong>Téléphone:</strong> {{ $partner->telephone }}</p>
                        <p><strong>Licence:</strong> {{ $partner->licence }}</p>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-md font-medium">Statut de vérification</h3>
                        <p class="mt-2">
                            @if($partner->verified)
                                <span class="text-green-600">Agence vérifiée</span>
                            @else
                                <span class="text-yellow-600">En attente de vérification</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>