@extends('Dashboard.layouts.app')

@section('title', 'Gestion des partenaires')

@section('fil_ariane')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Gestion des partenaires</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Partenaires</li>
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
            <h5 class="mb-0">Liste des partenaires</h5>
            <a href="{{ route('admin.partners.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Ajouter un partenaire
            </a>
        </div>
        <div class="card-body">
            <!-- Filtres -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <form action="{{ route('admin.partners.list') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Rechercher par nom, email..." value="{{ request('search') }}">
                        <select name="type" class="form-select me-2" style="width: 150px;">
                            <option value="">Tous les types</option>
                            <option value="Bus" {{ request('type') == 'Bus' ? 'selected' : '' }}>Bus</option>
                            <option value="Train" {{ request('type') == 'Train' ? 'selected' : '' }}>Train</option>
                            <option value="Avion" {{ request('type') == 'Avion' ? 'selected' : '' }}>Avion</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </form>
                </div>
                <div class="col-md-4 text-end">
                    <div class="btn-group">
                        <a href="{{ route('admin.partners.export', ['format' => 'csv']) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-file-csv me-1"></i> CSV
                        </a>
                        <a href="{{ route('admin.partners.export', ['format' => 'excel']) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-file-excel me-1"></i> Excel
                        </a>
                        <a href="{{ route('admin.partners.export', ['format' => 'pdf']) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-file-pdf me-1"></i> PDF
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tableau des partenaires -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Nom de l'agence</th>
                            <th>Type</th>
                            <th>Contact</th>
                            <th>Voyages</th>
                            <th>Date d'inscription</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($partners as $partner)
                            <tr>
                                <td>{{ $partner->id }}</td>
                                <td>
                                    @if($partner->agency_logo)
                                        <img src="{{ asset('storage/' . $partner->agency_logo) }}" alt="Logo" class="rounded-circle" width="40" height="40">
                                    @else
                                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i class="fas fa-building text-secondary"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $partner->agency_name }}</td>
                                <td>
                                    @if($partner->agency_type == 'Bus')
                                        <span class="badge bg-success">Bus</span>
                                    @elseif($partner->agency_type == 'Train')
                                        <span class="badge bg-info">Train</span>
                                    @elseif($partner->agency_type == 'Avion')
                                        <span class="badge bg-primary">Avion</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $partner->agency_type }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div>{{ $partner->user->email }}</div>
                                    <div>{{ $partner->phone_pro }}</div>
                                </td>
                                <td>{{ $partner->voyages_count }}</td>
                                <td>{{ $partner->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if($partner->user->email_verified_at)
                                        <span class="badge bg-success">Vérifié</span>
                                    @else
                                        <span class="badge bg-warning">Non vérifié</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.partners.show', $partner->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $partner->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Modal de suppression -->
                                    <div class="modal fade" id="deleteModal{{ $partner->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $partner->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $partner->id }}">Confirmer la suppression</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr de vouloir supprimer le partenaire <strong>{{ $partner->agency_name }}</strong> ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST">
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
                                <td colspan="9" class="text-center">Aucun partenaire trouvé</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $partners->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
