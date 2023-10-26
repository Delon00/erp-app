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
        $pieces = Pieces::latest('created_at')->first();
        $piecesqte = $pieces->qte;
        $piecesnom = $pieces->piece_nom;
        $image = ('Storage/').$pieces->image;
        return view('adminpagecontent.admindash', compact('clients','piecesnom','image','pieces','piecesqte','admissionsCount','clientcount','nomvehicule','diag'));
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
        $clients = Clients::all();
        return view('adminpagecontent.commande',compact('clients'));
    }
    public function Clientform(Request $request)
    {
        $request->validate([
            'cin' => 'required|string',
            'tel' => 'required|string',
            'mail' => 'required|string',
            'nom_client' => 'required|string',
        ]);
        
        $nom_client = $request->input('nom_client');
        $client = Clients::where('client_id', $nom_client)->first();
        $client->num_cin = $request->input('cin');
        $client->num_tel = $request->input('tel');
        $client->mail = $request->input('mail');
        $client->save();
        return redirect()->route('commande');
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
        return redirect()->route('admission');
    }


    public function diagnostic(Request $request)
    {

        $diags = Diagnostic::orderBy('created_at', 'desc')->get();
        $marques = Marque::all();
        $clients = Clients::all();
        $admissions = Admission::all();
        $nomProprietaire = $request->input('proprietaire');


        return view('adminpagecontent.diagnostic', compact('diags','marques','clients','admissions'));
    }
    public function diag(Request $request)
    {

            $plaque = $request->input('plaque');

            $admission = Admission::where('plaque', $plaque)->first();
            $nom_voiture = $admission->nom_voiture;
            $add_id = $admission->add_id;
            $admissionsClients = Admissions_client::where('add_id', $add_id)->first();
            $client_id = $admissionsClients->client_id;
            $client = Clients::where('client_id', $client_id)->first();
            $nom_client = $client->nom_client;


            $diags = new Diagnostic;
            $diags->nmbre_panne = $request->input('nombre_panne');
            $diags->nom_voiture = $nom_voiture;
            $diags->nom_client = $nom_client;
            $diags->save();
            return redirect()->route('diagnostic');
    }
    public function reparation(Request $request)
    {   
        $clients = Clients::all();
        return view('adminpagecontent.reparation', compact('clients'));
    }


    public function reparationform(Request $request)
    {   

        return redirect()->route('reparation');
    }
    
}



