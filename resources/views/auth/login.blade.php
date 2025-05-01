<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - TravelCam</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-LZ0pDyjz.css') }}">
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
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
                <a href="{{ route('password.request') }}" class="text-sm text-primary hover:underline">Mot de passe oublié ?</a>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-primary text-white py-2 px-4 rounded-md hover:bg-primary/90 transition">
                    Connexion
                </button>
            </div>
        </form>

        <!-- Register Link -->
        <p class="mt-6 text-center text-sm text-gray-600">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="text-primary hover:underline">Inscrivez-vous</a>
        </p>
    </div>
</body>
</html>