<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    /**
     * Affiche la liste des destinations.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $destinations = Destination::when($search, function ($query, $search) {
            return $query->where('description', 'like', "%{$search}%")
                         ->orWhere('ville', 'like', "%{$search}%");
        })->paginate(10); // Limite à 10 résultats par page

        return view('Dashboard.partner.destinations.list', compact('destinations'));
    }

    /**
     * Affiche le formulaire pour ajouter une destination.
     */
    public function create()
    {
        return view('Dashboard.partner.destinations.add');
    }

    /**
     * Enregistre une nouvelle destination.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string|max:255',
            'ville' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('destinations', 'public') : null;

        Destination::create([
            'user_id' => auth()->id(), // Associe la destination à l'utilisateur connecté
            'description' => $request->description,
            'ville' => $request->ville,
            'image_url' => $imagePath,
        ]);

        return redirect()->route('partner.destinations.list')->with('success', 'Destination ajoutée avec succès.');
    }

    /**
     * Affiche le formulaire pour modifier une destination.
     */
    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        return view('Dashboard.partner.destinations.edit', compact('destination'));
    }

    /**
     * Met à jour une destination existante.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'nullable|string|max:255',
            'ville' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $destination = Destination::findOrFail($id);

        // Mettre à jour l'image si une nouvelle est fournie
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($destination->image_url) {
                Storage::disk('public')->delete($destination->image_url);
            }

            // Enregistrer la nouvelle image
            $imagePath = $request->file('image')->store('destinations', 'public');
            $destination->image_url = $imagePath;
        }

        // Mettre à jour les autres champs
        $destination->update([
            'description' => $request->description,
            'ville' => $request->ville,
        ]);

        return redirect()->route('partner.destinations.list')->with('success', 'Destination mise à jour avec succès.');
    }

    /**
     * Supprime une destination.
     */
    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);

        // Supprimer l'image associée
        if ($destination->image_url) {
            Storage::disk('public')->delete($destination->image_url);
        }

        $destination->delete();

        return redirect()->route('partner.destinations.list')->with('success', 'Destination supprimée avec succès.');
    }
}