<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/page/agence.blade.php -->
<!DOCTYPE html>
<html lang="fr">

@include('includes.header')

<style>
    .banner-agence {
    background: url('../images/agence2.jpg') no-repeat center center;
    background-size: cover;
    height: 500px;
    position: relative;
}

.banner-overlay {
    background: rgba(0, 0, 0, 0.5);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>

<body class="bg-light">
    <!-- Navbar -->
    @include('includes.navbar')

    <!-- Bannière Nos Agences -->
    <div class="container-fluid position-relative banner-agence" >
    <!-- Superposition sombre -->
    <div class="banner-overlay" style="background: rgba(0, 0, 0, 0.5);"></div>
    
    <!-- Contenu centré -->
    <div class="text-center text-white position-relative d-flex flex-column justify-content-center align-items-center h-100">
        <h3 class="display-3 text-white mb-4"> Nos agence </h3>
        
    </div>
</div>
    <!-- Section : Filtres -->
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <select class="form-select">
                    <option value="">Toutes les régions</option>
                    <option value="douala">Littoral</option>
                    <option value="yaounde">Centre</option>
                    <option value="bafoussam">Ouest</option>
                    <option value="garoua">Nord</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <input type="text" class="form-control" placeholder="Rechercher une ville...">
            </div>
        </div>

        <!-- Liste des agences -->
        <div id="agences-container" class="row g-4">
            <!-- Les agences seront injectées ici via JavaScript -->
        </div>

        <!-- Pagination -->
        <nav class="mt-4">
            <ul class="pagination justify-content-center" id="pagination-numbers">
                <!-- Les numéros de page seront injectés ici -->
            </ul>
        </nav>
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
                agenceCard.className = 'col-md-4';
                agenceCard.innerHTML = `
                    <div class="card h-100 shadow-sm">
                        <img src="${agence.image}" class="card-img-top" alt="${agence.nom}">
                        <div class="card-body">
                            <h5 class="card-title">${agence.nom}</h5>
                            <p class="card-text">${agence.adresse}, ${agence.codePostal} ${agence.ville}</p>
                            <p class="card-text"><strong>Téléphone :</strong> ${agence.telephone}</p>
                            <p class="card-text"><strong>Email :</strong> ${agence.email}</p>
                            <p class="card-text"><strong>Horaires :</strong> ${agence.horaires}</p>
                            <a href="#" class="btn btn-primary w-100">reservez maintenant</a>
                        </div>
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
                const li = document.createElement('li');
                li.className = `page-item ${i === currentPage ? 'active' : ''}`;
                li.innerHTML = `<button class="page-link">${i}</button>`;
                li.addEventListener('click', () => {
                    currentPage = i;
                    displayAgences(currentPage);
                    updatePagination();
                });
                paginationContainer.appendChild(li);
            }
        }

        // Initialisation
        document.addEventListener('DOMContentLoaded', () => {
            displayAgences(currentPage);
            updatePagination();
        });
    </script>
</body>

</html>