@extends('layouts.admin')

@section('title', 'Détails du paiement')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Détails du paiement #{{ $payment->id }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.payments.list') }}">Paiements</a></li>
        <li class="breadcrumb-item active">Détails du paiement #{{ $payment->id }}</li>
    </ol>

    <div class="row">
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-money-bill-wave me-1"></i>
                        Informations du paiement
                    </div>
                    <div>
                        @if($payment->statut == 'pending')
                        <button type="button" class="btn btn-sm btn-success me-2" data-bs-toggle="modal" data-bs-target="#confirmPaymentModal">
                            <i class="fas fa-check me-1"></i> Marquer comme payé
                        </button>
                        @endif
                        @if($payment->statut == 'completed')
                        <button type="button" class="btn btn-sm btn-info me-2" data-bs-toggle="modal" data-bs-target="#refundPaymentModal">
                            <i class="fas fa-undo me-1"></i> Rembourser
                        </button>
                        @endif
                        <a href="{{ route('admin.payments.export.receipt', $payment->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-file-invoice me-1"></i> Télécharger reçu
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="text-muted mb-3">Informations générales</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th style="width: 40%">ID du paiement:</th>
                                    <td>{{ $payment->id }}</td>
                                </tr>
                                <tr>
                                    <th>Référence:</th>
                                    <td>{{ $payment->reference }}</td>
                                </tr>
                                <tr>
                                    <th>Montant:</th>
                                    <td><strong>{{ number_format($payment->montant, 0, ',', ' ') }} FCFA</strong></td>
                                </tr>
                                <tr>
                                    <th>Statut:</th>
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
                                </tr>
                                <tr>
                                    <th>Méthode:</th>
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
                                </tr>
                                <tr>
                                    <th>Date de paiement:</th>
                                    <td>{{ $payment->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                @if($payment->updated_at != $payment->created_at)
                                <tr>
                                    <th>Dernière mise à jour:</th>
                                    <td>{{ $payment->updated_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-muted mb-3">Détails de la transaction</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <th style="width: 40%">ID de transaction:</th>
                                    <td>{{ $payment->transaction_id ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Réservation:</th>
                                    <td>
                                        <a href="{{ route('admin.reservations.show', $payment->reservation_id) }}">
                                            #{{ $payment->reservation_id }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Client:</th>
                                    <td>
                                        @if($payment->user_id)
                                        <a href="{{ route('admin.users.show', $payment->user_id) }}">
                                            {{ $payment->user->name }}
                                        </a>
                                        @else
                                        {{ $payment->nom }} (Invité)
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $payment->email }}</td>
                                </tr>
                                <tr>
                                    <th>Téléphone:</th>
                                    <td>{{ $payment->telephone ?? 'N/A' }}</td>
                                </tr>
                                @if($payment->statut == 'refunded')
                                <tr>
                                    <th>Date de remboursement:</th>
                                    <td>{{ $payment->refunded_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Raison du remboursement:</th>
                                    <td>{{ $payment->refund_reason ?? 'Non spécifiée' }}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>

                    @if($payment->notes)
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5 class="text-muted mb-3">Notes</h5>
                            <div class="p-3 bg-light rounded">
                                {{ $payment->notes }}
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-12">
                            <h5 class="text-muted mb-3">Historique des actions</h5>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Date</th>
                                            <th>Action</th>
                                            <th>Utilisateur</th>
                                            <th>Détails</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($paymentLogs as $log)
                                        <tr>
                                            <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                                            <td>{{ $log->action }}</td>
                                            <td>
                                                @if($log->admin_id)
                                                {{ $log->admin->name }}
                                                @else
                                                Système
                                                @endif
                                            </td>
                                            <td>{{ $log->details }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Aucun historique disponible</td>
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

        <div class="col-xl-4">
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <i class="fas fa-ticket-alt me-1"></i>
                    Détails de la réservation
                </div>
                <div class="card-body">
                    <h5 class="card-title">Voyage #{{ $payment->reservation->voyage->id }}</h5>
                    <p class="card-text">
                        <strong>Trajet:</strong> {{ $payment->reservation->voyage->destinationDepart->ville }} → {{ $payment->reservation->voyage->destinationArrive->ville }}<br>
                        <strong>Date de départ:</strong> {{ \Carbon\Carbon::parse($payment->reservation->voyage->date_depart)->format('d/m/Y H:i') }}<br>
                        <strong>Agence:</strong> {{ $payment->reservation->voyage->agence->agency_name }}<br>
                        <strong>Nombre de places:</strong> {{ $payment->reservation->nombre_places }}<br>
                        <strong>Montant total:</strong> {{ number_format($payment->reservation->montant_total, 0, ',', ' ') }} FCFA<br>
                        <strong>Statut:</strong>
                        @if($payment->reservation->statut == 'en_attente')
                        <span class="badge bg-warning">En attente</span>
                        @elseif($payment->reservation->statut == 'confirmee')
                        <span class="badge bg-success">Confirmée</span>
                        @elseif($payment->reservation->statut == 'annulee')
                        <span class="badge bg-danger">Annulée</span>
                        @else
                        <span class="badge bg-secondary">{{ $payment->reservation->statut }}</span>
                        @endif
                    </p>
                    <a href="{{ route('admin.reservations.show', $payment->reservation_id) }}" class="btn btn-primary">
                        <i class="fas fa-eye me-1"></i> Voir la réservation
                    </a>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-white">
                    <i class="fas fa-edit me-1"></i>
                    Ajouter une note
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.payments.add-note', $payment->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea class="form-control" name="note" rows="3" placeholder="Ajouter une note concernant ce paiement..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer la note</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour confirmer le paiement -->
<div class="modal fade" id="confirmPaymentModal" tabindex="-1" aria-labelledby="confirmPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmPaymentModalLabel">Confirmer le paiement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.payments.confirm', $payment->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir marquer ce paiement comme complété ?</p>
                    <div class="mb-3">
                        <label for="transaction_id" class="form-label">ID de transaction (optionnel)</label>
                        <input type="text" class="form-control" id="transaction_id" name="transaction_id">
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes (optionnel)</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Confirmer le paiement</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal pour rembourser le paiement -->
<div class="modal fade" id="refundPaymentModal" tabindex="-1" aria-labelledby="refundPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="refundPaymentModalLabel">Rembourser le paiement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.payments.refund', $payment->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir rembourser ce paiement ?</p>
                    <div class="mb-3">
                        <label for="refund_reason" class="form-label">Raison du remboursement</label>
                        <textarea class="form-control" id="refund_reason" name="refund_reason" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-info">Confirmer le remboursement</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection