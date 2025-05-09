@extends('Dashboard.layouts.app')

@section('title', 'Paramètres du site')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Paramètres du site</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Paramètres</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Alertes -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- Menu de navigation des paramètres -->
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Catégories</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#general" class="list-group-item list-group-item-action active" data-bs-toggle="list">Général</a>
                    <a href="#email" class="list-group-item list-group-item-action" data-bs-toggle="list">Configuration email</a>
                    <a href="#payment" class="list-group-item list-group-item-action" data-bs-toggle="list">Paiements</a>
                    <a href="#security" class="list-group-item list-group-item-action" data-bs-toggle="list">Sécurité</a>
                    <a href="#backup" class="list-group-item list-group-item-action" data-bs-toggle="list">Sauvegardes</a>
                </div>
            </div>
        </div>

        <!-- Contenu des paramètres -->
        <div class="col-md-9">
            <div class="tab-content">
                <!-- Paramètres généraux -->
                <div class="tab-pane fade show active" id="general">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">Paramètres généraux</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.settings.update', ['section' => 'general']) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3">
                                    <label for="site_name" class="form-label">Nom du site</label>
                                    <input type="text" class="form-control" id="site_name" name="site_name" value="{{ $settings['site_name'] ?? 'TravelCam' }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="site_description" class="form-label">Description du site</label>
                                    <textarea class="form-control" id="site_description" name="site_description" rows="3">{{ $settings['site_description'] ?? 'Plateforme de réservation de voyages au Cameroun' }}</textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="contact_email" class="form-label">Email de contact</label>
                                    <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ $settings['contact_email'] ?? 'contact@travelcam.com' }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="contact_phone" class="form-label">Téléphone de contact</label>
                                    <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="{{ $settings['contact_phone'] ?? '+237 123 456 789' }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="address" class="form-label">Adresse</label>
                                    <textarea class="form-control" id="address" name="address" rows="2">{{ $settings['address'] ?? 'Yaoundé, Cameroun' }}</textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="logo" class="form-label">Logo du site</label>
                                    <input type="file" class="form-control" id="logo" name="logo">
                                    @if(isset($settings['logo']))
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo" height="50">
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="mb-3">
                                    <label for="favicon" class="form-label">Favicon</label>
                                    <input type="file" class="form-control" id="favicon" name="favicon">
                                    @if(isset($settings['favicon']))
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $settings['favicon']) }}" alt="Favicon" height="32">
                                        </div>
                                    @endif
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Configuration email -->
                <div class="tab-pane fade" id="email">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">Configuration des emails</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.settings.update', ['section' => 'email']) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3">
                                    <label for="mail_driver" class="form-label">Driver</label>
                                    <select class="form-select" id="mail_driver" name="mail_driver">
                                        <option value="smtp" {{ ($settings['mail_driver'] ?? '') == 'smtp' ? 'selected' : '' }}>SMTP</option>
                                        <option value="sendmail" {{ ($settings['mail_driver'] ?? '') == 'sendmail' ? 'selected' : '' }}>Sendmail</option>
                                        <option value="mailgun" {{ ($settings['mail_driver'] ?? '') == 'mailgun' ? 'selected' : '' }}>Mailgun</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="mail_host" class="form-label">Hôte SMTP</label>
                                    <input type="text" class="form-control" id="mail_host" name="mail_host" value="{{ $settings['mail_host'] ?? 'smtp.example.com' }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="mail_port" class="form-label">Port SMTP</label>
                                    <input type="text" class="form-control" id="mail_port" name="mail_port" value="{{ $settings['mail_port'] ?? '587' }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="mail_username" class="form-label">Nom d'utilisateur</label>
                                    <input type="text" class="form-control" id="mail_username" name="mail_username" value="{{ $settings['mail_username'] ?? '' }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="mail_password" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="mail_password" name="mail_password" value="{{ $settings['mail_password'] ?? '' }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="mail_encryption" class="form-label">Chiffrement</label>
                                    <select class="form-select" id="mail_encryption" name="mail_encryption">
                                        <option value="tls" {{ ($settings['mail_encryption'] ?? '') == 'tls' ? 'selected' : '' }}>TLS</option>
                                        <option value="ssl" {{ ($settings['mail_encryption'] ?? '') == 'ssl' ? 'selected' : '' }}>SSL</option>
                                        <option value="none" {{ ($settings['mail_encryption'] ?? '') == 'none' ? 'selected' : '' }}>Aucun</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="mail_from_address" class="form-label">Adresse d'expédition</label>
                                    <input type="email" class="form-control" id="mail_from_address" name="mail_from_address" value="{{ $settings['mail_from_address'] ?? 'noreply@travelcam.com' }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="mail_from_name" class="form-label">Nom d'expédition</label>
                                    <input type="text" class="form-control" id="mail_from_name" name="mail_from_name" value="{{ $settings['mail_from_name'] ?? 'TravelCam' }}">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                <button type="button" class="btn btn-outline-secondary" id="testEmail">Tester la configuration</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Configuration des paiements -->
                <div class="tab-pane fade" id="payment">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">Configuration des paiements</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.settings.update', ['section' => 'payment']) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3">
                                    <label class="form-label">Méthodes de paiement actives</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="payment_cash" name="payment_methods[]" value="cash" {{ in_array('cash', $settings['payment_methods'] ?? []) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="payment_cash">Paiement à l'agence</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="payment_mobile_money" name="payment_methods[]" value="mobile_money" {{ in_array('mobile_money', $settings['payment_methods'] ?? []) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="payment_mobile_money">Mobile Money</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="payment_card" name="payment_methods[]" value="card" {{ in_array('card', $settings['payment_methods'] ?? []) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="payment_card">Carte bancaire</label>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="currency" class="form-label">Devise</label>
                                    <select class="form-select" id="currency" name="currency">
                                        <option value="XAF" {{ ($settings['currency'] ?? '') == 'XAF' ? 'selected' : '' }}>FCFA (XAF)</option>
                                        <option value="EUR" {{ ($settings['currency'] ?? '') == 'EUR' ? 'selected' : '' }}>Euro (EUR)</option>
                                        <option value="USD" {{ ($settings['currency'] ?? '') == 'USD' ? 'selected' : '' }}>Dollar US (USD)</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="commission_rate" class="form-label">Taux de commission (%)</label>
                                    <input type="number" class="form-control" id="commission_rate" name="commission_rate" min="0" max="100" step="0.01" value="{{ $settings['commission_rate'] ?? '5' }}">
                                    <div class="form-text">Pourcentage prélevé sur chaque réservation.</div>
                                </div>
                                
                                <h5 class="mt-4 mb-3">Configuration Mobile Money</h5>
                                
                                <div class="mb-3">
                                    <label for="momo_api_key" class="form-label">Clé API</label>
                                    <input type="text" class="form-control" id="momo_api_key" name="momo_api_key" value="{{ $settings['momo_api_key'] ?? '' }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="momo_secret_key" class="form-label">Clé secrète</label>
                                    <input type="password" class="form-control" id="momo_secret_key" name="momo_secret_key" value="{{ $settings['momo_secret_key'] ?? '' }}">
                                </div>
                                
                                <h5 class="mt-4 mb-3">Configuration Carte bancaire</h5>
                                
                                <div class="mb-3">
                                    <label for="stripe_public_key" class="form-label">Clé publique Stripe</label>
                                    <input type="text" class="form-control" id="stripe_public_key" name="stripe_public_key" value="{{ $settings['stripe_public_key'] ?? '' }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="stripe_secret_key" class="form-label">Clé secrète Stripe</label>
                                    <input type="password" class="form-control" id="stripe_secret_key" name="stripe_secret_key" value="{{ $settings['stripe_secret_key'] ?? '' }}">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Paramètres de sécurité -->
                <div class="tab-pane fade" id="security">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">Paramètres de sécurité</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.settings.update', ['section' => 'security']) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3">
                                    <label for="session_lifetime" class="form-label">Durée de session (minutes)</label>
                                    <input type="number" class="form-control" id="session_lifetime" name="session_lifetime" min="1" value="{{ $settings['session_lifetime'] ?? '120' }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password_expiry" class="form-label">Expiration des mots de passe (jours)</label>
                                    <input type="number" class="form-control" id="password_expiry" name="password_expiry" min="0" value="{{ $settings['password_expiry'] ?? '90' }}">
                                    <div class="form-text">0 = pas d'expiration</div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="max_login_attempts" class="form-label">Tentatives de connexion maximales</label>
                                    <input type="number" class="form-control" id="max_login_attempts" name="max_login_attempts" min="1" value="{{ $settings['max_login_attempts'] ?? '5' }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="lockout_time" class="form-label">Temps de verrouillage (minutes)</label>
                                    <input type="number" class="form-control" id="lockout_time" name="lockout_time" min="1" value="{{ $settings['lockout_time'] ?? '10' }}">
                                </div>
                                
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="enable_2fa" name="enable_2fa" {{ ($settings['enable_2fa'] ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="enable_2fa">Activer l'authentification à deux facteurs</label>
                                </div>
                                
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="force_ssl" name="force_ssl" {{ ($settings['force_ssl'] ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="force_ssl">Forcer l'utilisation de HTTPS</label>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Paramètres de sauvegarde -->
                <div class="tab-pane fade" id="backup">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h5 class="card-title mb-0">Sauvegardes</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.settings.update', ['section' => 'backup']) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-3">
                                    <label for="backup_frequency" class="form-label">Fréquence des sauvegardes</label>
                                    <select class="form-select" id="backup_frequency" name="backup_frequency">
                                        <option value="daily" {{ ($settings['backup_frequency'] ?? '') == 'daily' ? 'selected' : '' }}>Quotidienne</option>
                                        <option value="weekly" {{ ($settings['backup_frequency'] ?? '') == 'weekly' ? 'selected' : '' }}>Hebdomadaire</option>
                                        <option value="monthly" {{ ($settings['backup_frequency'] ?? '') == 'monthly' ? 'selected' : '' }}>Mensuelle</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="backup_retention" class="form-label">Durée de conservation (jours)</label>
                                    <input type="number" class="form-control" id="backup_retention" name="backup_retention" min="1" value="{{ $settings['backup_retention'] ?? '30' }}">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="backup_destination" class="form-label">Destination des sauvegardes</label>
                                    <select class="form-select" id="backup_destination" name="backup_destination">
                                        <option value="local" {{ ($settings['backup_destination'] ?? '') == 'local' ? 'selected' : '' }}>Stockage local</option>
                                        <option value="s3" {{ ($settings['backup_destination'] ?? '') == 's3' ? 'selected' : '' }}>Amazon S3</option>
                                        <option value="dropbox" {{ ($settings['backup_destination'] ?? '') == 'dropbox' ? 'selected' : '' }}>Dropbox</option>
                                    </select>
                                </div>
                                
                                <div id="s3_settings" class="mb-3 {{ ($settings['backup_destination'] ?? '') == 's3' ? '' : 'd-none' }}">
                                    <h6 class="mb-3">Paramètres Amazon S3</h6>
                                    <div class="mb-3">
                                        <label for="s3_key" class="form-label">Clé d'accès</label>
                                        <input type="text" class="form-control" id="s3_key" name="s3_key" value="{{ $settings['s3_key'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="s3_secret" class="form-label">Clé secrète</label>
                                        <input type="password" class="form-control" id="s3_secret" name="s3_secret" value="{{ $settings['s3_secret'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="s3_region" class="form-label">Région</label>
                                        <input type="text" class="form-control" id="s3_region" name="s3_region" value="{{ $settings['s3_region'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="s3_bucket" class="form-label">Bucket</label>
                                        <input type="text" class="form-control" id="s3_bucket" name="s3_bucket" value="{{ $settings['s3_bucket'] ?? '' }}">
                                    </div>
                                </div>
                                
                                <div id="dropbox_settings" class="mb-3 {{ ($settings['backup_destination'] ?? '') == 'dropbox' ? '' : 'd-none' }}">
                                    <h6 class="mb-3">Paramètres Dropbox</h6>
                                    <div class="mb-3">
                                        <label for="dropbox_token" class="form-label">Token d'accès</label>
                                        <input type="password" class="form-control" id="dropbox_token" name="dropbox_token" value="{{ $settings['dropbox_token'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dropbox_folder" class="form-label">Dossier</label>
                                        <input type="text" class="form-control" id="dropbox_folder" name="dropbox_folder" value="{{ $settings['dropbox_folder'] ?? 'backups' }}">
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                <button type="button" class="btn btn-success" id="runBackup">Lancer une sauvegarde maintenant</button>
                            </form>
                            
                            <hr>
                            
                            <h5 class="mt-4 mb-3">Sauvegardes disponibles</h5>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Taille</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($backups as $backup)
                                            <tr>
                                                <td>{{ $backup['name'] }}</td>
                                                <td>{{ $backup['size'] }}</td>
                                                <td>{{ $backup['date'] }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.backups.download', $backup['name']) }}" class="btn btn-sm btn-info">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBackupModal{{ $loop->index }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                    
                                                    <!-- Modal de suppression -->
                                                    <div class="modal fade" id="deleteBackupModal{{ $loop->index }}" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Confirmer la suppression</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Êtes-vous sûr de vouloir supprimer cette sauvegarde ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                    <form action="{{ route('admin.backups.destroy', $backup['name']) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Aucune sauvegarde disponible</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Afficher/masquer les paramètres de sauvegarde en fonction de la destination
    const backupDestination = document.getElementById('backup_destination');
    const s3Settings = document.getElementById('s3_settings');
    const dropboxSettings = document.getElementById('dropbox_settings');
    
    if (backupDestination) {
        backupDestination.addEventListener('change', function() {
            if (this.value === 's3') {
                s3Settings.classList.remove('d-none');
                dropboxSettings.classList.add('d-none');
            } else if (this.value === 'dropbox') {
                s3Settings.classList.add('d-none');
                dropboxSettings.classList.remove('d-none');
            } else {
                s3Settings.classList.add('d-none');
                dropboxSettings.classList.add('d-none');
            }
        });
    }
    
    // Lancer une sauvegarde
    const runBackupBtn = document.getElementById('runBackup');
    if (runBackupBtn) {
        runBackupBtn.addEventListener('click', function() {
            this.disabled = true;
            this.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sauvegarde en cours...';
            
            fetch('{{ route("admin.backups.run") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Sauvegarde effectuée avec succès !');
                    location.reload();
                } else {
                    alert('Erreur lors de la sauvegarde : ' + data.message);
                    this.disabled = false;
                    this.innerHTML = 'Lancer une sauvegarde maintenant';
                }
            })
            .catch(error => {
                alert('Erreur lors de la sauvegarde : ' + error);
                this.disabled = false;
                this.innerHTML = 'Lancer une sauvegarde maintenant';
            });
        });
    }
    
    // Tester la configuration email
    const testEmailBtn = document.getElementById('testEmail');
    if (testEmailBtn) {
        testEmailBtn.addEventListener('click', function() {
            this.disabled = true;
            this.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Envoi en cours...';
            
            const formData = new FormData(this.closest('form'));
            
            fetch('{{ route("admin.settings.test-email") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Email de test envoyé avec succès !');
                } else {
                    alert('Erreur lors de l\'envoi de l\'email : ' + data.message);
                }
                this.disabled = false;
                this.innerHTML = 'Tester la configuration';
            })
            .catch(error => {
                alert('Erreur lors de l\'envoi de l\'email : ' + error);
                this.disabled = false;
                this.innerHTML = 'Tester la configuration';
            });
        });
    }
});
</script>
@endsection
