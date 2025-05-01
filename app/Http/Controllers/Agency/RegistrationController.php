<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('agency.register');
    }

    public function register(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:agencies'],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'agency_name' => ['required', 'string', 'max:255'],
            'agency_type' => ['required', 'string', 'in:transport,hotel,tourism,multi'],
            'description' => ['required', 'string', 'max:500'],
            'city' => ['required', 'string'],
            'district' => ['required', 'string'],
            'address' => ['required', 'string'],
            'regions' => ['sometimes', 'array'],
            'website' => ['nullable', 'url'],
            'founding_year' => ['nullable', 'integer', 'min:1900', 'max:' . date('Y')],
            'license_number' => ['required', 'string'],
            'employees' => ['nullable', 'string'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'logo' => ['required', 'image', 'max:2048'],
            'gallery' => ['nullable', 'array'],
            'gallery.*' => ['image', 'max:2048'],
            'services' => ['sometimes', 'array'],
            'terms_validation' => ['required', 'accepted'],
        ]);

        // Traitement du logo
        $logoPath = $request->file('logo')->store('agency_logos', 'public');

        // Traitement des images de la galerie
        $galleryPaths = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryPaths[] = $galleryImage->store('agency_galleries', 'public');
            }
        }

        // Création de l'agence
        $agency = Agency::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'agency_name' => $request->agency_name,
            'agency_type' => $request->agency_type,
            'description' => $request->description,
            'city' => $request->city,
            'district' => $request->district,
            'address' => $request->address,
            'regions' => $request->regions,
            'website' => $request->website,
            'founding_year' => $request->founding_year,
            'license_number' => $request->license_number,
            'employees' => $request->employees,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'logo' => $logoPath,
            'gallery' => $galleryPaths,
            'services' => $request->services,
        ]);

        // Notification à l'administrateur (à implémenter)
        // Notification::route('mail', config('mail.admin_email'))->notify(new NewAgencyRegistered($agency));

        // Redirection avec message de confirmation
        return redirect()->route('agency.register.success')->with('success', 'Votre demande a été soumise avec succès. Notre équipe l\'examinera dans les plus brefs délais.');
    }

    public function showRegistrationSuccess()
    {
        return view('agency.register-success');
    }
}
