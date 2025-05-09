@extends('Dashboard.layouts.app')

@section('title', 'Gestion des destinations')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Gestion des destinations</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Destinations</li>
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

    <!-- Carte principale -->
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Liste des destinations</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDestinationModal">
                <i class="fas fa-plus me-2"></i> Ajouter une destination
            </button>
        </div>
        <div class="card-body">
            <!-- Filtres -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <form action="{{ route('admin.destinations.list') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Rechercher par ville, pays..." value="{{ request('search') }}">
                        <select name="region" class="form-select me-2" style="width: 150px;">
                            <option value="">Toutes les régions</option>
                            @foreach($regions as $region)
                                <option value="{{ $region }}" {{ request('region') == $region ? 'selected' : '' }}>{{ $region }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </form>
                </div>
                <div class="col-md-4 text-end">
                    <div class="btn-group">
                        <a href="{{ route('admin.destinations.export', ['format' => 'csv']) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-file-csv me-1"></i> CSV
                        </a>
                        <a href="{{ route('admin.destinations.export', ['format' => 'excel']) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-file-excel me-1"></i> Excel
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tableau des destinations -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Ville</th>
                            <th>Pays</th>
                            <th>Région</th>
                            <th>Voyages (départ)</th>
                            <th>Voyages (arrivée)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($destinations as $destination)
                            <tr>
                                <td>{{ $destination->id }}</td>
                                <td>{{ $destination->ville }}</td>
                                <td>{{ $destination->pays }}</td>
                                <td>{{ $destination->region }}</td>
                                <td>{{ $destination->voyages_depart_count }}</td>
                                <td>{{ $destination->voyages_arrive_count }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editDestinationModal{{ $destination->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteDestinationModal{{ $destination->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Modal de modification -->
                                    <div class="modal fade" id="editDestinationModal{{ $destination->id }}" tabindex="-1" aria-labelledby="editDestinationModalLabel{{ $destination->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editDestinationModalLabel{{ $destination->id }}">Modifier la destination</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="ville{{ $destination->id }}" class="form-label">Ville</label>
                                                            <input type="text" class="form-control" id="ville{{ $destination->id }}" name="ville" value="{{ $destination->ville }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="pays{{ $destination->id }}" class="form-label">Pays</label>
                                                            <input type="text" class="form-control" id="pays{{ $destination->id }}" name="pays" value="{{ $destination->pays }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="region{{ $destination->id }}" class="form-label">Région</label>
                                                            <input type="text" class="form-control" id="region{{ $destination->id }}" name="region" value="{{ $destination->region }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Modal de suppression -->
                                    <div class="modal fade" id="deleteDestinationModal{{ $destination->id }}" tabindex="-1" aria-labelledby="deleteDestinationModalLabel{{ $destination->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteDestinationModalLabel{{ $destination->id }}">Confirmer la suppression</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr de vouloir supprimer la destination <strong>{{ $destination->ville }}</strong> ?
                                                    
                                                    @if($destination->voyages_depart_count > 0 || $destination->voyages_arrive_count > 0)
                                                        <div class="alert alert-warning mt-3">
                                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                                            Attention : Cette destination est utilisée dans {{ $destination->voyages_depart_count + $destination->voyages_arrive_count }} voyage(s). La suppression peut affecter ces voyages.
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                    <form action="{{ route('admin.destinations.destroy', $destination->id) }}" method="POST">
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
                                <td colspan="7" class="text-center">Aucune destination trouvée</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $destinations->links() }}
            </div>
        </div>
    </div>
    
    <!-- Modal d'ajout de destination -->
    <div class="modal fade" id="addDestinationModal" tabindex="-1" aria-labelledby="addDestinationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDestinationModalLabel">Ajouter une destination</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.destinations.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" required>
                        </div>
                        <div class="mb-3">
                            <label for="pays" class="form-label">Pays</label>
                            <input type="text" class="form-control" id="pays" name="pays" required>
                        </div>
                        <div class="mb-3">
                            <label for="region" class="form-label">Région</label>
                            <input type="text" class="form-control" id="region" name="region" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
