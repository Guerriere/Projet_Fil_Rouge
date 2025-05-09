<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @if (Auth::check())
                    <!-- Menu pour l'administrateur -->
                    @if (Auth::user()->role === 'admin')
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.dashboard') }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Tableau de bord</span>
                            </a>
                        </li>
                        
                        <!-- Gestion des utilisateurs -->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-account-multiple"></i>
                                <span class="hide-menu">Utilisateurs</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.users.create') }}" class="sidebar-link">
                                        <i class="mdi mdi-plus-circle"></i>
                                        <span class="hide-menu">Ajouter</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.users.list') }}" class="sidebar-link">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                        <span class="hide-menu">Liste</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <!-- Gestion des partenaires -->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-account-tie"></i>
                                <span class="hide-menu">Partenaires</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.partners.create') }}" class="sidebar-link">
                                        <i class="mdi mdi-plus-circle"></i>
                                        <span class="hide-menu">Ajouter</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.partners.list') }}" class="sidebar-link">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                        <span class="hide-menu">Liste</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <!-- Gestion des voyages -->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-route"></i>
                                <span class="hide-menu">Voyages</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.voyages.create') }}" class="sidebar-link">
                                        <i class="mdi mdi-plus-circle"></i>
                                        <span class="hide-menu">Ajouter</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.voyages.list') }}" class="sidebar-link">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                        <span class="hide-menu">Liste</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <!-- Gestion des réservations -->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-ticket-confirmation"></i>
                                <span class="hide-menu">Réservations</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.reservations.list') }}" class="sidebar-link">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                        <span class="hide-menu">Liste</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <!-- Gestion des paiements -->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-cash-multiple"></i>
                                <span class="hide-menu">Paiements</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.payments.list') }}" class="sidebar-link">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                        <span class="hide-menu">Liste</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <!-- Gestion des destinations -->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-map-marker"></i>
                                <span class="hide-menu">Destinations</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.destinations.create') }}" class="sidebar-link">
                                        <i class="mdi mdi-plus-circle"></i>
                                        <span class="hide-menu">Ajouter</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.destinations.list') }}" class="sidebar-link">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                        <span class="hide-menu">Liste</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <!-- Rapports et statistiques -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.reports') }}">
                                <i class="mdi mdi-chart-bar"></i>
                                <span class="hide-menu">Rapports</span>
                            </a>
                        </li>
                        
                        <!-- Paramètres -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('admin.settings') }}">
                                <i class="mdi mdi-cog"></i>
                                <span class="hide-menu">Paramètres</span>
                            </a>
                        </li>
                        
                        <!-- Déconnexion -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout"></i>
                                <span class="hide-menu">Déconnexion</span>
                            </a>
                        </li>
                    @endif

                    <!-- Menu pour le partenaire -->
                    @if (Auth::user()->role === 'partenaire')
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('partner.dashboard') }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Tableau de bord</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-luggage"></i>
                                <span class="hide-menu">Offres</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('partner.voyages.create') }}" class="sidebar-link">
                                        <i class="mdi mdi-plus-circle"></i>
                                        <span class="hide-menu">Ajouter</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('partner.voyages.list') }}" class="sidebar-link">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                        <span class="hide-menu">Liste</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-map-marker"></i>
                                <span class="hide-menu">Destinations</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('partner.destinations.create') }}" class="sidebar-link">
                                        <i class="mdi mdi-plus-circle"></i>
                                        <span class="hide-menu">Ajouter</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('partner.destinations.list') }}" class="sidebar-link">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                        <span class="hide-menu">Liste</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-account-multiple"></i>
                                <span class="hide-menu">Clients</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('partner.clients.list') }}" class="sidebar-link">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                        <span class="hide-menu">Liste</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-cash"></i>
                                <span class="hide-menu">Paiements</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('partner.payments.list') }}" class="sidebar-link">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                        <span class="hide-menu">Liste</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-comment"></i>
                                <span class="hide-menu">Avis</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('partner.reviews.list') }}" class="sidebar-link">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                        <span class="hide-menu">Liste</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('partner.agency.show') }}">
                                <i class="mdi mdi-office-building"></i>
                                <span class="hide-menu">Mon Agence</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout"></i>
                                <span class="hide-menu">Déconnexion</span>
                            </a>
                        </li>
                    @endif

                    <!-- Menu pour le client -->
                    @if (Auth::user()->role === 'client')
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('client.dashboard') }}">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Tableau de bord</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-calendar-check"></i>
                                <span class="hide-menu">Mes Réservations</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('client.reservations.list') }}" class="sidebar-link">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                        <span class="hide-menu">Liste</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-account"></i>
                                <span class="hide-menu">Profil</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('client.profile') }}" class="sidebar-link">
                                        <i class="mdi mdi-account-circle"></i>
                                        <span class="hide-menu">Mes Infos</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout"></i>
                                <span class="hide-menu">Déconnexion</span>
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
        </nav>
    </div>
</aside>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>