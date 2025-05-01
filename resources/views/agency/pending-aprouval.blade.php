<!-- resources/views/agency/pending-approval.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Compte en attente d\'approbation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-center">
                        <div class="mb-6 text-yellow-500">
                            <i class="fas fa-clock text-6xl"></i>
                        </div>
                        <h3 class="mb-4 text-2xl font-bold">Votre compte est en cours d'examen</h3>
                        <p class="mb-6 text-lg text-gray-600">
                            Merci pour votre inscription! Notre équipe examine actuellement votre demande de partenariat.
                        </p>
                        <p class="mb-8 text-gray-600">
                            Vous recevrez une notification par email dès que votre compte sera approuvé. 
                            Cela peut prendre entre 2 et 5 jours ouvrables.
                        </p>
                        <p class="mb-6 text-gray-600">
                            Si vous avez des questions, n'hésitez pas à nous contacter à
                            <a href="mailto:partenaires@travelcam.com" class="text-primary hover:underline">partenaires@travelcam.com</a>
                        </p>
                        <form method="POST" action="{{ route('agency.logout') }}">
                            @csrf
                            <button type="submit" class="px-6 py-2 font-semibold text-white bg-gray-600 rounded-md hover:bg-gray-700">
                                Se déconnecter
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>