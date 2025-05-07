<!-- filepath: /home/kali/Insclass/PROJET_LARAVEL/Projet_Fil_Rouge/resources/views/Dashboard/partner/offers/add.blade.php -->
@extends('Dashboard.layouts.app')

@section('title', 'Ajouter une Offre de Voyage')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Ajouter une Offre de Voyage</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('partner.offers.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="destination_depart_id" class="form-label">Destination de départ</label>
                    <select name="destination_depart_id" id="destination_depart_id" class="form-control" required>
                        <option value="" disabled selected>Choisissez une destination</option>
                        @foreach ($destinations as $destination)
                            <option value="{{ $destination->id }}">{{ $destination->ville }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="destination_arrive_id" class="form-label">Destination d'arrivée</label>
                    <select name="destination_arrive_id" id="destination_arrive_id" class="form-control" required>
                        <option value="" disabled selected>Choisissez une destination</option>
                        @foreach ($destinations as $destination)
                            <option value="{{ $destination->id }}">{{ $destination->ville }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="date_depart" class="form-label">Date de départ</label>
                    <input type="date" name="date_depart" id="date_depart" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="heure_depart" class="form-label">Heure de départ</label>
                    <input type="time" name="heure_depart" id="heure_depart" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="montant" class="form-label">Montant</label>
                    <input type="number" name="montant" id="montant" class="form-control" placeholder="Entrez le montant" step="0.01" required>
                </div>
                <div class="form-group mb-3">
                    <label for="nbre_place" class="form-label">Nombre de places</label>
                    <input type="number" name="nbre_place" id="nbre_place" class="form-control" placeholder="Entrez le nombre de places" required>
                </div>
                <div class="form-group mb-3">
                    <label for="statut" class="form-label">Statut</label>
                    <select name="statut" id="statut" class="form-control">
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="mdi mdi-check-circle-outline"></i> Ajouter
                    </button>
                    <a href="{{ route('partner.offers.list') }}" class="btn btn-secondary">
                        <i class="mdi mdi-arrow-left"></i> Retour
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection