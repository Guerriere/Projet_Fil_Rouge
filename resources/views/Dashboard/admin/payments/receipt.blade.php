<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reçu de paiement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }
        h1 {
            font-size: 20px;
            margin-bottom: 5px;
        }
        .receipt-number {
            font-size: 14px;
            margin-bottom: 20px;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-section h2 {
            font-size: 14px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }
        .row {
            display: flex;
            margin-bottom: 10px;
        }
        .col {
            flex: 1;
        }
        .label {
            font-weight: bold;
            margin-right: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
        .total-row {
            font-weight: bold;
            background-color: #f9f9f9;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .badge {
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 10px;
            color: white;
            display: inline-block;
        }
        .bg-success {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            <h1>REÇU DE PAIEMENT</h1>
            <div class="receipt-number">N° {{ $payment->reference }}</div>
        </div>
        
        <div class="info-section">
            <h2>Informations du paiement</h2>
            <div class="row">
                <div class="col">
                    <div><span class="label">Date:</span> {{ $payment->created_at->format('d/m/Y H:i') }}</div>
                    <div><span class="label">Méthode:</span> 
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
                    </div>
                    <div><span class="label">Statut:</span> 
                        @if($payment->statut == 'completed')
                        <span class="badge bg-success">Complété</span>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div><span class="label">ID Transaction:</span> {{ $payment->transaction_id ?? 'N/A' }}</div>
                    <div><span class="label">ID Réservation:</span> #{{ $payment->reservation_id }}</div>
                </div>
            </div>
        </div>
        
        <div class="info-section">
            <h2>Informations du client</h2>
            <div class="row">
                <div class="col">
                    <div><span class="label">Nom:</span> 
                        @if($payment->user_id)
                        {{ $payment->user->name }}
                        @else
                        {{ $payment->nom }}
                        @endif
                    </div>
                    <div><span class="label">Email:</span> {{ $payment->email }}</div>
                </div>
                <div class="col">
                    <div><span class="label">Téléphone:</span> {{ $payment->telephone ?? 'N/A' }}</div>
                </div>
            </div>
        </div>
        
        <div class="info-section">
            <h2>Détails du voyage</h2>
            <div><span class="label">Trajet:</span> {{ $payment->reservation->voyage->destinationDepart->ville }} → {{ $payment->reservation->voyage->destinationArrive->ville }}</div>
            <div><span class="label">Date de départ:</span> {{ \Carbon\Carbon::parse($payment->reservation->voyage->date_depart)->format('d/m/Y H:i') }}</div>
            <div><span class="label">Agence:</span> {{ $payment->reservation->voyage->agence->agency_name }}</div>
            <div><span class="label">Nombre de places:</span> {{ $payment->reservation->nombre_places }}</div>
        </div>
        
        <div class="info-section">
            <h2>Détails du paiement</h2>
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th class="text-right">Prix unitaire</th>
                        <th class="text-right">Quantité</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Billet de voyage: {{ $payment->reservation->voyage->destinationDepart->ville }} → {{ $payment->reservation->voyage->destinationArrive->ville }}</td>
                        <td class="text-right">{{ number_format($payment->reservation->voyage->montant, 0, ',', ' ') }} FCFA</td>
                        <td class="text-right">{{ $payment->reservation->nombre_places }}</td>
                        <td class="text-right">{{ number_format($payment->reservation->voyage->montant * $payment->reservation->nombre_places, 0, ',', ' ') }} FCFA</td>
                    </tr>
                    @if($payment->reservation->frais_service > 0)
                    <tr>
                        <td>Frais de service</td>
                        <td class="text-right">-</td>
                        <td class="text-right">-</td>
                        <td class="text-right">{{ number_format($payment->reservation->frais_service, 0, ',', ' ') }} FCFA</td>
                    </tr>
                    @endif
                    <tr class="total-row">
                        <td colspan="3" class="text-right">Total</td>
                        <td class="text-right">{{ number_format($payment->montant, 0, ',', ' ') }} FCFA</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="footer">
            <p>Merci pour votre confiance!</p>
            <p>Ce reçu a été généré automatiquement et ne nécessite pas de signature.</p>
            <p>Pour toute question concernant ce paiement, veuillez contacter notre service client.</p>
            <p>{{ config('app.name') }} - {{ date('Y') }}</p>
        </div>
    </div>
</body>
</html>