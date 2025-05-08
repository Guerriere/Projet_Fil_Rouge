/**
 * The user has been authenticated.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  mixed  $user
 * @return mixed
 */
protected function authenticated(Request $request, $user)
{
    // Ajout de journalisation pour déboguer
    \Log::info('User authenticated', [
        'user_id' => $user->id, 
        'role' => $user->role,
        'intended_voyage_id' => $request->input('intended_voyage_id')
    ]);
    
    // Vérifier s'il y a un voyage en attente de réservation
    if ($request->has('intended_voyage_id')) {
        $voyageId = $request->input('intended_voyage_id');
        return redirect()->route('client.reservations.add', ['voyage_id' => $voyageId])
                         ->with('success', 'Vous êtes maintenant connecté. Vous pouvez réserver votre voyage.');
    }
    
    // Redirection par défaut selon le rôle
    if ($user->isAdmin()) {
        return redirect()->route('admin.dashboard');
    } elseif ($user->isPartner()) {
        return redirect()->route('partner.dashboard');
    } else {
        return redirect()->route('client.dashboard');
    }
}        return redirect()->