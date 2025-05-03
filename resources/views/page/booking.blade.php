<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/page/agences.blade.php -->
<!DOCTYPE html>
<html lang="fr">

@include('includes.header')

<body class="bg-gray-100">
    <!-- Navbar -->
    @include('includes.navbar')

    <!-- Bannière Nos Agences -->
    <div class="container-fluid position-relative banner-apropos">
        <div class="banner-overlay"></div>
        <div class="text-center text-white position-relative d-flex flex-column justify-content-center align-items-center h-100">
            <h3 class="display-3 text-white mb-4">Nos Agences</h3>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Accueil</a></li>
                <li class="breadcrumb-item active text-white">Nos Agences</li>
            </ol>
        </div>
    </div>

    <!-- Section : Filtres -->
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
            <div class="w-full md:w-auto">
                <select class="w-full md:w-auto bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Toutes les régions</option>
                    <option value="douala">Littoral</option>
                    <option value="yaounde">Centre</option>
                    <option value="bafoussam">Ouest</option>
                    <option value="garoua">Nord</option>
                </select>
            </div>
            <div class="w-full md:w-auto">
                <input type="text" placeholder="Rechercher une ville..." class="w-full md:w-auto bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <!-- Liste des agences -->
        <div id="agences-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <!-- Les agences seront injectées ici via JavaScript -->
        </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center space-x-2 my-8">
            <button id="prev-page" class="px-4 py-2 border border-gray-300 rounded-md bg-white text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                Précédent
            </button>
            <div id="pagination-numbers" class="flex space-x-2">
                <!-- Les numéros de page seront injectés ici -->
            </div>
            <button id="next-page" class="px-4 py-2 border border-gray-300 rounded-md bg-white text-gray-700 hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                Suivant
            </button>
        </div>
    </div>

    <!-- Carte Google Maps -->
    <div class="container-fluid">
        <div class="rounded overflow-hidden">
            <iframe class="rounded w-100" 
                style="height: 450px;" 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.5123456789!2d9.7085!3d4.0511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10610d123456789%3A0xabcdef123456789!2sDouala%2C%20Cameroun!5e0!3m2!1sfr!2sfr!4v1694259649153!5m2!1sfr!2sfr" 
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <!-- Footer -->
    @include('includes.footer')

    @include('includes.script')

    <script>
        // Données des agences (simulées pour la démonstration)
        const agences = Array.from({ length: 30 }, (_, i) => ({
            id: i + 1,
            nom: `Agence ${i + 1}`,
            adresse: `${Math.floor(Math.random() * 100)} Rue de la ${['Paix', 'Liberté', 'République', 'Nation', 'Victoire'][Math.floor(Math.random() * 5)]}`,
            codePostal: `${Math.floor(Math.random() * 90000) + 10000}`,
            ville: ['Douala', 'Yaoundé', 'Bafoussam', 'Garoua', 'Kribi'][Math.floor(Math.random() * 5)],
            telephone: `0${Math.floor(Math.random() * 9) + 1} ${Math.floor(Math.random() * 90) + 10} ${Math.floor(Math.random() * 90) + 10} ${Math.floor(Math.random() * 90) + 10} ${Math.floor(Math.random() * 90) + 10}`,
            email: `contact.agence${i + 1}@travelcam.com`,
            horaires: 'Lun-Ven: 9h-18h / Sam: 9h-12h',
            image: `https://via.placeholder.com/500x300?text=Agence+${i + 1}`
        }));

        // Configuration de la pagination
        const itemsPerPage = 9;
        let currentPage = 1;
        const totalPages = Math.ceil(agences.length / itemsPerPage);

        // Fonction pour afficher les agences de la page courante
        function displayAgences(page) {
            const container = document.getElementById('agences-container');
            container.innerHTML = '';
            
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = Math.min(startIndex + itemsPerPage, agences.length);
            
            for (let i = startIndex; i < endIndex; i++) {
                const agence = agences[i];
                const agenceCard = document.createElement('div');
                agenceCard.className = 'bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300';
                agenceCard.innerHTML = `
                    <img src="${agence.image}" alt="${agence.nom}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">${agence.nom}</h3>
                        <p class="text-gray-600 mb-2">${agence.adresse}</p>
                        <p class="text-gray-600 mb-2">${agence.codePostal} ${agence.ville}</p>
                        <div class="flex items-center text-gray-600 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>${agence.telephone}</span>
                        </div>
                        <div class="flex items-center text-gray-600 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>${agence.email}</span>
                        </div>
                        <hr class="my-3 border-gray-200">
                        <p class="text-gray-700 text-sm">${agence.horaires}</p>
                        <a href="#" class="block mt-4 bg-blue-600 text-white font-medium py-2 px-4 rounded-md text-center hover:bg-blue-700 transition-colors duration-300">
                            Prendre rendez-vous
                        </a>
                    </div>
                `;
                container.appendChild(agenceCard);
            }
        }

        // Fonction pour mettre à jour la pagination
        function updatePagination() {
            const paginationContainer = document.getElementById('pagination-numbers');
            paginationContainer.innerHTML = '';
            
            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.className = i === currentPage
                    ? 'px-4 py-2 bg-blue-600 text-white rounded-md'
                    : 'px-4 py-2 border border-gray-300 bg-white text-gray-700 rounded-md hover:bg-gray-50';
                button.addEventListener('click', () => {
                    currentPage = i;
                    displayAgences(currentPage);
                    updatePagination();
                });
                paginationContainer.appendChild(button);
            }

            document.getElementById('prev-page').disabled = currentPage === 1;
            document.getElementById('next-page').disabled = currentPage === totalPages;
        }

        // Initialisation
        document.addEventListener('DOMContentLoaded', () => {
            displayAgences(currentPage);
            updatePagination();

            document.getElementById('prev-page').addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    displayAgences(currentPage);
                    updatePagination();
                }
            });

            document.getElementById('next-page').addEventListener('click', () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    displayAgences(currentPage);
                    updatePagination();
                }
            });
        });
    </script>
</body>

</html>