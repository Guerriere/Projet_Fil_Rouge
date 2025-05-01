<!-- resources/views/agency/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Tableau de bord - ') }} {{ auth('agency')->user()->agency_name }}
            </h2>
            <form method="POST" action="{{ route('agency.logout') }}">
                @csrf
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-md hover:bg-gray-700">
                    {{ __('Déconnexion') }}
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Statistiques -->
            <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-4">
                <div class="p-4 bg-white rounded-lg shadow-sm">
                    <h3 class="mb-2 text-sm font-medium text-gray-500">Réservations totales</h3>
                    <p class="text-3xl font-bold text-gray-800">0</p>
                </div>
                <div class="p-4 bg-white rounded-lg shadow-sm">
                    <h3 class="mb-2 text-sm font-medium text-gray-500">Réservations en attente</h3>
                    <p class="text-3xl font-bold text-gray-800">0</p>
                </div>
                <div class="p-4 bg-white rounded-lg shadow-sm">
                    <h3 class="mb-2 text-sm font-medium text-gray-500">Réservations confirmées</h3>
                    <p class="text-3xl font-bold text-gray-800">0</p>
                </div>
                <div class="p-4 bg-white rounded-lg shadow-sm">
                    <h3 class="mb-2 text-sm font-medium text-gray-500">Revenus du mois</h3>
                    <p class="text-3xl font-bold text-gray-800">0 FCFA</p>
                </div>
            </div>

            <!-- Message de bienvenue -->
            <div class="p-6 mb-6 bg-white rounded-lg shadow-sm">
                <h2 class="mb-4 text-xl font-semibold text-gray-800">Bienvenue sur votre tableau de bord!</h2>
                <p class="mb-4 text-gray-600">
                    Ce tableau de bord vous permet de gérer vos réservations, de mettre à jour vos informations et de suivre vos performances.
                </p>
                <p class="mb-4 text-gray-600">
                    Pour commencer, explorez les différentes sections disponibles dans le menu latéral.
                </p>
                <div class="p-4 bg-blue-50 rounded-md">
                    <h3 class="flex items-center mb-3 font-semibold text-blue-700">
                        <i class="mr-2 fas fa-info-circle"></i> Conseils pour démarrer
                    </h3>
                    <ul class="pl-5 space-y-2 list-disc text-blue-800">
                        <li>Complétez et mettez à jour votre profil pour augmenter votre visibilité</li>
                        <li>Ajoutez vos services avec des descriptions détaillées</li>
                        <li>Configurez vos disponibilités pour recevoir des réservations</li>
                        <li>N'hésitez pas à contacter notre support si vous avez des questions</li>
                    </ul>
                </div>
            </div>

            <!-- Dernières réservations -->
            <div class="p-6 bg-white rounded-lg shadow-sm">
                <h2 class="mb-4 text-xl font-semibold text-gray-800">Dernières réservations</h2>
                <div class="p-8 text-center text-gray-500">
                    <i class="mb-4 text-5xl fas fa-calendar-alt text-gray-300"></i>
                    <p>Vous n'avez pas encore de réservations.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>