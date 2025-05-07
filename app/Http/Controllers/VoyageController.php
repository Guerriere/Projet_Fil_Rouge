<?php

namespace App\Http\Controllers;

use App\Models\Voyage;
use App\Models\Destination;
use Illuminate\Http\Request;

class VoyageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $voyages = Voyage::with(['destinationDepart', 'destinationArrive'])
            ->when($search, function ($query, $search) {
                $query->whereHas('destinationDepart', function ($q) use ($search) {
                    $q->where('ville', 'like', "%$search%");
                })
                ->orWhereHas('destinationArrive', function ($q) use ($search) {
                    $q->where('ville', 'like', "%$search%");
                })
                ->orWhere('statut', 'like', "%$search%");
            })
            ->paginate(10);

        return view('Dashboard.partner.offers.list', compact('voyages'));
    }

    public function create()
    {
        // Récupérer uniquement les destinations associées à l'utilisateur connecté
        $destinations = Destination::where('user_id', auth()->id())->get();

        return view('Dashboard.partner.offers.add', compact('destinations'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Vérifiez si l'utilisateur a une agence associée
        if (!$user->agence) {
            return redirect()->back()->withErrors('Vous devez être associé à une agence pour créer un voyage.');
        }

        $request->validate([
            'destination_depart_id' => [
                'required',
                'exists:destinations,id',
                function ($attribute, $value, $fail) {
                    if (!Destination::where('id', $value)->where('user_id', auth()->id())->exists()) {
                        $fail('La destination de départ sélectionnée ne vous appartient pas.');
                    }
                },
            ],
            'destination_arrive_id' => [
                'required',
                'exists:destinations,id',
                function ($attribute, $value, $fail) {
                    if (!Destination::where('id', $value)->where('user_id', auth()->id())->exists()) {
                        $fail('La destination d\'arrivée sélectionnée ne vous appartient pas.');
                    }
                },
            ],
            'date_depart' => 'required|date',
            'heure_depart' => 'required',
            'montant' => 'required|numeric|min:0',
            'nbre_place' => 'required|integer|min:1',
            'statut' => 'required|in:active,inactive',
        ]);

        // Créez le voyage en utilisant l'agence associée à l'utilisateur
        Voyage::create([
            'agence_id' => $user->agence->id, // Utilisez l'agence associée
            'destination_depart_id' => $request->destination_depart_id,
            'destination_arrive_id' => $request->destination_arrive_id,
            'date_depart' => $request->date_depart,
            'heure_depart' => $request->heure_depart,
            'montant' => $request->montant,
            'nbre_place' => $request->nbre_place,
            'statut' => $request->statut,
        ]);

        return redirect()->route('partner.offers.list')->with('success', 'Offre ajoutée avec succès.');
    }

    public function edit($id)
    {
        $voyage = Voyage::findOrFail($id);

        // Récupérer uniquement les destinations associées à l'utilisateur connecté
        $destinations = Destination::where('user_id', auth()->id())->get();

        return view('Dashboard.partner.offers.edit', compact('voyage', 'destinations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'destination_depart_id' => [
                'required',
                'exists:destinations,id',
                function ($attribute, $value, $fail) {
                    if (!Destination::where('id', $value)->where('user_id', auth()->id())->exists()) {
                        $fail('La destination de départ sélectionnée ne vous appartient pas.');
                    }
                },
            ],
            'destination_arrive_id' => [
                'required',
                'exists:destinations,id',
                function ($attribute, $value, $fail) {
                    if (!Destination::where('id', $value)->where('user_id', auth()->id())->exists()) {
                        $fail('La destination d\'arrivée sélectionnée ne vous appartient pas.');
                    }
                },
            ],
            'date_depart' => 'required|date',
            'heure_depart' => 'required',
            'montant' => 'required|numeric|min:0',
            'nbre_place' => 'required|integer|min:1',
            'statut' => 'required|in:active,inactive',
        ]);

        $voyage = Voyage::findOrFail($id);
        $voyage->update($request->all());

        return redirect()->route('partner.offers.list')->with('success', 'Offre mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $voyage = Voyage::findOrFail($id);
        $voyage->delete();

        return redirect()->route('partner.offers.list')->with('success', 'Offre supprimée avec succès.');
    }
}
