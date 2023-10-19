@extends('dashboard')
@section('content')
<section class="produit-dash">
    <a class="add-product-button" id="toggle-button"><i class="bi bi-plus" id="toggle-icon"></i></a>
    <section class="add-board animate__animated animate__fadeIn ">
        <div class="admission-main-row">
            <a href="{{route('produits')}}"><i class="close bi bi-arrow-left-short"></i></a>
            @if(session('success'))<div class="alert alert-success">{{ ('success') }}</div>@endif
            <h2>Ajout de nouvelle piece</h2>
            <p>Ajout de nouveau véhicule client</p>
            <form class="form-style" method="POST" action="{{ route('piecesform') }}"enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col d-flex flex-wrap justify-content-center align-items-center">
                        <div class="forme-img-ajout">
                            <input class="input-image" type="file" name="image" id="mob">
                            <img class="main-img-ajout"  id="uploadedImage" src="{{asset('media/add-img.png')}}" alt="">
                        </div>
                        <input class="input-style-produits" name="nom_piece" type="text" placeholder="Nom de la piece..." value="{{ old('nom_piece') }}">
                        @error('nom_piece')<div class="text-danger">{{ $message }}</div>@enderror
                        <input class="input-style-produits" name="prix_piece" type="text" placeholder="Prix de la piece..." value="{{ old('prix_piece') }}">
                        @error('prix_piece')<div class="text-danger">{{ $message }}</div>@enderror
                        <input class="input-style-produits" name="type_piece" type="text" placeholder="le type de la piece..." value="{{ old('type_piece') }}">
                        @error('type_piece')<div class="text-danger">{{ $message }}</div>@enderror
                        <select class="select-cat-produits" id="Select1" name="fabricant">
                            <option style="text-align:center;" value="">--- Choisir le fabricant ---</option>
                            @foreach ($compagnies as $compagnie)
                                <option value="{{ $compagnie->compagnie_name }}" {{ old('marque') == $compagnie->compagnie_name ? 'selected' : '' }}>
                                    {{ $compagnie->compagnie_name }}
                                    <!-- <img src="{{ asset('media/' . $compagnie->logo_compagnie) }}" alt="{{ $compagnie->compagnie_name }}"> -->
                                </option>
                            @endforeach
                        </select>
                        @error('fabricant')<div class="text-danger">{{ $message }}</div>@enderror
                        
                        
                    </div>

                    <div class="col">
                        <input class="input-style-produits" name="long1" type="number" placeholder="Longueur 1..." value="{{ old('long1') }}">
                        @error('long1')<div class="text-danger">{{ $message }}</div>@enderror
                        <input class="input-style-produits" name="long2" type="number" placeholder="Longueur 2..." value="{{ old('long2') }}">
                        @error('long2')<div class="text-danger">{{ $message }}</div>@enderror
                        <input class="input-style-produits" name="large1" type="number" placeholder="Largeur 1..." value="{{ old('large1') }}">
                        @error('large1')<div class="text-danger">{{ $message }}</div>@enderror
                        <input class="input-style-produits" name="large2" type="number" placeholder="Largeur 2..." value="{{ old('large2') }}">
                        @error('large2')<div class="text-danger">{{ $message }}</div>@enderror
                        <input class="input-style-produits" name="diametre1" type="number" placeholder="Diamètre 1..." value="{{ old('diametre1') }}">
                        @error('diametre1')<div class="text-danger">{{ $message }}</div>@enderror
                        <input class="input-style-produits" name="diametre2" type="number" placeholder="Diamètre 2..." value="{{ old('diametre2') }}">
                        @error('diametre2')<div class="text-danger">{{ $message }}</div>@enderror
                        <input class="input-style-produits" name="hauteur" type="number" placeholder="Hauteur..." value="{{ old('hauteur') }}">
                        @error('hauteur')<div class="text-danger">{{ $message }}</div>@enderror
                        <input class="input-style-produits" name="epaisseur" type="number" placeholder="Epaisseur..." value="{{ old('epaisseur') }}">
                        @error('epaisseur')<div class="text-danger">{{ $message }}</div>@enderror
                        <input class="input-style-produits" name="poids" type="number" placeholder="Poids..." value="{{ old('poids') }}">
                        @error('podis')<div class="text-danger">{{ $message }}</div>@enderror
                        <input class="input-style-produits" name="quantite" type="number" placeholder="la quantité..." value="{{ old('quantite') }}">
                        @error('quantite')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                <button class="btn-style" type="submit">Enregistrer <i class="bi bi-floppy"></i></button>
                <script>
                    var toggleButton = document.getElementById('toggle-button');
                    var form = document.querySelector('.add-board');
                    toggleButton.addEventListener('click', function(event) {
                    toggleButton.classList.toggle('active');
                    form.classList.toggle('active');});

                    let imageInput = document.getElementById("mob");
                    let uploadedImage = document.getElementById("uploadedImage");
                    let imageError = "{{ asset('media/add-img-error.png') }}";

                    imageInput.addEventListener("change", function() {
                        let file = imageInput.files[0];
                        let reader = new FileReader();

                        reader.onload = function(event) {
                            let imageURL = event.target.result;
                            uploadedImage.src = imageURL;
                        };

                        if (file) {
                            let fileExtension = file.name.split('.').pop().toLowerCase();
                            let allowedExtensions = ['jpg', 'png', 'webp'];
                            if (allowedExtensions.indexOf(fileExtension) === -1) {
                                // Le fichier n'est pas dans les formats autorisés, afficher l'image d'erreur
                                uploadedImage.src = imageError;
                            } else {
                                // Le fichier est dans un format autorisé, lire et afficher le fichier
                                reader.readAsDataURL(file);
                            }
                        } else {
                            // Aucun fichier n'a été sélectionné, afficher l'image d'erreur
                            uploadedImage.src = imageError;
                        }
                    });



                </script>
            </form>
        </div>
    </section>

    <div  class="row align-items-center">
        <div  class="col margin-2 ">
            <div class="row justify-content-center align-items-center">
                <div class="col-1 d-flex justify-content-center align-items-center admin-product-search"><i class="bi bi-search"></i></div>
                <div class="col-11 colone-10 "><input class="admin-product-input" type="text" placeholder="Entrez le nom du produit"></div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-7 d-flex align-items-center "><h2>Pieces auto</h2></div>
                <div class="col d-flex justify-content-end">
                    <div class="admin-filtre">
                        <div class="col d-flex justify-content-center bord"><i class="bi bi-filter-right"></i></div>
                        <div class="col d-flex justify-content-center"><i class="bi bi-funnel"></i></div>
                    </div>
                </div>
            </div>
            <div class="row admin-products">
                @foreach ($pieces as $piece)
                @php
                $nom = strlen($piece->piece_nom) > 25 ? substr($piece->piece_nom, 0, 15) . '...' : $piece->piece_nom;
                $prix = number_format($piece->piece_prix, 0, ',', ' ');
                $categorie = $piece->piece_categorie;
                $fabricant = $piece->piece_fabricant;
                $longueur1 = $piece->longueur_1;
                $longueur2 = $piece->longueur_2;
                $largeur1 = $piece->largeur_1;
                $largeur2= $piece->largeur_2;
                $diametre1 = $piece->diametre_1;
                $diametre2= $piece->diametre_2;
                $hauteur= $piece->hauteur;
                $epaisseur= $piece->epaisseur;
                $poids= $piece->poids;
                $quantite= $piece->qte;
                $image = ('storage/app/').$piece->image;

                @endphp
                <div class="col">
                    <div class="article-card-admin">
                        <img src="{{ asset($image) }}" >
                        <div class="profile-name">{{ $nom }}</div>
                        <div class="profile-username">
                            <div class="text">{{ $prix }} Dh</div>
                        </div>
                        <div class="profile-icons">
                            <a id=""><i class="bi bi-three-dots"></i></a>
                        </div>
                    </div>
                </div>        
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
