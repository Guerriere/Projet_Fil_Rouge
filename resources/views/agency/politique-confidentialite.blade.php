<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politique de Confidentialité et Conditions de Partenariat</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-primary-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-primary-50 to-white">
        <div class="max-w-4xl mx-auto">
            <!-- Logo et en-tête -->
            <div class="text-center mb-8">
                <div class="inline-block p-4 bg-white rounded-full shadow-md">
                    <i class="fas fa-leaf text-5xl text-primary-600"></i>
                </div>
                <h1 class="mt-4 text-3xl font-extrabold text-primary-800">
                    <a href="index.html" class="text-2xl font-bold text-primary">
                        <span class="text-primary">Travel</span><span class="text-accent">Cam</span>
                    </a>
                </h1>
                <p class="text-primary-600">Confidentialité et protection de vos données</p>
            </div>
            
            <!-- Contenu principal -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden backdrop-blur-lg border border-primary-100">
                <!-- Bannière supérieure -->
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-6 relative">
                    <div class="absolute inset-0 opacity-20">
                        <div class="grid grid-cols-8 h-full">
                            <div class="border-r border-white/10"></div>
                            <div class="border-r border-white/10"></div>
                            <div class="border-r border-white/10"></div>
                            <div class="border-r border-white/10"></div>
                            <div class="border-r border-white/10"></div>
                            <div class="border-r border-white/10"></div>
                            <div class="border-r border-white/10"></div>
                        </div>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-bold text-white relative z-10 flex items-center">
                        <i class="fas fa-shield-alt mr-3"></i> Politique de Confidentialité et Conditions de Partenariat
                    </h1>
                    <p class="text-primary-100 mt-2 relative z-10">Protection de vos données et transparence dans nos relations</p>
                </div>
                
                <!-- Contenu -->
                <div class="p-6 md:p-8 space-y-8 bg-white relative">
                
                    <!-- Section Politique de Confidentialité -->
                    <section class="space-y-6 relative z-10">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center mr-3">
                                <i class="fas fa-user-shield text-primary-600"></i>
                            </div>
                            <h2 class="text-2xl font-semibold text-primary-800 border-b-2 border-primary-300 pb-2 flex-grow">Politique de Confidentialité</h2>
                        </div>
                        
                        <div class="space-y-6 text-gray-700 pl-4 border-l-2 border-primary-200">
                            <div class="bg-primary-50 p-4 rounded-lg">
                                <p class="flex items-center font-medium">
                                    <i class="fas fa-calendar-alt text-primary-600 mr-2"></i>
                                    Dernière mise à jour : <span id="current-date" class="ml-2 text-primary-700 font-semibold"></span>
                                </p>
                            </div>
                            
                            <div class="bg-white p-5 rounded-lg shadow-sm border border-primary-100">
                                <h3 class="text-lg font-medium text-primary-700 flex items-center mb-3">
                                    <div class="bg-primary-100 h-7 w-7 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-primary-700 font-bold">1</span>
                                    </div>
                                    Introduction
                                </h3>
                                <p class="ml-9">
                                    Bienvenue sur notre plateforme de réservation. La protection de vos données est notre priorité. 
                                    Cette politique de confidentialité décrit comment nous collectons, utilisons et protégeons vos informations.
                                </p>
                            </div>
                            
                            <div class="bg-white p-5 rounded-lg shadow-sm border border-primary-100">
                                <h3 class="text-lg font-medium text-primary-700 flex items-center mb-3">
                                    <div class="bg-primary-100 h-7 w-7 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-primary-700 font-bold">2</span>
                                    </div>
                                    Collecte des Données
                                </h3>
                                <div class="ml-9">
                                    <p class="mb-2">
                                        Nous collectons les informations suivantes :
                                    </p>
                                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                        <li class="flex items-start bg-primary-50 p-3 rounded-md">
                                            <i class="fas fa-id-card text-primary-600 mt-1 mr-2"></i>
                                            <span>Informations d'identification (nom, prénom, adresse email)</span>
                                        </li>
                                        <li class="flex items-start bg-primary-50 p-3 rounded-md">
                                            <i class="fas fa-calendar-check text-primary-600 mt-1 mr-2"></i>
                                            <span>Informations de réservation (date, service réservé, montant)</span>
                                        </li>
                                        <li class="flex items-start bg-primary-50 p-3 rounded-md">
                                            <i class="fas fa-credit-card text-primary-600 mt-1 mr-2"></i>
                                            <span>Informations de paiement (traitées par nos prestataires sécurisés)</span>
                                        </li>
                                        <li class="flex items-start bg-primary-50 p-3 rounded-md">
                                            <i class="fas fa-chart-line text-primary-600 mt-1 mr-2"></i>
                                            <span>Données d'utilisation du site</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="bg-white p-5 rounded-lg shadow-sm border border-primary-100">
                                <h3 class="text-lg font-medium text-primary-700 flex items-center mb-3">
                                    <div class="bg-primary-100 h-7 w-7 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-primary-700 font-bold">3</span>
                                    </div>
                                    Utilisation des Données
                                </h3>
                                <div class="ml-9">
                                    <p class="mb-2">
                                        Nous utilisons vos données pour :
                                    </p>
                                    <ul class="space-y-2">
                                        <li class="flex items-center">
                                            <div class="h-6 w-6 rounded-full bg-primary-200 flex items-center justify-center mr-2">
                                                <i class="fas fa-check text-primary-700 text-sm"></i>
                                            </div>
                                            <span>Traiter vos réservations</span>
                                        </li>
                                        <li class="flex items-center">
                                            <div class="h-6 w-6 rounded-full bg-primary-200 flex items-center justify-center mr-2">
                                                <i class="fas fa-check text-primary-700 text-sm"></i>
                                            </div>
                                            <span>Vous communiquer des informations sur votre réservation</span>
                                        </li>
                                        <li class="flex items-center">
                                            <div class="h-6 w-6 rounded-full bg-primary-200 flex items-center justify-center mr-2">
                                                <i class="fas fa-check text-primary-700 text-sm"></i>
                                            </div>
                                            <span>Améliorer nos services</span>
                                        </li>
                                        <li class="flex items-center">
                                            <div class="h-6 w-6 rounded-full bg-primary-200 flex items-center justify-center mr-2">
                                                <i class="fas fa-check text-primary-700 text-sm"></i>
                                            </div>
                                            <span>Respecter nos obligations légales</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="bg-white p-5 rounded-lg shadow-sm border border-primary-100">
                                <h3 class="text-lg font-medium text-primary-700 flex items-center mb-3">
                                    <div class="bg-primary-100 h-7 w-7 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-primary-700 font-bold">4</span>
                                    </div>
                                    Partage des Données
                                </h3>
                                <div class="ml-9">
                                    <p class="mb-2">
                                        Nous partageons vos données uniquement avec :
                                    </p>
                                    <ul class="space-y-2">
                                        <li class="flex items-start p-2 hover:bg-primary-50 rounded-md transition">
                                            <i class="fas fa-building text-primary-600 mt-1 mr-3"></i>
                                            <span>Les agences partenaires concernées par votre réservation</span>
                                        </li>
                                        <li class="flex items-start p-2 hover:bg-primary-50 rounded-md transition">
                                            <i class="fas fa-server text-primary-600 mt-1 mr-3"></i>
                                            <span>Nos prestataires techniques (hébergement, paiement)</span>
                                        </li>
                                        <li class="flex items-start p-2 hover:bg-primary-50 rounded-md transition">
                                            <i class="fas fa-balance-scale text-primary-600 mt-1 mr-3"></i>
                                            <span>Les autorités légales en cas d'obligation légale</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="bg-white p-5 rounded-lg shadow-sm border border-primary-100">
                                <h3 class="text-lg font-medium text-primary-700 flex items-center mb-3">
                                    <div class="bg-primary-100 h-7 w-7 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-primary-700 font-bold">5</span>
                                    </div>
                                    Protection des Données
                                </h3>
                                <p class="ml-9">
                                    <i class="fas fa-lock text-primary-600 mr-2"></i>
                                    Nous mettons en œuvre des mesures techniques et organisationnelles appropriées pour protéger vos données contre la perte, 
                                    l'accès non autorisé, la divulgation, l'altération et la destruction.
                                </p>
                            </div>
                            
                            <div class="bg-white p-5 rounded-lg shadow-sm border border-primary-100">
                                <h3 class="text-lg font-medium text-primary-700 flex items-center mb-3">
                                    <div class="bg-primary-100 h-7 w-7 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-primary-700 font-bold">6</span>
                                    </div>
                                    Vos Droits
                                </h3>
                                <div class="ml-9">
                                    <p class="mb-3">
                                        Conformément aux réglementations en vigueur, vous disposez des droits suivants :
                                    </p>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <div class="bg-primary-50 p-3 rounded-md flex">
                                            <i class="fas fa-eye text-primary-600 mt-1 mr-2"></i>
                                            <span>Droit d'accès à vos données</span>
                                        </div>
                                        <div class="bg-primary-50 p-3 rounded-md flex">
                                            <i class="fas fa-edit text-primary-600 mt-1 mr-2"></i>
                                            <span>Droit de rectification</span>
                                        </div>
                                        <div class="bg-primary-50 p-3 rounded-md flex">
                                            <i class="fas fa-trash-alt text-primary-600 mt-1 mr-2"></i>
                                            <span>Droit à l'effacement</span>
                                        </div>
                                        <div class="bg-primary-50 p-3 rounded-md flex">
                                            <i class="fas fa-ban text-primary-600 mt-1 mr-2"></i>
                                            <span>Droit à la limitation du traitement</span>
                                        </div>
                                        <div class="bg-primary-50 p-3 rounded-md flex">
                                            <i class="fas fa-exchange-alt text-primary-600 mt-1 mr-2"></i>
                                            <span>Droit à la portabilité</span>
                                        </div>
                                        <div class="bg-primary-50 p-3 rounded-md flex">
                                            <i class="fas fa-hand-paper text-primary-600 mt-1 mr-2"></i>
                                            <span>Droit d'opposition</span>
                                        </div>
                                    </div>
                                    <div class="mt-4 p-3 bg-primary-100 rounded-md flex items-center">
                                        <i class="fas fa-envelope text-primary-700 mr-2"></i>
                                        <span>Pour exercer ces droits, contactez-nous à l'adresse : <a href="mailto:contact@notreplateforme.com" class="font-bold hover:underline">contact@notreplateforme.com</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <!-- Section Conditions de Partenariat -->
                    <section class="space-y-6 relative z-10 mt-12 pt-8 border-t-2 border-primary-200">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center mr-3">
                                <i class="fas fa-handshake text-primary-600"></i>
                            </div>
                            <h2 class="text-2xl font-semibold text-primary-800 border-b-2 border-primary-300 pb-2 flex-grow">Conditions de Partenariat</h2>
                        </div>
                        
                        <div class="space-y-6 text-gray-700 pl-4 border-l-2 border-primary-200">
                            <div class="bg-white p-5 rounded-lg shadow-sm border border-primary-100">
                                <h3 class="text-lg font-medium text-primary-700 flex items-center mb-3">
                                    <div class="bg-primary-100 h-7 w-7 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-primary-700 font-bold">1</span>
                                    </div>
                                    Objet du Partenariat
                                </h3>
                                <p class="ml-9">
                                    Le présent accord définit les conditions dans lesquelles les agences peuvent proposer leurs services 
                                    de réservation sur notre plateforme. En devenant partenaire, l'agence accepte l'intégralité des présentes conditions.
                                </p>
                            </div>
                            
                            <div class="bg-primary-700 p-5 rounded-lg shadow-md">
                                <h3 class="text-lg font-medium text-white flex items-center mb-3">
                                    <div class="bg-white h-7 w-7 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-primary-700 font-bold">2</span>
                                    </div>
                                    Commission sur les Réservations
                                </h3>
                                <p class="ml-9 text-white font-semibold">
                                    <i class="fas fa-percentage text-primary-200 mr-2"></i>
                                    Pour chaque réservation effectuée via notre plateforme, une commission de 3% du montant total de la réservation 
                                    sera prélevée. Cette commission rémunère notre service d'intermédiation et de mise en relation avec le client.
                                </p>
                            </div>
                            
                            <div class="bg-white p-5 rounded-lg shadow-sm border border-primary-100">
                                <h3 class="text-lg font-medium text-primary-700 flex items-center mb-3">
                                    <div class="bg-primary-100 h-7 w-7 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-primary-700 font-bold">3</span>
                                    </div>
                                    Modalités de Paiement
                                </h3>
                                <p class="ml-9">
                                    Les commissions seront calculées mensuellement. Un relevé détaillé sera fourni à l'agence partenaire en début de mois 
                                    pour les réservations du mois précédent. Le paiement des commissions sera prélevé automatiquement sur les versements 
                                    effectués à l'agence.
                                </p>
                            </div>
                            
                            <div class="bg-white p-5 rounded-lg shadow-sm border border-primary-100">
                                <h3 class="text-lg font-medium text-primary-700 flex items-center mb-3">
                                    <div class="bg-primary-100 h-7 w-7 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-primary-700 font-bold">4</span>
                                    </div>
                                    Obligations de l'Agence Partenaire
                                </h3>
                                <div class="ml-9">
                                    <p class="mb-3">
                                        L'agence partenaire s'engage à :
                                    </p>
                                    <div class="space-y-3">
                                        <div class="p-3 bg-primary-50 rounded-md flex items-start">
                                            <div class="bg-primary-200 h-6 w-6 rounded-full flex items-center justify-center mr-3 mt-1">
                                                <i class="fas fa-check text-primary-700"></i>
                                            </div>
                                            <div>Fournir des informations exactes et à jour sur ses services</div>
                                        </div>
                                        <div class="p-3 bg-primary-50 rounded-md flex items-start">
                                            <div class="bg-primary-200 h-6 w-6 rounded-full flex items-center justify-center mr-3 mt-1">
                                                <i class="fas fa-check text-primary-700"></i>
                                            </div>
                                            <div>Respecter les réservations effectuées via notre plateforme</div>
                                        </div>
                                        <div class="p-3 bg-primary-50 rounded-md flex items-start">
                                            <div class="bg-primary-200 h-6 w-6 rounded-full flex items-center justify-center mr-3 mt-1">
                                                <i class="fas fa-check text-primary-700"></i>
                                            </div>
                                            <div>Maintenir un niveau de qualité conforme aux standards du marché</div>
                                        </div>
                                        <div class="p-3 bg-primary-50 rounded-md flex items-start">
                                            <div class="bg-primary-200 h-6 w-6 rounded-full flex items-center justify-center mr-3 mt-1">
                                                <i class="fas fa-check text-primary-700"></i>
                                            </div>
                                            <div>Traiter les données des clients conformément aux lois en vigueur</div>
                                        </div>
                                        <div class="p-3 bg-primary-50 rounded-md flex items-start">
                                            <div class="bg-primary-200 h-6 w-6 rounded-full flex items-center justify-center mr-3 mt-1">
                                                <i class="fas fa-check text-primary-700"></i>
                                            </div>
                                            <div>Informer immédiatement en cas d'impossibilité d'honorer une réservation</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-white p-5 rounded-lg shadow-sm border border-primary-100">
                                <h3 class="text-lg font-medium text-primary-700 flex items-center mb-3">
                                    <div class="bg-primary-100 h-7 w-7 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-primary-700 font-bold">5</span>
                                    </div>
                                    Durée et Résiliation
                                </h3>
                                <p class="ml-9">
                                    Le partenariat est conclu pour une durée indéterminée. Chaque partie peut y mettre fin moyennant un préavis 
                                    de 30 jours par notification écrite. En cas de manquement grave, le partenariat pourra être résilié immédiatement.
                                </p>
                            </div>
                            
                            <div class="bg-white p-5 rounded-lg shadow-sm border border-primary-100">
                                <h3 class="text-lg font-medium text-primary-700 flex items-center mb-3">
                                    <div class="bg-primary-100 h-7 w-7 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-primary-700 font-bold">6</span>
                                    </div>
                                    Confidentialité
                                </h3>
                                <p class="ml-9">
                                    <i class="fas fa-user-secret text-primary-600 mr-2"></i>
                                    Chaque partie s'engage à maintenir confidentielles les informations commerciales, financières et techniques 
                                    échangées dans le cadre du partenariat.
                                </p>
                            </div>
                            
                            <div class="bg-white p-5 rounded-lg shadow-sm border border-primary-100">
                                <h3 class="text-lg font-medium text-primary-700 flex items-center mb-3">
                                    <div class="bg-primary-100 h-7 w-7 rounded-full flex items-center justify-center mr-2">
                                        <span class="text-primary-700 font-bold">7</span>
                                    </div>
                                    Litiges
                                </h3>
                                <p class="ml-9">
                                    <i class="fas fa-gavel text-primary-600 mr-2"></i>
                                    En cas de litige, les parties s'efforceront de trouver une solution amiable. À défaut, le litige sera porté 
                                    devant les tribunaux compétents.
                                </p>
                            </div>
                        </div>
                    </section>
                    
                    <!-- Pied de page -->
                    <div class="border-t-2 border-primary-200 pt-8 mt-8 text-center">
                        <p class="text-gray-600 text-sm mb-4">
                            <i class="fas fa-info-circle text-primary-600 mr-2"></i>
                            En utilisant notre plateforme ou en devenant partenaire, vous acceptez les termes de cette politique.
                        </p>
                        <div class="flex flex-col sm:flex-row justify-center gap-4">
                            <a href="{{ route('agency.register') }}" class="inline-flex items-center justify-center bg-primary-600 hover:bg-primary-700 text-white font-medium py-3 px-6 rounded-lg transition duration-150 ease-in-out shadow-md hover:shadow-lg group">
                                <span>retour </span>
                            </a>
                        
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bloc d'informations complémentaires -->
            <div class="mt-12 text-center">
                <p class="text-primary-700">
                    <i class="fas fa-shield-alt"></i> Vos données sont protégées et sécurisées
                </p>
                <div class="flex justify-center mt-4 space-x-6">
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-lock text-primary-600 mr-2"></i>
                        <span>SSL Sécurisé</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-clipboard-check text-primary-600 mr-2"></i>
                        <span>Conformité RGPD</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <i class="fas fa-headset text-primary-600 mr-2"></i>
                        <span>Support 24/7</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fonction pour obtenir la date actuelle au format français
        document.addEventListener('DOMContentLoaded', function() {
            const dateElement = document.getElementById('current-date');
            const today = new Date();
            const day = String(today.getDate()).padStart(2, '0');
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const year = today.getFullYear();
            dateElement.textContent = day + '/' + month + '/' + year;
        });
    </script>
</body>
</html>