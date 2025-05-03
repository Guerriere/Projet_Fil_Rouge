<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - TravelCam</title>
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
            background-color: rgba(173, 216, 230, 0.9); /* Bleu ciel semi-transparent */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 30px;
            max-width: 400px;
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
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <!-- Superposition sombre -->
    <div class="bg-overlay"></div>

    <div class="form-container relative z-10">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Se connecter</h2>
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                <input type="email" id="email" name="email" required autofocus
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="flex items-center">
                    <input type="checkbox" id="remember_me" name="remember"
                        class="h-4 w-4 text-primary border-gray-300 rounded focus:ring-primary">
                    <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Mot de passe oublié ?</a>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition">
                    Connexion
                </button>
            </div>
        </form>

        <!-- Register Link -->
        <p class="mt-6 text-center text-sm text-gray-600">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Inscrivez-vous</a>
        </p>
    </div>
</body>
</html>