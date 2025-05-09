@extends('layouts.admin')

@section('title', 'Gestion des paiements')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Gestion des paiements</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Tableau de bord</a></li>
        <li class="breadcrumb-item active">Paiements</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-money-bill-wave me-1"></i>
                Liste des paiements
            </div>
            <div>
                <a href="{{ route('admin.payments.export', 'csv') }}" class="btn btn-sm btn-outline-secondary me-2">
                    <i class="fas fa-file-csv me-1"></i> Exporter CSV
                </a>
                <a href="{{ route('admin.payments.export', 'pdf') }}" class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-file-pdf me-1"></i> Exporter PDF
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <form action="{{ route('admin.payments.list') }}" method="GET" class="row g-3">
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="search" placeholder="Rechercher..." value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" name="statut">
                                <option value="">Tous les statuts</option>
                                <option value="completed" {{ request('statut') == 'completed' ? 'selected' : '' }}>Complété</option>
                                <option value="pending" {{ request('statut') == 'pending' ? 'selected' : '' }}>En attente</option>
                                <option value="failed" {{ request('statut') == 'failed' ? 'selected' : '' }}>Échoué</option>
                                <option value="refunded" {{ request('statut') == 'refunded' ? 'selected' : '' }}>Remboursé</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" name="methode">
                                <option value="">Toutes les méthodes</option>
                                <option value="card" {{ request('methode') == 'card' ? 'selected' : '' }}>Carte bancaire</option>
                                <option value="paypal" {{ request('methode') == 'paypal' ? 'selected' : '' }}>PayPal</option>
                                <option value="orange_money" {{ request('methode') == 'orange_money' ? 'selected' : '' }}>Orange Money</option>
                                <option value="wave" {{ request('methode') == 'wave' ? 'selected' : '' }}>Wave</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" name="date_debut" placeholder="Date début" value="{{ request('date_debut') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" name="date_fin" placeholder="Date fin" value="{{ request('date_fin') }}">
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-0">{{ number_format($totalPayments) }}</h5>
                                    <div>Total des paiements</div>
                                </div>
                                <div>
                                    <i class="fas fa-money-bill-wave fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-0">{{ number_format($completedPayments) }}</h5>
                                    <div>Paiements complétés</div>
                                </div>
                                <div>
                                    <i class="fas fa-check-circle fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-0">{{ number_format($pendingPayments) }}</h5>
                                    <div>Paiements en attente</div>
                                </div>
                                <div>
                                    <i class="fas fa-clock fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-0">{{ number_format($failedPayments) }}</h5>
                                    <div>Paiements échoués</div>
                                </div>
                                <div>
                                    <i class="fas fa-times-circle fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Réservation</th>
                            <th>Client</th>
                            <th>Montant</th>
                            <th>Méthode</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>
                                <a href="{{ route('admin.reservations.show', $payment->reservation_id) }}">
                                    #{{ $payment->reservation_id }}
                                </a>
                            </td>
                            <td>
                                @if($payment->user_id)
                                <a href="{{ route('admin.users.show', $payment->user_id) }}">
                                    {{ $payment->user->name }}
                                </a>
                                @else
                                {{ $payment->nom }} (Invité)
                                @endif
                            </td>
                            <td>{{ number_format($payment->montant, 0, ',', ' ') }} FCFA</td>
                            <td>
                                @if($payment->methode == 'card')
                                <span class="badge bg-info">Carte bancaire</span>
                                @elseif($payment->methode == 'paypal')
                                <span class="badge bg-primary">PayPal</span>
                                @elseif($payment->methode == 'orange_money')
                                <span class="badge bg-warning">Orange Money</span>
                                @elseif($payment->methode == 'wave')
                                <span class="badge bg-success">Wave</span>
                                @else
                                <span class="badge bg-secondary">{{ $payment->methode }}</span>
                                @endif
                            </td>
                            <td>
                                @if($payment->statut == 'completed')
                                <span class="badge bg-success">Complété</span>
                                @elseif($payment->statut == 'pending')
                                <span class="badge bg-warning">En attente</span>
                                @elseif($payment->statut == 'failed')
                                <span class="badge bg-danger">Échoué</span>
                                @elseif($payment->statut == 'refunded')
                                <span class="badge bg-info">Remboursé</span>
                                @else
                                <span class="badge bg-secondary">{{ $payment->statut }}</span>
                                @endif
                            </td>
                            <td>{{ $payment->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.payments.show', $payment->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Aucun paiement trouvé</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $payments->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection