<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - TravelCam</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-LZ0pDyjz.css') }}">
    <style>
        body {
            background: url('../images/agence1.jpg') no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }
        /* Superposition sombre */
        .bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7); /* Couleur sombre avec opacité */
            z-index: -1;
        }
        .form-container {
            background-color: rgba(173, 216, 230, 0.9);            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 30px;
            max-width: 700px; /* Augmentation de la largeur */
            width: 100%;
        }
        input {
            font-size: 0.85rem; /* Réduction de la taille de la police */
            padding: 0.4rem; /* Réduction de la hauteur des champs */
        }
        .btn-primary {
            background-color: #007bff; /* Couleur primaire */
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Couleur primaire foncée */
            border-color: #0056b3;
        }
        .btn-rounded {
            background-color: #007bff;
            color: white;
            border-radius: 50px;
            padding: 12px 24px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-rounded:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <!-- Superposition sombre -->
    <div class="bg-overlay"></div>

    <div class="form-container relative z-10">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Créer un compte</h2>
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf
            <!-- Name and Email -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                        placeholder="Entrez votre nom"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                    @error('name')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        placeholder="Entrez votre email"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                    @error('email')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Telephone and Adresse -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                    <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}" required
                        placeholder="Entrez votre téléphone"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                    @error('telephone')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse</label>
                    <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}" required
                        placeholder="Entrez votre adresse"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                    @error('adresse')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Password and Confirm Password -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" id="password" name="password" required
                        placeholder="Entrez votre mot de passe"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                    @error('password')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        placeholder="Confirmez votre mot de passe"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
                    @error('password_confirmation')
                        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn-rounded">
                    S'inscrire
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <p class="mt-6 text-center text-sm text-gray-600">
            Déjà inscrit ?
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Se connecter</a>
        </p>
    </div>
</body>
</html>