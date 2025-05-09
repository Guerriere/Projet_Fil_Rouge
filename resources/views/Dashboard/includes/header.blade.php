<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin5">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                <b class="logo-icon">
                    <i class="mdi mdi-airplane text-white"></i>
                </b>
                <span class="logo-text text-white">
                    TravelCam Admin
                </span>
            </a>
            
            <!-- Toggle Menu -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="mdi mdi-menu"></i>
            </a>
        </div>
        
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- Left side navbar -->
            <ul class="navbar-nav float-start me-auto">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                        <i class="mdi mdi-menu font-24"></i>
                    </a>
                </li>
                
                <!-- Search -->
                <li class="nav-item search-box">
                    <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                        <i class="mdi mdi-magnify font-24"></i>
                    </a>
                    <form class="app-search position-absolute">
                        <input type="text" class="form-control" placeholder="Rechercher...">
                        <a class="srh-btn"><i class="mdi mdi-close"></i></a>
                    </form>
                </li>
            </ul>
            
            <!-- Right side navbar -->
            <ul class="navbar-nav float-end">
                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-bell font-24"></i>
                        <span class="badge bg-danger rounded-pill">3</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown" aria-labelledby="navbarDropdown">
                        <li>
                            <div class="drop-title">Notifications</div>
                        </li>
                        <li>
                            <div class="message-center notifications">
                                <!-- Notification 1 -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="btn btn-danger btn-circle">
                                        <i class="fa fa-link"></i>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Nouvelle réservation</h5>
                                        <span class="mail-desc">Réservation #1234 en attente</span>
                                        <span class="time">Il y a 9:30</span>
                                    </div>
                                </a>
                                <!-- Notification 2 -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="btn btn-success btn-circle">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Nouveau voyage</h5>
                                        <span class="mail-desc">Voyage ajouté par Agence XYZ</span>
                                        <span class="time">Il y a 1 heure</span>
                                    </div>
                                </a>
                                <!-- Notification 3 -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="btn btn-info btn-circle">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Nouvel utilisateur</h5>
                                        <span class="mail-desc">Jean Dupont vient de s'inscrire</span>
                                        <span class="time">Il y a 3 heures</span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link text-center mb-1 text-dark" href="javascript:void(0);">
                                <strong>Voir toutes les notifications</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- Messages -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="messagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-email font-24"></i>
                        <span class="badge bg-warning rounded-pill">2</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown" aria-labelledby="messagesDropdown">
                        <li>
                            <div class="drop-title">Messages</div>
                        </li>
                        <li>
                            <div class="message-center messages">
                                <!-- Message 1 -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="user-img">
                                        <img src="https://via.placeholder.com/40" alt="user" class="rounded-circle" width="40">
                                        <span class="profile-status online pull-right"></span>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Marie Dupont</h5>
                                        <span class="mail-desc">Bonjour, j'ai une question concernant ma réservation...</span>
                                        <span class="time">Il y a 9:30</span>
                                    </div>
                                </a>
                                <!-- Message 2 -->
                                <a href="javascript:void(0)" class="message-item">
                                    <span class="user-img">
                                        <img src="https://via.placeholder.com/40" alt="user" class="rounded-circle" width="40">
                                        <span class="profile-status busy pull-right"></span>
                                    </span>
                                    <div class="mail-contnet">
                                        <h5 class="message-title">Pierre Martin</h5>
                                        <span class="mail-desc">Pouvez-vous me confirmer l'heure de départ ?</span>
                                        <span class="time">Il y a 1 heure</span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link text-center mb-1 text-dark" href="javascript:void(0);">
                                <strong>Voir tous les messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- User profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(Auth::check() && Auth::user()->profile_photo_path)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="user" class="rounded-circle" width="31">
                        @else
                            <img src="https://via.placeholder.com/31" alt="user" class="rounded-circle" width="31">
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dd animated flipInY" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="mdi mdi-account me-2 text-primary"></i> Mon profil
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.settings') }}">
                            <i class="mdi mdi-settings me-2 text-primary"></i> Paramètres
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-power me-2 text-danger"></i> Déconnexion
                        </a>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>