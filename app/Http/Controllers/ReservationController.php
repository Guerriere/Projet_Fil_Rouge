<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the destinations.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $destinations = Destination::all();
        return view('administration.gestionnaire.destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new destination.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pays = $this->getPaysList(); // Liste des pays pour le formulaire
        $timezones = $this->getTimezonesList(); // Liste des fuseaux horaires
        return view('administration.gestionnaire.destinations.create', compact('pays', 'timezones'));
    }

    /**
     * Store a newly created destination in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'code_aeroport' => 'required|string|max:5|unique:destinations,code_aeroport',
            'description' => 'nullable|string',
            'attractions' => 'nullable|string',
            'statut' => 'required|in:actif,inactif',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            $validated['image_url'] = $request->file('image_url')->store('destinations', 'public');
        }

        Destination::create($validated);

        return redirect()->route('manager.destinations.index')->with('success', 'Destination créée avec succès.');
    }

    /**
     * Show the form for editing the specified destination.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\View\View
     */
    public function edit(Destination $destination)
    {
        $pays = $this->getPaysList(); // Liste des pays pour le formulaire
        $timezones = $this->getTimezonesList(); // Liste des fuseaux horaires
        return view('administration.gestionnaire.destinations.edit', compact('destination', 'pays', 'timezones'));
    }

    /**
     * Update the specified destination in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'code_aeroport' => 'required|string|max:5|unique:destinations,code_aeroport,' . $destination->id,
            'description' => 'nullable|string',
            'attractions' => 'nullable|string',
            'statut' => 'required|in:actif,inactif',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            // Supprimer l'ancienne image si elle existe
            if ($destination->image_url) {
                \Storage::disk('public')->delete($destination->image_url);
            }
            $validated['image_url'] = $request->file('image_url')->store('destinations', 'public');
        }

        $destination->update($validated);

        return redirect()->route('manager.destinations.index')->with('success', 'Destination mise à jour avec succès.');
    }

    /**
     * Remove the specified destination from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Destination $destination)
    {
        if ($destination->image_url) {
            \Storage::disk('public')->delete($destination->image_url);
        }

        $destination->delete();

        return redirect()->route('manager.destinations.index')->with('success', 'Destination supprimée avec succès.');
    }

    /**
     * Get the list of countries for the form.
     *
     * @return array
     */
    private function getPaysList()
    {
        return [
            'FR' => 'France',
            'US' => 'États-Unis',
            'CM' => 'Cameroun',
            'DE' => 'Allemagne',
            'JP' => 'Japon',
            // Ajoutez d'autres pays ici
        ];
    }

    /**
     * Get the list of timezones for the form.
     *
     * @return array
     */
    private function getTimezonesList()
    {
        return [
            'UTC' => 'UTC',
            'Europe/Paris' => 'Europe/Paris',
            'America/New_York' => 'America/New_York',
            'Africa/Douala' => 'Africa/Douala',
            'Asia/Tokyo' => 'Asia/Tokyo',
            // Ajoutez d'autres fuseaux horaires ici
        ];
    }
}