<!-- resources/views/agency/register-success.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Demande soumise avec succès') }}
        </h2>
    </x-slot>

    <div class="py-12">aut
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-center">
                        <div class="mb-6 text-green-500">
                            <i class="fas fa-check-circle text-6xl"></i>
                        </div>
                        <h3 class="mb-4 text-2xl font-bold">Merci pour votre inscription!</h3>
                        <p class="mb-6 text-lg text-gray-600">
                            Votre demande de partenariat a été soumise avec succès. Notre équipe l'examinera dans les plus brefs délais.
                        </p>
                        <p class="mb-8 text-gray-600">
                            Vous recevrez un email à l'adresse <span class="font-semibold">{{ session('email', 'votre adresse email') }}</span> dès que votre compte sera approuvé.
                        </p>
                        <div class="flex justify-center space-x-4">
                            <a href="{{ route('home') }}" class="px-6 py-2 font-semibold text-gray-800 bg-secondary rounded-md hover:bg-yellow-400">
                                Retour à l'accueil
                            </a>
                            <a href="{{ route('agency.login') }}" class="px-6 py-2 font-semibold text-white bg-primary rounded-md hover:bg-green-700">
                                Connexion
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>