<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/Dashboard/partner/destinations/edit.blade.php -->
@extends('Dashboard.layouts.app')

@section('title', 'Modifier une Destination')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Modifier une Destination</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('partner.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Entrez une description" rows="4" required>{{ $destination->description }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" name="ville" id="ville" class="form-control" placeholder="Entrez le nom de la ville" value="{{ $destination->ville }}" required>
                </div>
                <div class="form-group mb-4">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <small class="text-muted">Laissez vide si vous ne souhaitez pas changer l'image.</small>
                </div>
                <div class="form-group mb-4">
                    <label>Image actuelle :</label>
                    <div>
                        <img src="{{ asset('storage/' . $destination->image_url) }}" alt="Image actuelle" class="img-fluid rounded" width="150">
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="mdi mdi-check-circle-outline"></i> Enregistrer
                    </button>
                    <a href="{{ route('partner.destinations.list') }}" class="btn btn-secondary">
                        <i class="mdi mdi-arrow-left"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection