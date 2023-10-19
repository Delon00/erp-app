<?php

namespace App\Http\Controllers;

use App\Models\compagnie;
use App\Models\diagnostic;
use App\Models\marque;
use App\Models\pieces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clients;
use App\Models\admission;

class AdminController extends Controller
{
    public function ContentDashboard()
    {
        $clients = Clients::orderBy('client_id', 'DESC')->limit(4)->get();
        $clientcount = Clients::count();
        $diag = diagnostic::count();
        $admissionsCount = Admission::count();
        $nomvehicule = Admission::pluck('nom_voiture');
        return view('adminpagecontent.admindash', compact('clients','admissionsCount','clientcount','nomvehicule','diag'));
    }
    public function ContentProduits()
    {
        $pieces = Pieces::orderBy('piece_id', 'DESC')->get();
        $compagnies = compagnie::all();
        return view('adminpagecontent.produits',compact('pieces','compagnies'));
    }
    public function piecesform(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom_piece' => 'required|string',
            'prix_piece' => 'required|numeric',
            'type_piece' => 'required|string',
            'fabricant' => 'required|string',
            'long1' => 'numeric',
            'long2' => 'numeric',
            'large1' => 'numeric',
            'large2' => 'numeric',
            'diametre1' => 'numeric',
            'diametre2' => 'numeric',
            'hauteur' => 'numeric',
            'epaisseur' => 'numeric',
            'poids' => 'numeric',
            'quantite' => 'numeric',
            'image' => 'image|mimes:jpg,png,webp|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        $piece = new Pieces;
        $piece->nom_piece = $request->input('nom_piece');
        $piece->prix_piece = $request->input('prix_piece');
        $piece->type_piece = $request->input('type_piece');
        $piece->fabricant = $request->input('fabricant');
        $piece->long1 = $request->input('long1');
        $piece->long2 = $request->input('long2');
        $piece->large1 = $request->input('large1');
        $piece->large2 = $request->input('large2');
        $piece->diametre1 = $request->input('diametre1');
        $piece->diametre2 = $request->input('diametre2');
        $piece->hauteur = $request->input('hauteur');
        $piece->epaisseur = $request->input('epaisseur');
        $piece->poids = $request->input('poids');
        $piece->quantite = $request->input('quantite');
        $piece->image = $imagePath;
        $piece->save();
        
        $pieces = Pieces::orderBy('piece_id', 'DESC')->get();
        $compagnies = compagnie::all();
        return view('adminpagecontent.produits',compact('pieces','compagnies'));
    }
    public function ContentClients()
    {   
        return view('adminpagecontent.clients' );
    }
    public function ContentCommande()
    {
        return view('adminpagecontent.commande');
    }
    public function ContentReview()
    {
        return view('adminpagecontent.review');
    }
    public function ContentParametre()
    {
        return view('adminpagecontent.parametre');
    }

    public function admission(Request $request)
    {
        $marques = Marque::get();
        $admissions = Admission::orderBy('created_at', 'desc')->get();

        
        return view('adminpagecontent.admission', compact('marques', 'admissions'));
    }
    
    public function admissionform(Request $request)
    {

        $request->validate([
            'nom_client' => ['required','string',
                            function ($attribute, $value, $fail) {
                            if (Clients::where('nom_client', $value)->exists())
                            {$fail(trans('validation.client_exists'));}},],
            'nom_voiture' => 'required|string',
            'marque' => 'required|string',
            'panne' => 'required|string',
        ]);

        $admission = new Admission;
        $admission->nom_client = $request->input('nom_client');
        $admission->nom_voiture = $request->input('nom_voiture');
        $admission->marque_voiture = $request->input('marque');
        $admission->panne_declare = $request->input('panne');
        $admission->save();
        
        $client = new Clients;
        $client ->nom_client = $request->input('nom_client');
        $client->save();

        $admissions = Admission::orderBy('created_at', 'desc')->get();
        $marques = Marque::get();
        return view('adminpagecontent.admission', compact('marques', 'admissions'))
        ->with('success', 'Ajout réussi.');
    }


    public function diagnostic(Request $request)
    {
        $diag = Diagnostic::orderBy('created_at', 'desc')->get();
        return view('adminpagecontent.diagnostic', compact('diag'));
    }
    public function diag(Request $request)
    {
        $diags = Diagnostic::orderBy('created_at', 'desc')->get();
        return view('adminpagecontent.diagnostic', compact('diags'));
    }

    
}


