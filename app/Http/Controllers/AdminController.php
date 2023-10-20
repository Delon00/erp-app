<?php

namespace App\Http\Controllers;

use App\Models\admissions_client;
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
        $request->validate([
            'nom_piece' => 'required|string',
            'prix_piece' => 'required|numeric',
            'type_piece' => 'required|string',
            'fabricant' => 'required|string',
            'quantite' => 'numeric',
            'image' => 'image|mimes:jpg,png,webp|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $imagePath = $uploadedFile->store('images','public');
        } else {
            $imagePath = null;
        }        

        $piece = new Pieces;
        $piece->piece_nom = $request->input('nom_piece');
        $piece->piece_prix = $request->input('prix_piece');
        $piece->piece_categorie = $request->input('type_piece');
        $piece->piece_fabricant = $request->input('fabricant');
        $piece->longueur_1 = $request->input('long1');
        $piece->longueur_2 = $request->input('long2');
        $piece->largeur_1 = $request->input('large1');
        $piece->largeur_2 = $request->input('large2');
        $piece->diametre_1 = $request->input('diametre1');
        $piece->diametre_2 = $request->input('diametre2');
        $piece->hauteur = $request->input('hauteur');
        $piece->epaisseur = $request->input('epaisseur');
        $piece->poids = $request->input('poids');
        $piece->qte = $request->input('quantite');
        $piece->image = $imagePath;
        $piece->save();
        $request->session()->flash('success', 'Article ajouté avec succès');
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
        $marques = Marque::all();
        $clients = Clients::all();
        $admissions = Admission::select('admissions.*', 'clients.nom_client as client_name')
        ->join('admissions_clients', 'admissions.add_id', '=', 'admissions_clients.add_id')
        ->join('clients', 'admissions_clients.client_id', '=', 'clients.client_id')
        ->orderBy('admissions.created_at', 'desc')
        ->get();
    

        
        return view('adminpagecontent.admission', compact('marques', 'admissions','clients'));
    }
    
    public function admissionform(Request $request)
    {

        $request->validate([
            'nom_client' => ['required','string',
                            function ($attribute, $value, $fail) {
                            if (Clients::where('nom_client', $value)->exists())
                            {$fail(trans('validation.client_exists'));}},],
            'nom_voiture' => 'required|string',
            'serie' => 'required|string',
            'plaque' => 'required|string',
            'marque' => 'required|string',
            'panne' => 'required|string',
        ]);

        $admission = new Admission;
        $admission->nom_voiture = $request->input('nom_voiture');
        $admission->marque_voiture = $request->input('marque');
        $admission->serie_voiture = $request->input('serie');
        $admission-> plaque= $request->input('plaque');
        $admission->panne_declare = $request->input('panne');
        $admission->save();
        
        $client = new Clients;
        $client ->nom_client = $request->input('nom_client');
        $client->save();


        $admissions_client = new Admissions_client;
        $admissions_client->add_id = $admission->id;
        $admissions_client->client_id = $client->id;
        $admissions_client->save();

        $admissions = Admission::orderBy('created_at', 'desc')->get();
        $marques = Marque::all();
        return view('adminpagecontent.admission', compact('marques', 'admissions'))
        ->with('success', 'Ajout réussi.');
    }


    public function diagnostic(Request $request)
    {
        $diags = Diagnostic::orderBy('created_at', 'desc')->get();
        $marques = Marque::all();
        $clients = Clients::all('nom_client');
        return view('adminpagecontent.diagnostic', compact('diags','marques','clients'));
    }
    public function diag(Request $request)
    {
        $diags = Diagnostic::orderBy('created_at', 'desc')->get();
        return view('adminpagecontent.diagnostic', compact('diags'));
    }

    
}



