<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/Dashboard/partner/destinations/add.blade.php -->
@extends('Dashboard.layouts.app')

@section('title', 'Ajouter une Destination')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Ajouter une Destination</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('partner.destinations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Entrez une description" rows="4" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" name="ville" id="ville" class="form-control" placeholder="Entrez le nom de la ville" required>
                </div>
                <div class="form-group mb-4">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                    <small class="text-muted">Formats acceptés : JPEG, PNG, JPG. Taille maximale : 2MB.</small>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="mdi mdi-check-circle-outline"></i> Ajouter
                    </button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection