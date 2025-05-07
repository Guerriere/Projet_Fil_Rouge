<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/Dashboard/partner/destinations/list.blade.php -->
@extends('Dashboard.layouts.app')

@section('title', 'Liste des Destinations')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Liste des Destinations</h4>
        <form action="{{ route('partner.destinations.list') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Rechercher une destination..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-magnify"></i> Rechercher
            </button>
        </form>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Ville</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($destinations as $index => $destination)
                <tr>
                    <!-- Numérotation basée sur la pagination -->
                    <td>{{ ($destinations->currentPage() - 1) * $destinations->perPage() + $loop->iteration }}</td>
                    <td>{{ $destination->description }}</td>
                    <td>{{ $destination->ville }}</td>
                    <td>
                        <!-- Bouton pour visualiser l'image -->
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#imageModal{{ $destination->id }}">
                            <i class="mdi mdi-eye"></i> Voir
                        </button>

                        <!-- Modale pour afficher l'image -->
                        <div class="modal fade" id="imageModal{{ $destination->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $destination->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel{{ $destination->id }}">Image de la Destination</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('storage/' . $destination->image_url) }}" alt="Image de {{ $destination->ville }}" class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="d-flex gap-2">
                        <!-- Bouton Modifier -->
                        <a href="{{ route('partner.destinations.edit', $destination->id) }}" class="btn btn-warning btn-sm" title="Modifier">
                            <i class="mdi mdi-pencil"></i>
                        </a>
                        <!-- Bouton Supprimer -->
                        <form action="{{ route('partner.destinations.delete', $destination->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette destination ?')">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Aucune destination trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $destinations->links() }}
    </div>
</div>
@endsection