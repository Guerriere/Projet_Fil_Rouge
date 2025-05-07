<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/Dashboard/partner/offers/list.blade.php -->
@extends('Dashboard.layouts.app')

@section('title', 'Liste des Offres de Voyage')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Liste des Offres de Voyage</h4>
        <a href="{{ route('partner.offers.add') }}" class="btn btn-primary">
            <i class="mdi mdi-plus-circle"></i> Ajouter une Offre
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Formulaire de recherche -->
    <form action="{{ route('partner.offers.list') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Rechercher par destination ou statut" value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">
                    <i class="mdi mdi-magnify"></i> Rechercher
                </button>
            </div>
        </div>
    </form>

    <table class="table table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Départ</th>
                <th>Arrivée</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Montant</th>
                <th>Places</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($voyages as $voyage)
                <tr>
                    <td>{{ $voyage->id }}</td>
                    <td>{{ $voyage->destinationDepart->ville ?? 'Non défini' }}</td>
                    <td>{{ $voyage->destinationArrive->ville ?? 'Non défini' }}</td>
                    <td>{{ $voyage->date_depart }}</td>
                    <td>{{ $voyage->heure_depart }}</td>
                    <td>{{ $voyage->montant }}</td>
                    <td>{{ $voyage->nbre_place }}</td>
                    <td>
                        <span class="badge {{ $voyage->statut == 'active' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($voyage->statut) }}
                        </span>
                    </td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('partner.offers.edit', $voyage->id) }}" class="btn btn-warning btn-sm">
                            <i class="mdi mdi-pencil"></i>
                        </a>
                        <form action="{{ route('partner.offers.delete', $voyage->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Aucune offre trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $voyages->links() }}
    </div>
</div>
@endsection