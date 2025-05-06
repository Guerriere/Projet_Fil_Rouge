<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/includes/menu.blade.php -->
@if (Auth::check() && Auth::user()->isPartner())
    <!-- Menu pour le partenaire -->
    <aside class="w-64 bg-blue-800 text-white">
        <div class="p-4">
            <h1 class="text-xl font-bold">TravelPro</h1>
            <p class="text-sm text-blue-200">Espace Partenaire</p>
        </div>
        <nav class="mt-6">
            <a href="#dashboard" class="flex items-center py-3 px-4 bg-blue-900 text-white">
                <i class="fas fa-tachometer-alt mr-3"></i>
                <span>Tableau de bord</span>
            </a>
            <a href="#offers" class="flex items-center py-3 px-4 hover:bg-blue-900 text-blue-200 hover:text-white">
                <i class="fas fa-luggage-cart mr-3"></i>
                <span>Offres et services</span>
            </a>
            <a href="#reservations" class="flex items-center py-3 px-4 hover:bg-blue-900 text-blue-200 hover:text-white">
                <i class="fas fa-calendar-check mr-3"></i>
                <span>Réservations</span>
            </a>
            <a href="#payments" class="flex items-center py-3 px-4 hover:bg-blue-900 text-blue-200 hover:text-white">
                <i class="fas fa-money-bill-wave mr-3"></i>
                <span>Paiements</span>
            </a>
            <a href="#communication" class="flex items-center py-3 px-4 hover:bg-blue-900 text-blue-200 hover:text-white">
                <i class="fas fa-comments mr-3"></i>
                <span>Communication</span>
            </a>
            <a href="#profile" class="flex items-center py-3 px-4 hover:bg-blue-900 text-blue-200 hover:text-white">
                <i class="fas fa-user-cog mr-3"></i>
                <span>Profil</span>
            </a>
            <a href="#reports" class="flex items-center py-3 px-4 hover:bg-blue-900 text-blue-200 hover:text-white">
                <i class="fas fa-chart-line mr-3"></i>
                <span>Statistiques</span>
            </a>
        </nav>
    </aside>
@endif