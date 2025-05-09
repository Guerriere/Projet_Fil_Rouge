<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des paiements</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h1 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
        .badge {
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 10px;
            color: white;
        }
        .bg-success {
            background-color: #28a745;
        }
        .bg-warning {
            background-color: #ffc107;
            color: #212529;
        }
        .bg-danger {
            background-color: #dc3545;
        }
        .bg-info {
            background-color: #17a2b8;
        }
        .bg-secondary {
            background-color: #6c757d;
        }
    </style>
</head>
<body>
    <h1>Liste des paiements - {{ date('d/m/Y') }}</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Référence</th>
                <th>Client</th>
                <th>Montant</th>
                <th>Méthode</th>
                <th>Statut</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->reference }}</td>
                <td>
                    @if($payment->user_id)
                    {{ $payment->user->name }}
                    @else
                    {{ $payment->nom }} (Invité)
                    @endif
                </td>
                <td class="text-right">{{ number_format($payment->montant, 0, ',', ' ') }} FCFA</td>
                <td>
                    @if($payment->methode == 'card')
                    Carte bancaire
                    @elseif($payment->methode == 'paypal')
                    PayPal
                    @elseif($payment->methode == 'orange_money')
                    Orange Money
                    @elseif($payment->methode == 'wave')
                    Wave
                    @else
                    {{ $payment->methode }}
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
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="footer">
        <p>Document généré le {{ date('d/m/Y à H:i') }} - {{ config('app.name') }}</p>
    </div>
</body>
</html>