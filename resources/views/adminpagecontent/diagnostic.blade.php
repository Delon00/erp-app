@extends('dashboard')
@section('content')
<section class="produit-dash">
    <a class="add-product-button" id="toggle-button"><i class="bi bi-plus" id="toggle-icon"></i></a>
    <section class="add-board animate__animated animate__fadeIn">
        <div class="admission-main-row">
            <a href="{{route('clients')}}"><i class="close bi bi-arrow-left-short"></i></a>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <h2>Nouveau diagnostic</h2>
            <p>Ajout d'un nouveau diagnostic</p>
            <form class="form-style" method="POST" action="{{ route('diag') }}">
                @csrf
                    <select class="select-cat" id="Select1" name="plaque">
                        <option style="text-align:center;" value="">--- Choisir la plaque du vehicule ---</option>
                        @foreach ($admissions as $admission) 
                        <option value="{{ $admission->plaque}}" >{{ $admission->plaque }}</option>
                        @endforeach
                    </select>
                    @error('mom_vehicule')<div class="text-danger">{{ $message }}</div>@enderror

                    <input class="input-style" name="nombre_panne" type="number" placeholder="Nombre de panne...">
                    @error('nombre_panne')<div class="text-danger">{{ $message }}</div>@enderror
                <button class="btn-style" type="submit">Enregistrer <i class="bi bi-floppy"></i></button>
                <script>
                    var toggleButton = document.getElementById('toggle-button');
                    var form = document.querySelector('.add-board');
                    toggleButton.addEventListener('click', function(event) {
                    toggleButton.classList.toggle('active');
                    form.classList.toggle('active');});
                </script>
            </form>
            
        </div>
    </section>
    <div  class="row align-items-center">
        <div  class="col mx-4">
        <a class="btn-retour" style="text-decoration:none;" href="{{route('clients')}}"><i style="font-size:30px;" class="bi bi-arrow-left-short"></i> Vehicules</a>
            <div class="row justify-content-center align-items-center">
                <div class="col-1 d-flex justify-content-center align-items-center admin-product-search"><i class="bi bi-search"></i></div>
                <div class="col-11 colone-10 "><input class="admin-product-input" type="text" placeholder="Entrez le nom du produit"></div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-7 d-flex align-items-center ">
                    <h2>Diagnostic réalisée</h2>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="admin-filtre">
                        <div class="col d-flex justify-content-center bord"><i class="bi bi-filter-right"></i></div>
                        <div class="col d-flex justify-content-center"><i class="bi bi-funnel"></i></div>
                    </div>
                </div>
            </div>
            <div class="row admin-products">
            <div class="row">
                <div class="col "><h5>Nom du client</h5></div>
                <div class="col "><h5>Nom du véhicules</h5></div>
                <div class="col "><h5>Nbre Panne</h5></div>
                <div class="col "><h5>Crée le</h5></div>
                <div class="col "><h5>Modifié le</h5></div>
            </div>
            
            @foreach ($diags as $diag)
            @php
                $nom_client = $diag->nom_client;
                $nom_voiture = $diag->nom_voiture;
                $marque = $diag->marque_voiture;
                $panne = $diag->nmbre_panne;
                $create = $diag->created_at;
                $update = $diag->updated_at;
            @endphp
               <div class="row admission-list-row">
                    <div class="col">{{$nom_client}}</div>
                    <div class="col">{{$nom_voiture}}</div>
                    <div class="col">{{$marque}}</div>
                    <div class="col">{{$panne}}</div>
                    <div class="col">{{$create}}</div>
                    <div class="col">{{$update}}</div>
               </div>        
            @endforeach
            </div>
        </div>
    </div>
</section>
@endsection