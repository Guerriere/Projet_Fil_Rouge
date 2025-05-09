@extends('Dashboard.layouts.app')

@section('title', 'Gestion des voyages')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Gestion des voyages</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Voyages</li>
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

    <!-- Statistiques des voyages -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-white">Total</h6>
                            <h3 class="mb-0">{{ $totalVoyages }}</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-route fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-white">Actifs</h6>
                            <h3 class="mb-0">{{ $activeVoyages }}</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-check-circle fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-white">Inactifs</h6>
                            <h3 class="mb-0">{{ $inactiveVoyages }}</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-times-circle fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-white">Réservations</h6>
                            <h3 class="mb-0">{{ $totalReservations }}</h3>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fas fa-ticket-alt fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carte principale -->
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Liste des voyages</h5>
            <div class="btn-group">
                <a href="{{ route('admin.voyages.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Ajouter un voyage
                </a>
                <a href="{{ route('admin.voyages.export', ['format' => 'excel']) }}" class="btn btn-outline-secondary">
                    <i class="fas fa-file-excel me-1"></i> Exporter
                </a>
            </div>
        </div>
        <div class="card-body">
            <!-- Filtres -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <form action="{{ route('admin.voyages.list') }}" method="GET" class="row g-3">
                        <div class="col-md-2">
                            <select name="agence_id" class="form-select">
                                <option value="">Toutes les agences</option>
                                @foreach($agences as $agence)
                                    <option value="{{ $agence->id }}" {{ request('agence_id') == $agence->id ? 'selected' : '' }}>
                                        {{ $agence->agency_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="depart_id" class="form-select">
                                <option value="">Tous les départs</option>
                                @foreach($destinations as $destination)
                                    <option value="{{ $destination->id }}" {{ request('depart_id') == $destination->id ? 'selected' : '' }}>
                                        {{ $destination->ville }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="arrive_id" class="form-select">
                                <option value="">Toutes les arrivées</option>
                                @foreach($destinations as $destination)
                                    <option value="{{ $destination->id }}" {{ request('arrive_id') == $destination->id ? 'selected' : '' }}>
                                        {{ $destination->ville }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="date_depart" class="form-control" value="{{ request('date_depart') }}">
                        </div>
                        <div class="col-md-2">
                            <select name="statut" class="form-select">
                                <option value="">Tous les statuts</option>
                                <option value="actif" {{ request('statut') == 'actif' ? 'selected' : '' }}>Actif</option>
                                <option value="inactif" {{ request('statut') == 'inactif' ? 'selected' : '' }}>Inactif</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary me-2">Filtrer</button>
                            <a href="{{ route('admin.voyages.list') }}" class="btn btn-secondary">Réinitialiser</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tableau des voyages -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Trajet</th>
                            <th>Agence</th>
                            <th>Date & Heure</th>
                            <th>Prix</th>
                            <th>Places</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($voyages as $voyage)
                            <tr>
                                <td>{{ $voyage->id }}</td>
                                <td>{{ $voyage->destinationDepart->ville }} → {{ $voyage->destinationArrive->ville }}</td>
                                <td>
                                    <div>{{ $voyage->agence->agency_name }}</div>
                                    <div class="text-muted small">{{ $voyage->agence->agency_type }}</div>
                                </td>
                                <td>
                                    <div>{{ \Carbon\Carbon::parse($voyage->date_depart)->format('d/m/Y') }}</div>
                                    <div class="text-muted small">{{ $voyage->heure_depart }}</div>
                                </td>
                                <td>{{ number_format($voyage->montant, 0, ',', ' ') }} FCFA</td>
                                <td>
                                    <div>{{ $voyage->nbre_place }} disponibles</div>
                                    <div class="text-muted small">{{ $voyage->reservations_count ?? 0 }} réservées</div>
                                </td>
                                <td>
                                    @if($voyage->statut == 'actif')
                                        <span class="badge bg-success">Actif</span>
                                    @else
                                        <span class="badge bg-danger">Inactif</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.voyages.show', $voyage->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.voyages.edit', $voyage->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $voyage->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Modal de suppression -->
                                    <div class="modal fade" id="deleteModal{{ $voyage->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $voyage->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $voyage->id }}">Confirmer la suppression</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr de vouloir supprimer ce voyage ?
                                                    <div class="alert alert-warning mt-3">
                                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                                        Attention : Cette action supprimera également toutes les réservations associées à ce voyage.
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                    <form action="{{ route('admin.voyages.destroy', $voyage->id) }}" method="POST">
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
                                <td colspan="8" class="text-center">Aucun voyage trouvé</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $voyages->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
